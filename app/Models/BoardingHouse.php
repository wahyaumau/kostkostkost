<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boardinghouse extends Model
{
    use SoftDeletes;
    protected $table = 'boardinghouses';        
    
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
}
