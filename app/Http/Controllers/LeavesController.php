<?php

namespace App\Http\Controllers;

use App\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LeavesController extends Controller
{
    public function leaves(){
        $sessionDept=Session::get('dept');
        $first=date('Y-m-01');
        $end=date('Y-m-31');
        if($sessionDept=='0'){
            $isi=Leave::with('pegawai','leaveType')->whereBetween('date',[$first,$end]);
            $leave=$isi->get();
        }else{
            $isi=Leave::with('pegawai','leaveType')->whereBetween('date',[$first,$end]);
            $leave=$isi->get();
        }
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
