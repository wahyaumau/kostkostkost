<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoardingHouse extends Model
{
    use SoftDeletes;
    protected $table = 'boardinghouses';    
    protected $fillable = [
        'name',            
        'description',
        'address',            
        'owner_name',
        'owner_phone',
        'facility',
        'facility_park',
        'access',
        'information_others',
        'information_cost'
    ];

    protected $guarded = [
        'id'
    ];

    protected $dates = ['deleted_at'];
    
    public function regency(){
        return $this->belongsTo('App\Models\Regency');
    }

    public function chamber(){
        return $this->hasMany('App\Models\Chamber');
    }

    public function Review(){
        return $this->hasMany('App\Models\Review');
    }
}
