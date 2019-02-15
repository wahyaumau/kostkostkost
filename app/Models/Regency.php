<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    protected $table = 'regency';
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
        return $this->belongsTo('App\Models\User');
    }

    public function boardinghouse(){
        return $this->belongsTo('App\Models\BoardingHouse');
    }

    public function university(){
        return $this->belongsTo('App\Models\University');
    }
}
