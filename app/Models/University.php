<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class University extends Model
{    
	use SoftDeletes;    
    public $timestamps = false;
    public function village(){
        return $this->belongsTo('App\Models\Village');
    }
}
