<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
    protected $fillable=[
        'status',
        'message'
    ];

    protected $hidden=[
        'api_token'
    ];
}
