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
        'title', 'content', 'category_id',  'featured', 'slug', 'user,id'
    ];

    public function getFeaturedAttribute($featured){
        // ceo path slike
        return asset($featured);
    }

    protected $dates = ['deleted_at'];

    // One to many
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
    // Many to many 
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    // Veza izmedju postova i user-a
    public function user(){
        return $this->belongsTo('App\User');
    }
}
