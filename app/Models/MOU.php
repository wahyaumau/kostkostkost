<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mou extends SoftDelete
{
	protected $table = 'mou';
    public function kostariateam(){
    	return $this->belongsTo('App\Models\Kostariateam');
    }
    public function owner(){
    	return $this->belongsTo('App\Models\Owner');
    }
    public function regency(){
    	return $this->belongsTo('App\Models\Regency');
    }
}
