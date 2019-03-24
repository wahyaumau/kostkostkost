<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends SoftDelete
{
    protected $table = 'posts';        
}
