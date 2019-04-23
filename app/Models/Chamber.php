<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamber extends SoftDelete
{        
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;    
	protected $table = 'chambers';
    protected $softCascade = ['usersTransaction', 'usersTag'];

    public function boardinghouse(){
        return $this->belongsTo('App\Models\BoardingHouse');
    }    

    public function usersTransaction(){
        return $this->belongsToMany('App\Models\User', 'transactions', 'chamber_id', 'user_id')->withPivot('payment_proof', 'payed_dp', 'rent_month_duration', 'rent_start','rent_due', 'confirmed', 'deleted_at')->withTimestamps();
    }

    public function usersTag(){
        return $this->belongsToMany('App\Models\User', 'chamber_user_tag', 'chamber_id', 'user_id')->withTimestamps();
    }
    
}
