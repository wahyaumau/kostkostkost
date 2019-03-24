<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{    	
    protected $table = 'universities';
	public $timestamps = false;
    public function village(){
        return $this->belongsTo('App\Models\Village');
    }
}
