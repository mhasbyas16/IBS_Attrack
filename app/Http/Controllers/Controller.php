<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    
    public function login(){
        return view('login');
    }
    public function dash(){
        return view('dashboard.dash');
    }

    public function act(){
        return view('activity.activity');
    }

    public function att(){
        return view('attendance.attendance');
    }

    public function leaves(){
        return view('leaves.leaves');
    }

    public function data1(){
        return view('data.listcustomer');
    }

    public function data2(){
        return view('data.listemployee');
    }

    public function data3(){
        return view('data.listcustside');
    }

    public function adddata1(){
        return view('data.addcustomer');
    }

    public function adddata2(){
        return view('data.addemployee');
    }

    public function adddata3(){
        return view('data.addcustside');
    }
}
