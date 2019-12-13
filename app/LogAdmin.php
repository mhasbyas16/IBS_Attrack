<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogAdmin extends Model
{
    protected $fillable=[
        'user_id',
        'mac_address',
        'ip_address',
        'message'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
}
