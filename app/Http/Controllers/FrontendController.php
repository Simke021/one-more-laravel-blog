<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Setting;
use App\Category;

class FrontendController extends Controller
{
    public function index()
    {
    	// Index page               
    	return view('index')->with('title', Setting::first()->site_name)   // title sajta 
    						->with('categories', Category::take(5)->get()) // 5 kategorije prikazujem
    						->with('first_post', Post::orderBy('created_at', 'desc')->first()) // prvi post
    						->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first()) // drugi post
    						->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())  // treci post
    						->with('wordpress', Category::find(8)) // wordpress kategorija
    						->with('php', Category::find(11))      // php kategorija
    						->with('mysql', Category::find(12))    // wordpress kategorija
    						->with('settings', Setting::first());    // settings
    }

    public function singlePost($slug)
    {
    	// Uzimam iz tabele post - slug
    	$post = Post::where('slug', $slug)->first();
    	// Next post - sledeci id
    	$next_id = Post::where('id', '>', $post->id)->min('id');
    	// Prevous post - prethodni id
    	$prev_id = Post::where('id', '<', $post->id)->max('id');



    	// Prikazujem na strani odgovarajuci post
    	return view('single')->with('post', $post)           // ceo post
    						 ->with('title', $post->title)   // title post-a 
    						 ->with('categories', Category::take(5)->get()) // 5 kategorije prikazujem;
    						 ->with('settings', Setting::first())    // settings
    						 ->with('next', Post::find($next_id))    // next post
    						 ->with('prev', Post::find($prev_id));    // prevous post
    }
}
