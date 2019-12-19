<?php

namespace App\Http\Controllers;

use App\Absensi;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function attendance(){
        $first=date('Y-m-d');
        $end=date('Y-m-31');
        $absensi=Absensi::with('pegawai')->whereBetween('server_date_in',[$first,$end])->get();
        return view('presensi.attendance',[
            'absensi'=>$absensi
        ]);
    }
}
