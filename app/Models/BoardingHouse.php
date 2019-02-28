<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoardingHouse extends Model
{
    use SoftDeletes;
    protected $table = 'boardinghouses';        
    
    public function regency(){
        return $this->belongsTo('App\Models\Regency');
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
