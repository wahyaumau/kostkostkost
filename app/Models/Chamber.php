<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamber extends SoftDelete
{    
	protected $table = 'chambers';    

    public function boardinghouse(){
        return $this->belongsTo('App\Models\BoardingHouse');
    }    

    public function usersTransaction(){
        return $this->belongsToMany('App\Models\User', 'transactions', 'chamber_id', 'user_id')->withPivot(['dp', 'payment_proof', 'deleted_at'])->withTimestamps();
    }

    public function usersTag(){
        return $this->belongsToMany('App\Models\User', 'chamber_user_tag', 'chamber_id', 'user_id')->withTimestamps();
    }
    
}
