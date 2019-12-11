<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelompokDept extends Model
{
    protected $fillable=[
        'nama'
    ];

    public function jabatans(){
        return $this->hasMany('App\Jabatan');
    }
}
