<?php

namespace App\Http\Controllers;

use App\ApiToken;
use App\Http\Controllers\Controller;
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
}
