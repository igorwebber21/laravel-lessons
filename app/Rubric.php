<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    // $rubric = Rubric

    public function post()
    {
        //return $this->hasOne('App\Post');
        return $this->hasOne(Post::class);
    }

    public function posts()
    {
        //return $this->hasOne('App\Post');
        return $this->hasMany(Post::class);
    }
}
