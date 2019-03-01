<?php

namespace Kostaria\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    // protected $fillable = [
    //     'name'
    // ];

    // protected $guarded = [
    //     'id'
    // ];

    public function regency(){
        return $this->hasMany('Kostaria\Models\Regency');
    }       
}
