<?php

namespace Kostaria\Models;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    protected $table = 'regencies';
    // protected $fillable = [
    //     'name'
    // ];

    // protected $guarded = [
    //     'id'
    // ];

    public function province(){
        return $this->belongsTo('Kostaria\Models\Province');
    }

    public function user(){
        return $this->hasOne('Kostaria\Models\User');
    }

    public function boardinghouse(){
        return $this->hasOne('Kostaria\Models\BoardingHouse');
    }

    public function university(){
        return $this->hasOne('Kostaria\Models\University');
    }
}
