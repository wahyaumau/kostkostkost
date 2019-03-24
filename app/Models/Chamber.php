<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamber extends SoftDelete
{    
	protected $table = 'chambers';    

    public function boardinghouse(){
        return $this->belongsTo('App\Models\BoardingHouse');
    }    

    public function transaction(){
        return $this->hasMany('App\Models\Transaction');
    }
}
