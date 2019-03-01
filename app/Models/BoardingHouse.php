<?php

namespace Kostaria\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoardingHouse extends Model
{
    use SoftDeletes;
    protected $table = 'boardinghouses';        
    
    public function regency(){
        return $this->belongsTo('Kostaria\Models\Regency');
    }

    public function chamber(){
        return $this->hasMany('Kostaria\Models\Chamber');
    }

    public function Review(){
        return $this->hasMany('Kostaria\Models\Review');
    }

    public function owner(){
        return $this->belongsTo('Kostaria\Models\Owner');   
    }
}
