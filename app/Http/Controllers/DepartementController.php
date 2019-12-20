<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\JobActivity;
use App\KelompokDept;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
//DEPT GROUP
    public function DeptGroupIndex(){
        $dept=KelompokDept::all();

        return view ('department.adddeptgrup',[
            'dept'=>$dept
        ]);
    }
    public function DeptGroupStore(Request $req){
        $dept=$req->deptgroup;

        KelompokDept::insert(['nama'=>$dept]);

        return redirect()->back();
    }
    public function DeptGroupDestroy($id){

       $dept=KelompokDept::with('jabatans','jabatans.jobActivities')->where('id',$id)->delete();

        return response()->json($dept);
    }

//DEPT

    public function DeptIndex(){
        $cmbx=KelompokDept::with('jabatans')->orderBy('nama','asc')->get();

        return view ('department.adddept',[
            'cmbx'=>$cmbx
        ]);
    }
    public function DeptStore(Request $req){
        $IdKDept=$req->kelompokDept;
        $Dept=$req->dept;

        $in=Jabatan::insert(['kelompok_dept_id'=>$IdKDept,'nama'=>$Dept]);

        return redirect()->back();
    }
    public function DeptDestroy($id){

        $dept=Jabatan::with("jobActivities")->where('id',$id)->delete();
 
         return response()->json($dept);
     }
//JOB TYPE
public function JobTypeIndex(){
    $data=KelompokDept::with('jabatans','jabatans.jobActivities')->orderBy('nama','asc')->get();

    return view ('department.addjobtype',[
        'data'=>$data
    ]);
}
public function JobTypecmbx($id){
    $isi=Jabatan::where('kelompok_dept_id',$id)->get();

    return response()->json(['isi'=>$isi]);
}

public function JobTypeStore(Request $req){
    $Id=$req->IdDept;
    $Job=$req->job;

    $ins=JobActivity::insert(['jabatan_id'=>$Id,'jenis_kegiatan'=>$Job]);

    return redirect()->back();
}
public function JobTypeDestroy($id){

    $dept=JobActivity::where('id',$id)->delete();

     return response()->json($dept);
 }

}
