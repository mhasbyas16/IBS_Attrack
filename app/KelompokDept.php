<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelompokDept extends Model
{
    protected $fillable=[
        'nama'
    ];

    protected $hidden=[
        'created_at',
        'updated_at'
    ];

    public function jabatans(){
        return $this->hasMany('App\Jabatan');
    }
    public function users(){
        return $this->hasMany('App\User');
    }
}
