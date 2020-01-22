<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable=[ 
        'nama'
    ];

    protected $hidden=[
        'kelompok_dept_id',
        'created_at',
        'updated_at'
    ];
    public function kelompokDept(){
        return $this->belongsTo('App\KelompokDept');
    }
    public function jobActivities(){
        return $this->hasMany('App\JobActivity');
    }
    public function pegawais(){
        return $this->hasMany('App\Pegawai');
    }
}
