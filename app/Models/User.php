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
        'name', 'email', 'password', 'address', 'phone', 'lineId', 'parent', 'parent_phone', 'regency_id', 'university_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];    

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

    public function transaction(){
        return $this->hasMany('App\Models\Transaction');
    }
}
