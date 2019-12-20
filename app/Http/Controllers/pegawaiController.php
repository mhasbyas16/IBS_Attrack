<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

class pegawaiController extends Controller
{
    
	public function pegawaiStore(Request $request){
		$nip = $request->nip;
	    $nama = $request->nama;
	    $jabatan = $request->jabatan;
	    $jk = $request->jk;
	    $email = $request->email;
	    $alamat = $request->alamat;
	    $imei = $request->imei;
	    $password = $request->password;

		$data=[
			'nip',$nip,
	        'password'=>$nama,
	        'jabatan_id'=>$jabatan,
	        'imei'=>$jk,
	        'nama'=>$email,
	        'gender'=>$alamat,
	        'email'=>$imei,
	        'address'=>$password
		];

		Pegawai::insert($data);
		return redirect()->back();
                
	}
}
