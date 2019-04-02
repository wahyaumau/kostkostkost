<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone', 'lineId', 'parent', 'parent_phone', 'village_id', 'university_id', 'chamber_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];    

    public function village(){
        return $this->belongsTo('App\Models\Village');
    }

    public function university(){
        return $this->belongsTo('App\Models\University');
    }

    public function chamber(){
        return $this->hasMany('App\Models\Chamber');
    }

    public function review(){
        return $this->hasMany('App\Models\Review');
    }

    public function chambersTransaction(){
        return $this->belongsToMany('App\Models\Chamber', 'transactions', 'user_id', 'chamber_id')->withTimestamps();
    }

    public function chambersTag(){
        return $this->belongsToMany('App\Models\Chamber', 'chamber_user_tag', 'user_id', 'chamber_id')->withTimestamps();
    }
}
