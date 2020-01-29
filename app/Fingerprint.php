<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fingerprint extends Model
{
    protected $fillable=[
        'pegawai_id',
        'finger'
    ];

    public function pegawai(){
        return $this->belongsTo('App\Pegawai');
    }
}
