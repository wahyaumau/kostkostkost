<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chamber extends Model
{    
    use SoftDeletes;
    protected $table = 'chambers';        

    protected $dates = ['deleted_at'];

    public function boardinghouse(){
        return $this->belongsTo('App\Models\BoardingHouse');
    }    

    public function transaction(){
        return $this->hasMany('App\Models\Transaction');
    }
}
