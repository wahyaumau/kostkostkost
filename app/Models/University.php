<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = 'universities';    
    // protected $fillable = [
    //     'name',
    //     'address'        
    // ];

    // protected $guarded = [
    //     'id'
    // ];

    public function regency(){
        return $this->belongsTo('App\Models\Regency');
    }
}
