<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $table = 'posts';    
    // protected $fillable = [
    //     'title',
    //     'description',
    //     'picture',        
    // ];

    // protected $guarded = [
    //     'id'
    // ];

    protected $dates = ['deleted_at'];
}
