<?php

namespace App\Http\Controllers\API;

use App\ApiToken;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Pegawai;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user(Request $req){
        $auth=$req->header('Authorization');
        $sql=ApiToken::where('api_token',$auth);
        $data=$sql->first();
        $token=$sql->count();
        if ($token==1) {
            $user=User::all();
            return [
                'status_code'=>$data->status,
                'message'=>$data->message,
                'response'=>$user
            ]; 
        }else {
            return [
                'status_code'=>'403',
                'message'=>'Access Forbidden'
            ];
        }        
    }

    public function listPegawai(Request $req){
        $auth=$req->header('Authorization');
        $sql=ApiToken::where('api_token',$auth);
        $data=$sql->first();
        $token=$sql->count();
        if ($token==1) {
            $username=$req->username;
            $password=$req->password;
            
            if ($username == $data->username) {
                if (Hash::check($password, $data->password)) {
                    $pegawai=Pegawai::with('jabatan','jabatan.kelompokDept')->get();
                    $dataPeg=[];
                    foreach($pegawai as $item){
                        $isi=[
                            'id'=>$item->id,
                            'nip'=>$item->nip,
                            'nama'=>$item->nama,
                            'gender'=>$item->gender,
                            'email'=>$item->email,
                            'address'=>$item->address,
                            'jabatan'=>$item->jabatan->nama,
                            'kelompokDept'=>$item->jabatan->kelompokDept->nama,
                        ];
                        $dataPeg[]=$isi;
                    }
                    return [
                        'status_code'=>$data->status,
                        'message'=>$data->message,
                        'data'=>$dataPeg          
                    ];
                }else {
                    return [
                        'status_code'=>'403',
                        'message'=>'Access Forbidden'
                    ];
                }
            }else{
                return [
                    'status_code'=>'403',
                    'message'=>'Access Forbidden'
                ];
            } 
        }else {
            return [
                'status_code'=>'403',
                'message'=>'Access Forbidden'
            ];
        }
    }
}
