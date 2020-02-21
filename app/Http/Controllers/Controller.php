<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Aktivitas;
use App\Leave;
use App\Pegawai;
use CountDept;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    
    
    public function dash(){
        $sessionDept=Session::get('dept');  
        $first=date('Y-m-d');
        $end=date('Y-m-d');
        if($sessionDept=='0'){
            $absensi=Absensi::with('pegawai')->whereBetween('server_date_in',[$first,$end])->get();
            $aktivitas=Aktivitas::with('pegawai','customerSite.customer','jobActivity')->whereBetween('device_date_in',[$first,$end])->get();

            $isi=Leave::with('pegawai','leaveType')->whereBetween('date',[$first,$end]);
            $leave=$isi->get();
        }else{
            $absensi=Absensi::with('pegawai')
            ->join('pegawais','pegawais.id','=','absensis.pegawai_id')
            ->join('jabatans','jabatans.id','=','pegawais.jabatan_id')
            ->where('jabatans.kelompok_dept_id',$sessionDept)
            ->whereBetween('server_date_in',[$first,$end])->get();

            $aktivitas=Aktivitas::with('pegawai','customerSite.customer','jobActivity')
            ->join('pegawais','pegawais.id','=','aktivitas.pegawai_id')
            ->join('jabatans','jabatans.id','=','pegawais.jabatan_id')
            ->where('jabatans.kelompok_dept_id',$sessionDept)
            ->whereBetween('device_date_in',[$first,$end])->get();

            $isi=Leave::with('pegawai','leaveType')->whereBetween('date',[$first,$end]);
            $leave=$isi->get();
        }
        
        $manajemen = Pegawai::join("jabatans","jabatans.id","=","pegawais.jabatan_id")
                    ->join("kelompok_depts","kelompok_depts.id","=","jabatans.kelompok_dept_id")
                    ->where("kelompok_depts.id",5)->count(); 
        $finance = Pegawai::join("jabatans","jabatans.id","=","pegawais.jabatan_id")
                    ->join("kelompok_depts","kelompok_depts.id","=","jabatans.kelompok_dept_id")
                    ->where("kelompok_depts.id",2)->count();
        $sales = Pegawai::join("jabatans","jabatans.id","=","pegawais.jabatan_id")
                ->join("kelompok_depts","kelompok_depts.id","=","jabatans.kelompok_dept_id")
                ->where("kelompok_depts.id",3)->count();
        $technical = Pegawai::join("jabatans","jabatans.id","=","pegawais.jabatan_id")
                    ->join("kelompok_depts","kelompok_depts.id","=","jabatans.kelompok_dept_id")
                    ->where("kelompok_depts.id",4)->count();
        $operation =  Pegawai::join("jabatans","jabatans.id","=","pegawais.jabatan_id")
                        ->join("kelompok_depts","kelompok_depts.id","=","jabatans.kelompok_dept_id")
                        ->where("kelompok_depts.id",1)->count();

        return view('dashboard.dash',[
            'absensi'=>$absensi,
            'aktivitas'=>$aktivitas,
            'leave'=>$leave,
            'first'=>$first,
            'end'=>$end,
            'manajemen'=>$manajemen,
            'finance'=>$finance,
            'sales'=>$sales,
            'technical'=>$technical,
            'operation'=>$operation
        ]);
    }

    public function act(){
        return view('presensi.activity');
    }

    public function att(){
        return view('presensi.attendance');
    }

    

    

    public function employeeAdd(){
        return view('pegawai.addemployee');
    }

    public function dept_grup(){
        return view('pegawai.adddeptgrup');
    }

    public function dept(){
        return view('pegawai.adddept');
    }

    public function job_type(){
        return view('pegawai.addjobtype');
    }

    public function data2(){
        return view('customer.listcustomer');
    }

    public function data3(){
        return view('customer.listcustside');
    }

    public function adddata1(){
        return view('pegawai.addemployee');
    }

    public function adddata2(){
        return view('customer.addcustomer');
    }

    public function adddata3(){
        return view('customer.addcustside');
    }

    public function setting(){
        return view('pegawai.setting');
    }
}
