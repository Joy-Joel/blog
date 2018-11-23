<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
protected $guarded=['id'];
protected $table='comments';
//add other fields
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
