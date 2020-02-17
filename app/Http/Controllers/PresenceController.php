<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Aktivitas;
use App\Leave;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PresenceController extends Controller
{
//ATTENDANCE
    public function attendance(){
        $sessionDept=Session::get('dept');  
        $first=date('Y-m-01');
        $end=date('Y-m-31');
        if($sessionDept=='0'){
            $absensi=Absensi::with('pegawai')->whereBetween('server_date_in',[$first,$end])->get();
        }else{
            $absensi=Absensi::with('pegawai')
            ->join('pegawais','pegawais.id','=','absensis.pegawai_id')
            ->join('jabatans','jabatans.id','=','pegawais.jabatan_id')
            ->where('jabatans.kelompok_dept_id',$sessionDept)
            ->whereBetween('server_date_in',[$first,$end])->get();
        }
        return view('presensi.attendance',[
            'absensi'=>$absensi,
            'first'=>$first,
            'end'=>$end,
        ]);
    }
    public function Searchattendance(Request $req){
        $sessionDept=Session::get('dept');
        $first=$req->min;
        $end=$req->max;
        if($sessionDept=='0'){
            $absensi=Absensi::with('pegawai')->whereBetween('server_date_in',[$first,$end])->get();
        }else{
            $absensi=Absensi::with('pegawai')
            ->join('pegawais','pegawais.id','=','absensis.pegawai_id')
            ->join('jabatans','jabatans.id','=','pegawais.jabatan_id')
            ->where('jabatans.kelompok_dept_id',$sessionDept)
            ->whereBetween('server_date_in',[$first,$end])->get();
        }
        return response()->json($absensi);
    }
    public function DetailEMP($id,$N,$X){
        $first=$N;
        $end=$X;
        $item=Absensi::with('pegawai')->whereBetween('server_date_in',[$first,$end])->where('id',$id)->first();
        
        return view('presensi.attendance_detail',[
            'item'=>$item,
            'first'=>$first,
            'end'=>$end,
        ]);
    }
    public function attendanceExport($first,$end){
        $sessionDept=Session::get('dept');
        if($sessionDept=='0'){
            $absensi=Absensi::with('pegawai')->whereBetween('server_date_in',[$first,$end])->orderBy('pegawai_id','asc')->get();
            $leave=Leave::with('pegawai','leaveType')->whereBetween('date',[$first,$end])->orderBy('pegawai_id','asc')->get();
        }else{
            $absensi=Absensi::with('pegawai')
            ->join('pegawais','pegawais.id','=','absensis.pegawai_id')
            ->join('jabatans','jabatans.id','=','pegawais.jabatan_id')
            ->where('jabatans.kelompok_dept_id',$sessionDept)
            ->whereBetween('server_date_in',[$first,$end])->orderBy('pegawais.nama','asc')->get();

            $leave=Leave::with('pegawai','leaveType')
            ->join('pegawais','pegawais.id','=','leaves.pegawai_id')
            ->join('jabatans','jabatans.id','=','pegawais.jabatan_id')
            ->where('jabatans.kelompok_dept_id',$sessionDept)
            ->whereBetween('date',[$first,$end])->orderBy('pegawais.nama','asc')->get();
        }
        

        if($sessionDept=='0'){
            $pegawai=Pegawai::get(['id','nama']);
        }else{
            $pegawai=Pegawai::join('jabatans','jabatans.id','=','pegawais.jabatan_id')->where('jabatans.kelompok_dept_id',$sessionDept)->get(['pegawais.id','pegawais.nama']);
        }
        $hadir=[];
        $telat=[];
        $izin=[];
        foreach ($pegawai as $val) {
            if($sessionDept=='0'){
                $hadirAbsensi=Absensi::with('pegawai')->where('pegawai_id',$val->id)->where('status','hadir')->whereBetween('server_date_in',[$first,$end])->count();
                $telatAbsensi=Absensi::with('pegawai')->where('pegawai_id',$val->id)->where('status','telat')->whereBetween('server_date_in',[$first,$end])->count();
                $izinRecord=Leave::with('pegawai')->where('pegawai_id',$val->id)->whereBetween('date',[$first,$end])->count();
            }else{
                $hadirAbsensi=Absensi::with('pegawai')
                ->join('pegawais','pegawais.id','=','absensis.pegawai_id')
                ->join('jabatans','jabatans.id','=','pegawais.jabatan_id')
                ->where('jabatans.kelompok_dept_id',$sessionDept)
                ->where('pegawai_id',$val->id)    
                ->where('status','hadir')
                ->whereBetween('server_date_in',[$first,$end])->count();
                
                $telatAbsensi=Absensi::with('pegawai')
                ->join('pegawais','pegawais.id','=','absensis.pegawai_id')
                ->join('jabatans','jabatans.id','=','pegawais.jabatan_id')
                ->where('jabatans.kelompok_dept_id',$sessionDept)
                ->where('pegawai_id',$val->id)    
                ->where('status','telat')
                ->whereBetween('server_date_in',[$first,$end])->count();

                $izinRecord=Leave::with('pegawai')
                ->join('pegawais','pegawais.id','=','leaves.pegawai_id')
                ->join('jabatans','jabatans.id','=','pegawais.jabatan_id')
                ->where('jabatans.kelompok_dept_id',$sessionDept)
                ->where('pegawai_id',$val->id)->whereBetween('date',[$first,$end])->count();
            }
            $hadir[$val->id]=$hadirAbsensi;
            $telat[$val->id]=$telatAbsensi;
            $izin[$val->id]=$izinRecord;
        }
       
        return view('presensi.export.exportAtt',[
            'absensi'=>$absensi,
            'first'=>$first,
            'izin'=>$izin,
            'end'=>$end,
            'hadir'=>$hadir,
            'pegawai'=>$pegawai,
            'telat'=>$telat,
            'leave'=>$leave
        ]);
    }
//ACTIVITY
    public function activity(){
        $sessionDept=Session::get('dept');
        $first=date('Y-m-01');
        $end=date('Y-m-31');
        if($sessionDept=='0'){
            $aktivitas=Aktivitas::with('pegawai','customerSite.customer','jobActivity')->whereBetween('device_date_in',[$first,$end])->get();
        }else{
            $aktivitas=Aktivitas::with('pegawai','customerSite.customer','jobActivity')
            ->join('pegawais','pegawais.id','=','aktivitas.pegawai_id')
            ->join('jabatans','jabatans.id','=','pegawais.jabatan_id')
            ->where('jabatans.kelompok_dept_id',$sessionDept)
            ->whereBetween('device_date_in',[$first,$end])->get();
        }
        return view('presensi.activity',[
            'aktivitas'=>$aktivitas,
            'first'=>$first,
            'end'=>$end,]);
    }
    public function DetailEMPAct($id,$N,$X){
        $first=$N;
        $end=$X;
        $item=Aktivitas::with('pegawai')->whereBetween('device_date_in',[$first,$end])->where('id',$id)->first();
        
        return view('presensi.activity_detail',[
            'item'=>$item,
            'first'=>$first,
            'end'=>$end,
        ]);
    }
    public function Searchactivity(Request $req){
        $sessionDept=Session::get('dept');
        $first=$req->min;
        $end=$req->max;
        if($sessionDept=='0'){
            $aktivitas=Aktivitas::with('pegawai','customerSite.customer','jobActivity')->whereBetween('device_date_in',[$first,$end])->get();
        }else{
            $aktivitas=Aktivitas::with('pegawai','customerSite.customer','jobActivity')
            ->join('pegawais','pegawais.id','=','aktivitas.pegawai_id')
            ->join('jabatans','jabatans.id','=','pegawais.jabatan_id')
            ->where('jabatans.kelompok_dept_id',$sessionDept)
            ->whereBetween('device_date_in',[$first,$end])->get();
        }
        return response()->json($aktivitas);
    }

    public function activityExport($first,$end){
        $sessionDept=Session::get('dept');

        if($sessionDept=='0'){
            $aktivitas=Aktivitas::with('pegawai','customerSite.customer','jobActivity')->whereBetween('device_date_in',[$first,$end])->orderBy('pegawai_id','asc')->get();
        }else{
            $aktivitas=Aktivitas::with('pegawai','customerSite.customer','jobActivity')
            ->join('pegawais','pegawais.id','=','aktivitas.pegawai_id')
            ->join('jabatans','jabatans.id','=','pegawais.jabatan_id')
            ->where('jabatans.kelompok_dept_id',$sessionDept)
            ->whereBetween('device_date_in',[$first,$end])->orderBy('pegawais.id','asc')->get();
        }
        
        $pegawai=Pegawai::get(['id','nama']);
        $hadir=[];
        foreach ($pegawai as $val) {
            
            if($sessionDept=='0'){
                $hadirAktivitas=Aktivitas::with('pegawai')->where('pegawai_id',$val->id)->whereBetween('device_date_in',[$first,$end])->count();
                $hadir[$val->id]=$hadirAktivitas;
            }else{
                $hadirAktivitas=Aktivitas::with('pegawai')
                ->join('pegawais','pegawais.id','=','aktivitas.pegawai_id')
                ->join('jabatans','jabatans.id','=','pegawais.jabatan_id')
                ->where('jabatans.kelompok_dept_id',$sessionDept)
                ->where('pegawai_id',$val->id)->whereBetween('device_date_in',[$first,$end])->count();
                $hadir[$val->id]=$hadirAktivitas;
            }
        }
       
        return view('presensi.export.exportAct',[
            'aktivitas'=>$aktivitas,
            'first'=>$first,
            'end'=>$end,
            'hadir'=>$hadir,
            'pegawai'=>$pegawai
        ]);
    }
}
