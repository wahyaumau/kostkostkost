<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';        

    public function boardingHouse(){
        return $this->belongsTo('App\Models\BoardingHouse');
    }    

    public function user(){
        return $this->belongsTo('App\Models\User');
    } 
}
