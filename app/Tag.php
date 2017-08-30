<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //Many to many 
    public function posts()
    {
    	return $this->belongsToMany('App\Post');
    }
}
