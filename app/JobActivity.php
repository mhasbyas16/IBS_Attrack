<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobActivity extends Model
{
    protected $fillable=[
        'jabatan_id',
        'jenis_kegiatan'
    ];

    public function aktivitas(){
        return $this->hasMany('App\Aktivitas');
    }
}
