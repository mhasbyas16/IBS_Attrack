<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    protected $fillable=[
        'pegawai_id',
        'table_code_id',
        'device_time_in',
        'device_date_in',
        'loc_in',
        'device_time_out',
        'device_date_out',
        'loc_out',
        'customer_site_id',
        'job_activity_id',
        'foto',
        'deskripsi',
        'check'
    ];
    public function pegawai(){
        return $this->belongsTo('App\Pegawai');
    }
    public function tableCode(){
        return $this->belongsTo('App\TableCode');
    }
    public function customerSite(){
        return $this->belongsTo('App\CustomerSite');
    }
    public function jobActivity(){
        return $this->belongsTo('App\JobActivity');
    }
}
