<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Jabatan;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    public function employee(){
        $sessionDept=Session::get('dept');   
        if($sessionDept=='0'){
            $pegawai=Pegawai::with('jabatan')->get();
        }else{
            $pegawai=Pegawai::with('jabatan')
                    ->join('jabatans','jabatans.id','=','pegawais.jabatan_id')
                    ->where('jabatans.kelompok_dept_id',$sessionDept)->get();
        }     

        return view('pegawai.listemployee',[
            'pegawai'=>$pegawai,
        ]);
    }

    public function employeeDestroy($id){
        $peg=Pegawai::where('id',$id)->delete();

        return response()->json($peg);
    }

    public function employeeEdit($id){
        $sessionDept=Session::get('dept');
        $realID=Crypt::decrypt($id);
        $pegawai=Pegawai::with("jabatan")->where('id',$realID)->first();
        if($sessionDept=='0'){
            $jabatan=Jabatan::all();
        }else{
            $jabatan=Jabatan::where('kelompok_dept_id',$sessionDept)->get();
                    
        }
        return view("pegawai.addemployee",[
            'jabatan'=>$jabatan,
            'pegawai'=>$pegawai,
            'realID'=>$realID
        ]);
    }

    public function employeeStore(Request $req, $type){

        $nip=$req->nip;
        $nama=$req->nama;
        $email=$req->email;
        $jk=$req->jk;
        $jabatan=$req->jabatan;
        $alamat=$req->alamat;
        $status=$req->status;
        if ($type=="edit") {
            $id=$req->id;

            $save=[
                'nip'=>$nip,
                'jabatan_id'=>$jabatan,
                'nama'=>$nama,
                'email'=>$email,
                'gender'=>$jk,
                'address'=>$alamat,
                'status'=>$status
            ];

            $edit=Pegawai::where('id',$id)->update($save);

            return redirect()->route("employee.index");
        }elseif ($type=='add') {
            $pass=$req->password;
            $confirm_pass=$req->confirm_password;

            if ($pass==$confirm_pass) {
                $password=md5($pass);
                $save=[
                    'nip'=>$nip,
                    'jabatan_id'=>$jabatan,
                    'nama'=>$nama,
                    'email'=>$email,
                    'gender'=>$jk,
                    'address'=>$alamat,
                    'status'=>$status,
                    'password'=>$password,
                    'imei'=>'0'
                ];

                $saveDB=Pegawai::insert($save);
                return redirect()->route("employee.index");
            }elseif ($pass!=$confirm_pass) {
                return redirect()->route("employee.index")->with('alert','Gagal Menyimpan');
            }
            
        }
    }

    public function employeeReset($id){
        $pass= md5('IBSYNERGY1234');
        Pegawai::where('id',$id)->update(['password'=>$pass]);

        return redirect()->route("employee.index");
    }

//ADD EMPLOYEE
    public function employeeAdd(){
        $sessionDept=Session::get('dept');
        if($sessionDept=='0'){
            $jabatan=Jabatan::all();
        }else{
            $jabatan=Jabatan::where('kelompok_dept_id',$sessionDept)->get();
                    
        }

        return view("pegawai.addemployee",[
            'jabatan'=>$jabatan
        ]);
    }

//ATTENDANCE
    public function time(){
        $time = date("H:i:s");

        return response()->json($time);
    }
    public function cek($nip){
        $SS=Pegawai::where('nip',$nip);
        $search=$SS->first();
        $id=$search->id;
        $sql=Absensi::where('pegawai_id',$id)->orderBy('id','desc');
        $count=$SS->count();
        $countABS=$sql->count();
        if($count==0){
            $isi=['cek'=>'0'];
            $data=json_encode($isi);
        }else{
            $data=$sql->first();
        }
        return response()->json([
            'data'=>$data,
            'jml'=>$countABS]);
    }
    public function inout(Request $req){
        $nip=$req->nip;
        $pass=md5($req->pass);
        $time=date('H:i:s');
        $date=date('Y-m-d');
        $id=$req->id;

        $sql=Pegawai::where('nip',$nip);
        $cek=$sql->count();
        if ($cek>=1) {
            $data=$sql->first();
            if ($pass==$data->password) {
                $loc=$req->loc;
                if (isset($req->checkin)) {
                    $IDabsensi=Absensi::where('pegawai_id',$data->id)->orderBy('id','desc')->take(1)->first('server_date_in');
                    if ($IDabsensi->server_date_in!=$date) {

                        if ($time>="09:16:00") {
                            $status='telat';
                        }elseif($time<="09:15:00"){
                            $status='hadir';
                        }
                        $save=[
                            'pegawai_id'=>$data->id,
                            'server_time_in'=>$time,
                            'server_date_in'=>$date,
                            'device_time_in'=>$time,
                            'device_date_in'=>$date,
                            'loc_in'=>$loc,
                            'status'=>$status,
                            'cek'=>'checkin'
                        ];
                        $datasave=Absensi::insert($save);
                        return redirect()->back()->with('Salert','Berhasil Checkin');
                    }elseif ($IDabsensi->server_date_in==$date) {
                        return redirect()->back()->with('alert','Anda Sudah Checkin Hari Ini !!!');
                    }
                }elseif (isset($req->checkout)) {
                    $save=[
                        'server_time_out'=>$time,
                        'server_date_out'=>$date,
                        'device_time_out'=>$time,
                        'device_date_out'=>$date,
                        'loc_out'=>$loc,
                        'cek'=>'checkout'
                    ];
                    $datasave=Absensi::where('id',$id)->update($save);
                    return redirect()->back()->with('Salert','Berhasil Checkout');
                }
            }else{
                return redirect()->back()->with('alert','Password Anda Salah !!!!');    
            }
        }elseif($cek==0){
            return redirect()->back()->with('alert','Maaf NIP Anda Tidak Ditemukan');
        }
    }
}
