<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HPegawai extends Model
{
    protected $fillable=[
        'nip',
        'password',
        'hakases',
        'imei'
    ];

    public function absensis(){
        return $this->hasMany('App\Absensi');
    }
    public function aktivitas(){
        return $this->hasMany('App\Aktivitas');
    }
    public function dPegawai(){
        return $this->hasOne('App\DPegawai');
    }
}
