<?php

namespace App\Http\Controllers;

use App\User as AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //LOGIN
    public function login(){
        return view('login');
    }

    public function validate(Request $req){
        $username=$req->nip;
        $pass=$req->pass;

        $sql=AppUser::with('kelompokDept')->where('username',$username);
        $count=$sql->count();
        
        if ($count>=1) {
            $user=$sql->first();
            if (Hash::check($pass, $user->password) ) {
                if ($user->kelompok_dept_id=='0') {
                    Session::put('dept','superadmin');
                    
                }else{
                    Session::put('dept',$user->kelompokDept->nama);
                }
                    Session::put('id',$user->id);
                    Session::put('rule',$user->rule);                    
                    Session::put('nama',$user->name);
    
                    return redirect()->route('dash.index');            
                
            }elseif ($pass!=$user->password) {
                return redirect()->back()->with('alert','Your Password Is Wrong, Please Try Again');
            }    
        }elseif($count==0){
            return redirect()->back()->with('alert','Your Account Can'."'".'t Find, Please Contact Administrator');
        }                     
    }

    //LOGOUT
    public function logout(){
        Session::flush();
        return redirect()->route('login.index');
    }
}
