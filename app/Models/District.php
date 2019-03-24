<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
	protected $table = 'districts';
	public $timestamps = false;
    public function regency(){
        return $this->belongsTo('App\Models\Regency');
    }

    public function village(){
        return $this->hasMany('App\Models\Village');
    }
}
