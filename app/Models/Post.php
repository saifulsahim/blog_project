<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded= ['created_at,updated_at'];
    protected $dates = ['published_at'];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');

    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');

    }
    public function comment()
    {
        return $this->hasMany('App\Models\Comment');

    }

}

