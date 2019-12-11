<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable=[
        'kelompok_dept_id',
        'nama'
    ];

    public function kelompokDept(){
        return $this->belongsTo('App\KelompokDept');
    }
    public function jobTypes(){
        return $this->hasMany('App\JobType');
    }
}
