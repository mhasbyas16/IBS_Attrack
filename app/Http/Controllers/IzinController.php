<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\LeaveType as type;
use App\Leave;
use Illuminate\Support\Facades\Validator;

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

    public function izinPost(Request $request){
        $valid = Validator::make($request->all(), [
            'Uphoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($valid->fails()) {
            return back()->with('alert',"Max 1 MB Photo use front camera, Or change your resolution");
        }else{
            $url="https://www.ibs-attrack.com/android/attrack2/activity-images/";
            $peg=$request->pegawai;
            $type=$request->type;
            $alasan=$request->alasan;
            $date=date("ymds");

            if ($request->hasFile('Uphoto')) {
                $image = $request->file('Uphoto');
                $name = $image->getClientOriginalExtension();
                $photoName=$peg."-".$date.".".$name;
                $destinationPath = public_path('../../android/attrack2/activity-images/');
                $image->move($destinationPath, $photoName);
                
                $data=[
                    "pegawai_id"=>$peg,
                    "table_code_id"=>"0",
                    "date"=>date("Y-m-d"),
                    "leave_type_id"=>$type,
                    "reason"=>$alasan,
                    "foto"=>$url.$photoName,
                ];
                
                try {
                    $save=Leave::insert($data);
                    return back()->with('Salert','Image Upload successfully');
                } catch (Exception $e) {
                    return back()->with('alert','Image Upload fails'.$e);
                }
            }
        }        
    }
}