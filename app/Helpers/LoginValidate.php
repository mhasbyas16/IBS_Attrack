<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class LoginValidate(){
        public static function loginV(){
            if (Session::has('id')) {
                # code...
            }
        }
    }

?>