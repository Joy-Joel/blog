<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=['id'];
    protected $table='post';
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}
