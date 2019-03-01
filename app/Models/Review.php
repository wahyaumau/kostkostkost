<?php

namespace Kostaria\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';    
    // protected $fillable = [
    //     'review'
    // ];

    // protected $guarded = [
    //     'id'
    // ];    

    public function boardingHouse(){
        return $this->belongsTo('Kostaria\Models\BoardingHouse');
    }    

    public function user(){
        return $this->belongsTo('Kostaria\Models\User');
    } 
}
