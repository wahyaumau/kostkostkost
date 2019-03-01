<?php

namespace Kostaria\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Owner extends Model
{
    use SoftDeletes;
    protected $table = 'owners';    
    // protected $fillable = [
    //     'name',
    //     'nik',                    
    //     'address',                            
    //     'phone',   
    //     'regency_id',
    //     'regency_id_birth', 
    //     'birth_date', 
    //     'nik'
    // ];

    // protected $guarded = [
    //     'id'
    // ];

    protected $dates = ['deleted_at'];
    
    public function regency(){
        return $this->belongsTo('Kostaria\Models\Regency');
    }

    public function boardinghouse(){
        return $this->hasMany('Kostaria\Models\Boardinghouse');
    }

    // public function kostariateam(){
    //     return $this->belongsToMany('Kostaria\Models\Owner', 'mou', 'owner_id', 'kostariateam_id');
    // }
    public function mou(){
        return $this->hasMany('Kostaria\Models\MOU');
    }
    
}
