<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'category_id',  'featured'
    ];

    //
    public function categories()
    {
    	return $this->belongsTo('App\Category');
    }
}
