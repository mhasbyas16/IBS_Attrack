<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'table_code_id',
        'date',
        'type',
        'foto',
        'loc'
    ];

    public function tableCode(){
        return $this->belongsTo('App\TableCode');
    }
}
