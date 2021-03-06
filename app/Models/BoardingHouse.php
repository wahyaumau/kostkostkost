<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Boardinghouse extends SoftDelete
{        
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    protected $table = 'boardinghouses';    
    protected $softCascade = ['chamber'];
    
    public function village(){
        return $this->belongsTo('App\Models\Village');
    }

    public function chamber(){
        return $this->hasMany('App\Models\Chamber');
    }

    public function Review(){
        return $this->hasMany('App\Models\Review');
    }

    public function owner(){
        return $this->belongsTo('App\Models\Owner');   
    }

    public function university(){
        return $this->belongsTo('App\Models\University');
    }
}
