<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable=[
        'username',
        'name',
        'email',
        'rule',
        'kelompok_dept_id'
    ];

    public function logAdmins(){
        return $this->hasMany('App\LogAdmin');
    }
    public function kelompokDept(){
        return $this->belongsTo('App\KelompokDept');
    }

    protected $hidden=[
        'password'
    ];
}
