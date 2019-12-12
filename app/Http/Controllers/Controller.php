<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    
    
    public function dash(){
        return view('dashboard.dash');
    }

    public function act(){
        return view('presensi.activity');
    }

    public function att(){
        return view('presensi.attendance');
    }

    public function leaves(){
        return view('presensi.leaves');
    }

    public function data1(){
        return view('pegawai.listemployee');
    }

    public function dept_grup(){
        return view('pegawai.adddeptgrup');
    }

    public function dept(){
        return view('pegawai.adddept');
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
}
