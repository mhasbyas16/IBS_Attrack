<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DPegawai extends Model
{
    protected $fillable=[
        'h_pegawai_id',
        'nama',
        'gender',
        'email',
        'address'    
    ];

    public function hPegawai(){
        return $this->belongsTo('App\HPegawai');
    }
}
