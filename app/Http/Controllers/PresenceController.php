<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Aktivitas;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
//ATTENDANCE
    public function attendance(){
        $first=date('Y-m-01');
        $end=date('Y-m-31');
        $absensi=Absensi::with('pegawai')->whereBetween('server_date_in',[$first,$end])->get();
        return view('presensi.attendance',[
            'absensi'=>$absensi
        ]);
    }
//ACTIVITY
    public function activity(){
        $f=date('Y-m-01');
        $e=date('Y-m-31');
        $aktivitas=Aktivitas::with('pegawai','customerSite.customer','jobActivity')->whereBetween('device_date_in',[$f,$e])->get();
        return view('presensi.activity',['aktivitas'=>$aktivitas]);
    }

//LEAVES
}
