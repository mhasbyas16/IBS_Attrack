<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EmployeeController extends Controller
{
    public function employee(){
        $pegawai=Pegawai::with('jabatan')->get();        

        return view('pegawai.listemployee',[
            'pegawai'=>$pegawai,
        ]);
    }

    public function employeeDestroy($id){
        $peg=Pegawai::where('id',$id)->delete();

        return response()->json($peg);
    }

    public function employeeEdit($id){
        $realID=Crypt::decrypt($id);
        $pegawai=Pegawai::with("jabatan")->where('id',$realID)->first();
        $jabatan=Jabatan::all();
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
        if ($type=="edit") {
            $id=$req->id;

            $save=[
                'nip'=>$nip,
                'jabatan_id'=>$jabatan,
                'nama'=>$nama,
                'email'=>$email,
                'gender'=>$jk,
                'address'=>$alamat
            ];

            $edit=Pegawai::where('id',$id)->update($save);

            return redirect()->route("employee.index");
        }
    }

    public function employeeReset($id){
        $pass= md5('IBSYNERGY1234');
        Pegawai::where('id',$id)->update(['password'=>$pass]);

        return redirect()->route("employee.index");
    }

//ADD EMPLOYEE
    public function employeeAdd(){
        $jabatan=Jabatan::all();

        return view("pegawai.addemployee",[
            'jabatan'=>$jabatan
        ]);
    }
}
