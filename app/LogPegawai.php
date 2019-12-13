<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPegawai extends Model
{
    protected $fillable=[
        'pegawai_id',
        'imei_phone',
        'message'
    ];

    public function pegawai(){
        return $this->belongsTo('App\Pegawai');
    }
}
