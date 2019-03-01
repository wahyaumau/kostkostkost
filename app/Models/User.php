<?php

namespace Kostaria\Models;

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

    public function regency(){
        return $this->belongsTo('Kostaria\Models\Regency');
    }

    public function university(){
        return $this->belongsTo('Kostaria\Models\University');
    }

    public function chamber(){
        return $this->hasMany('Kostaria\Models\Chamber');
    }

    public function review(){
        return $this->hasMany('Kostaria\Models\Review');
    }

    public function transaction(){
        return $this->hasMany('Kostaria\Models\Transaction');
    }
}
