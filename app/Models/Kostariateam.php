<?php

namespace Kostaria\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kostaria\Notifications\KostariateamResetPasswordNotification;

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
        'name', 'email', 'password', 'address', 'phone', 'regency_id', 'regency_id_birth', 'birth_date', 'nik'
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

    public function boardinghouse(){
        return $this->hasMany('Kostaria\Models\Boardinghouse');
    }

    // public function owner(){
    //     return $this->belongsTo('Kostaria\Models\Owner', 'mou', 'kostariateam_id', 'owner_id');  
    // }

    public function mou(){
        return $this->hasMany('Kostaria\Models\MOU');
    }

    
}
