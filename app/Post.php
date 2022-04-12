<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'idpost';
    protected $fillable = [
        'title', 'content', 'date',
    ];
}
