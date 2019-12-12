<?php

namespace App\Http\Controllers;

use App\HPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //LOGIN
    public function login(){
        return view('login');
    }

    public function validate(Request $req){
        $nip=$req->nip;
        $pass=md5($req->pass);

        $sql=HPegawai::with('dPegawai','jabatan')->where('nip',$nip);
        $count=$sql->count();
        
        if ($count>=1) {
            $user=$sql->first();
            if ($pass==$user->password) {
                if ($user->hakakses=='user') {
                    abort(403,"403 Forbidden");
                }else{
                    Session::put('id',$user->id);
                    Session::put('rule',$user->hakakses);
                    Session::put('jabatan',$user->jabatan->nama);
                    Session::put('nama',$user->dPegawai->nama);
    
                    return redirect()->route('dash.index');
                }            
                
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
