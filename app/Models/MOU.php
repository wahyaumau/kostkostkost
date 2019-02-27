<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MOU extends Model
{
	protected $table = 'mou';
    public function kostariateam(){
    	return $this->belongsTo('App\Models\Kostariateam');
    }
    public function owner(){
    	return $this->belongsTo('App\Models\Owner');
    }
}
