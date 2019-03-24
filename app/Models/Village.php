<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'villages';
    public $timestamps = false;
    public function district(){
        return $this->belongsTo('App\Models\District');
    }

    public function boardinghouse(){
        return $this->hasMany('App\Models\Boardinghouse');
    }

    public function kostariateam(){
        return $this->hasMany('App\Models\Kostariateam');
    }

    public function owner(){
        return $this->hasMany('App\Models\Owner');
    }

    public function university(){
        return $this->hasMany('App\Models\University');
    }

    public function user(){
        return $this->hasMany('App\Models\User');
    }
}
