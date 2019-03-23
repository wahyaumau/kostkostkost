<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    protected $table = 'regencies';

    public function province(){
        return $this->belongsTo('App\Models\Province');
    }

    public function district(){
        return $this->hasMany('App\Models\District');
    }

    public function mou(){
        return $this->hasMany('App\Models\Mou');
    }

}
