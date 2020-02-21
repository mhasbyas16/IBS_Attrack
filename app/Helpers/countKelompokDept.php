<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Pegawai;

class countKelompokDept {
    public static function manajemen($id) {
        Pegawai::join("jabatans","jabatans.id","=","pegawais.jabatan_id")
        ->join("kelompok_depts","kelompok_depts.id","=","jabatans.kelompok_dept_id")
        ->where("kelompok_depts.id",$id)->count();
    }
}