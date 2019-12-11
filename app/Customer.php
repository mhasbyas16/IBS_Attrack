<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=[
        'cust_name',
        'address'
    ];

    public function customerSites(){
        return $this->hasMany('App\CustomerSite');
    }
}
