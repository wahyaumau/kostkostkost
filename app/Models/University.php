<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{    	
	use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    protected $table = 'universities';    
    protected $softCascade = ['boardinghouses'];    
	public $timestamps = false;
    public function village(){
        return $this->belongsTo('App\Models\Village');
    }

    public function boardinghouses(){
    	return $this->hasMany('App\Models\Boardinghouse');	
    }
}
