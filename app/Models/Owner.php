<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends SoftDelete
{   
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    protected $table = 'owners'; 
    protected $softCascade = ['boardinghouse'];

    
    public function village(){
        return $this->belongsTo('App\Models\Village');
    }

    public function boardinghouse(){
        return $this->hasMany('App\Models\Boardinghouse');
    }
    
    public function mou(){
        return $this->hasOne('App\Models\MOU');
    }
    
}
