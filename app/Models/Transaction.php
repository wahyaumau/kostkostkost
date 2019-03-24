<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends SoftDelete
{    
    protected $table = 'transactions';
    
    public function user(){
        return $this->belongTo('App\Models\User');
    }

    public function chamber(){
        return $this->belongTo('App\Models\Chamber');
    }
}
