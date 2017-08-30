<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
	   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'category_id',  'featured', 'slug'
    ];

    public function getFeaturedAttribute($featured){
        return asset($featured);
    }

    protected $dates = ['deleted_at'];

    // One to many
    public function categories()
    {
    	return $this->belongsTo('App\Category');
    }
    // Many to many 
    public function tags()
    {
        return $this->belongsToMany('App\Tags');
    }
}
