<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSite extends Model
{
    protected $fillable=[
        'customer_id',
        'customer_site',
        'pic',
        'phone'
    ];

    public function aktivitas(){
        return $this->hasMany('App\Aktivitas');
    }
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
