<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\LeaveType as type;

class IzinController extends Controller
{
    public function izin (){
        $peg = Pegawai::orderBy('nama','asc')->get();
        $type = type::all();
        return view('izin',[
            "peg"=>$peg,
            "type"=>$type
        ]);
    }
}
