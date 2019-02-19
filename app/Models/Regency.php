<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    protected $table = 'regencies';
    protected $fillable = [
        'name'
    ];

    protected $guarded = [
        'id'
    ];

    public function province(){
        return $this->belongsTo('App\Models\Province');
    }

    public function user(){
        return $this->hasOne('App\Models\User');
    }

    public function boardinghouse(){
        return $this->hasOne('App\Models\BoardingHouse');
    }

    public function university(){
        return $this->hasOne('App\Models\University');
    }
}
