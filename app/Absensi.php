<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable=[
        'h_pegawai_id',
        'table_code_id',
        'server_time_in',
        'server_date_in',
        'device_time_in',
        'device_date_in',
        'loc_in',
        'server_time_out',
        'server_date_out',
        'device_time_out',
        'device_date_out',
        'loc_out',
        'enum'
    ];

    public function hPegawai(){
        return $this->belongsTo('App\HPegawai');
    }
    public function tableCode(){
        return $this->belongsTo('App\TableCode');
    }
}
