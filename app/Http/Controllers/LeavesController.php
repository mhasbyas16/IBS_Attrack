<?php

namespace App\Http\Controllers;

use App\Leave;
use Illuminate\Http\Request;

class LeavesController extends Controller
{
    public function leaves(){
        $first=date('Y-m-01');
        $end=date('Y-m-31');
        $isi=Leave::with('pegawai','leaveType')->whereBetween('date',[$first,$end]);
        $leave=$isi->get();
        return view('presensi.leaves',[
            'leave'=>$leave,
            'first'=>$first,
            'end'=>$end]);
    }
    public function Searchleaves(Request $req){
        $first=$req->min;
        $end=$req->max;
        $leave=Leave::with('pegawai','leaveType')->whereBetween('date',[$first,$end])->get();
        
        return response()->json($leave);
    }
}
