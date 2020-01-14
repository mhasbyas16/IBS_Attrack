<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Aktivitas;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresenceController extends Controller
{
//ATTENDANCE
    public function attendance(){
        $first=date('Y-m-01');
        $end=date('Y-m-31');
        $absensi=Absensi::with('pegawai')->whereBetween('server_date_in',[$first,$end])->get();
        return view('presensi.attendance',[
            'absensi'=>$absensi,
            'first'=>$first,
            'end'=>$end,
        ]);
    }
    public function Searchattendance(Request $req){
        $first=$req->min;
        $end=$req->max;
        $absensi=Absensi::with('pegawai')->whereBetween('server_date_in',[$first,$end])->get();
        
       /* return view('presensi.attendance',[
            'absensi'=>$absensi,
            'first'=>$first,
            'end'=>$end,
        ]);*/
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
        $absensi=Absensi::with('pegawai')->whereBetween('server_date_in',[$first,$end])->get();
        //$sumAbsensi=Absensi::with('pegawai')->select(DB::raw('count(*)as total'),'absensis.*')->whereBetween('server_date_in',[$first,$end])->get();
        $pegawai=Pegawai::get(['id','nama']);
        $hadir=[];
        $telat=[];
        foreach ($pegawai as $val) {
            $hadirAbsensi=Absensi::with('pegawai')->where('pegawai_id',$val->id)->where('status','hadir')->whereBetween('server_date_in',[$first,$end])->count();
            $telatAbsensi=Absensi::with('pegawai')->where('pegawai_id',$val->id)->where('status','telat')->whereBetween('server_date_in',[$first,$end])->count();
            $hadir[$val->id]=$hadirAbsensi;
            $telat[$val->id]=$telatAbsensi;
        }
       
        return view('presensi.export.exportAtt',[
            'absensi'=>$absensi,
            'first'=>$first,
            'end'=>$end,
            'hadir'=>$hadir,
            'pegawai'=>$pegawai,
            'telat'=>$telat
        ]);
    }
//ACTIVITY
    public function activity(){
        $first=date('Y-m-01');
        $end=date('Y-m-31');
        $aktivitas=Aktivitas::with('pegawai','customerSite.customer','jobActivity')->whereBetween('device_date_in',[$first,$end])->get();
        return view('presensi.activity',[
            'aktivitas'=>$aktivitas,
            'first'=>$first,
            'end'=>$end,]);
    }
    public function Searchactivity(Request $req){
        $first=$req->min;
        $end=$req->max;
        $aktivitas=Aktivitas::with('pegawai','customerSite.customer','jobActivity')->whereBetween('device_date_in',[$first,$end])->get();
        
       /* return view('presensi.attendance',[
            'absensi'=>$absensi,
            'first'=>$first,
            'end'=>$end,
        ]);*/
        return response()->json($aktivitas);
    }

    public function activityExport($first,$end){
        $aktivitas=Aktivitas::with('pegawai','customerSite.customer','jobActivity')->whereBetween('device_date_in',[$first,$end])->get();
        //$sumAbsensi=Absensi::with('pegawai')->select(DB::raw('count(*)as total'),'absensis.*')->whereBetween('server_date_in',[$first,$end])->get();
        $pegawai=Pegawai::get(['id','nama']);
        $hadir=[];
        foreach ($pegawai as $val) {
            $hadirAktivitas=Aktivitas::with('pegawai')->where('pegawai_id',$val->id)->whereBetween('device_date_in',[$first,$end])->count();
            $hadir[$val->id]=$hadirAktivitas;
        }
       
        return view('presensi.export.exportAct',[
            'aktivitas'=>$aktivitas,
            'first'=>$first,
            'end'=>$end,
            'hadir'=>$hadir,
            'pegawai'=>$pegawai
        ]);
    }

//LEAVES
}
