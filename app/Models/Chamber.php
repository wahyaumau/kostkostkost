<?php

namespace Kostaria\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chamber extends Model
{    
    use SoftDeletes;
    protected $table = 'chambers';    
    // protected $fillable = [
    //     'name',
    //     'price_monthly',
    //     'price_annual',
    //     'gender',
    //     'chamber_size',
    //     'chamber_facility',        
    // ];

    // protected $guarded = [
    //     'id'
    // ];

    protected $dates = ['deleted_at'];

    public function boardinghouse(){
        return $this->belongsTo('Kostaria\Models\BoardingHouse');
    }    

    public function transaction(){
        return $this->hasMany('Kostaria\Models\Transaction');
    }
}
