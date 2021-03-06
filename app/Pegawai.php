<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable=[
        'id',
        'nip',
        'nama',
        'gender',
        'email',
        'address'
    ];

    public function absensis(){
        return $this->hasMany('App\Absensi');
    }
    public function aktivitas(){
        return $this->hasMany('App\Aktivitas');
    }
    public function leaves(){
        return $this->hasMany('App\Leave');
    }
    public function fingerprints(){
        return $this->hasMany('App\Fingerprint');
    }
    public function logPegawais(){
        return $this->hasMany('App\LogPegawai');
    }
    public function jabatan(){
        return $this->belongsTo('App\Jabatan');
    }

    protected $hidden=[
        'imei',
        'password',
        'jabatan_id',
        'created_at',
        'updated_at'
    ];
}
