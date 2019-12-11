<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableCode extends Model
{
    protected $fillable=[
        'code',
        'year',
        'subject'
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
}
