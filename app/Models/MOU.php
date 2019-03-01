<?php

namespace Kostaria\Models;

use Illuminate\Database\Eloquent\Model;

class MOU extends Model
{
	protected $table = 'mou';
    public function kostariateam(){
    	return $this->belongsTo('Kostaria\Models\Kostariateam');
    }
    public function owner(){
    	return $this->belongsTo('Kostaria\Models\Owner');
    }
}
