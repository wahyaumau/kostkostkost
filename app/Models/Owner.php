<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends SoftDelete
{    
    protected $table = 'owners';            
    
    public function village(){
        return $this->belongsTo('App\Models\Village');
    }

    public function boardinghouse(){
        return $this->hasMany('App\Models\Boardinghouse');
    }
    
    public function mou(){
        return $this->hasMany('App\Models\MOU');
    }
    
}
