<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{    
    protected $table = 'transactions';
    protected $fillable = [
        'dp',
        'payment_proof',        
    ];

    protected $guarded = [
        'id'
    ];
    

    public function user(){
        return $this->belongTo('App\Models\User');
    }

    public function chamber(){
        return $this->belongTo('App\Models\Chamber');
    }
}
