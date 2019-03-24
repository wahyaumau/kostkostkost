<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\KostariateamResetPasswordNotification;

class Kostariateam extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $guard='kostariateam';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone', 'village_id', 'regency_id_birth', 'birth_date', 'nik'
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

    public function regencyBirth(){
        return $this->belongsTo('App\Models\Regency', 'regency_id_birth', 'id');
    }

    public function boardinghouse(){
        return $this->hasMany('App\Models\Boardinghouse');
    }

    public function mou(){
        return $this->hasMany('App\Models\MOU');
    }

}
