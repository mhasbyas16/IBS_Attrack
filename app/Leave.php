<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'table_code_id',
        'pegawai_id',
        'date',
        'type',
        'foto'
    ];

    public function tableCode(){
        return $this->belongsTo('App\TableCode');
    }
    public function pegawai(){
        return $this->belongsTo('App\Pegawai');
    }
}
