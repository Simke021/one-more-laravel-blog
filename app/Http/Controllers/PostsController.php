<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Uzimam sve kategorije
        $categories = Category::all();
        // Uzimam sve tagove
        $tags = Tag::all();
        // Proveravam da li postoji karegorija ili tagova
        if($categories->count() == 0 || $tags->count() == 0){
            // Poruka da nema karegorija i tagova
            Session::flash('info', 'You must have some categories and tags before attemting to create a post.');
            // Redirekcija
            return redirect()->back();
        }
        // Ubacijem kategorije na stranu 
        return view('admin.posts.create')->with('categories' , $categories)
                                        // Ubacujem tags
                                         ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validacija
        $this->validate($request, [
            'title'       => 'required|max:255',
            'featured'    => 'required|image',
            'content'     => 'required',
            'category_id' => 'required', 
            'tags'        => 'required'
        ]);
        // Kupim verdnosti iz forme
        $featured = $request->featured;
        // Menjam ime slike kako nebi bile dve slike sa istim nazivom
        $featured_new_name = time() . $featured->getClientOriginalName();
        // Cuvam sliku u folderu public/uploads/posts
        $featured->move('uploads/posts', $featured_new_name);
        // Ubacujem u post sve iz forme
        $post = Post::create([
            'title'       => $request->title,
            'content'     => $request->content,
            'featured'    => 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug'        => str_slug($request->title)  // Create new laravel project === create-new-laravel-project
        ]);   
        // Dodajem selektovane tagove u post, metodom attach()
        $post->tags()->attach($request->tags);;
        // Flash message
        Session::flash('success', 'Post created successfully.');
        // Redirekcija
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Uzimam post iz baze po id-u
        $post = Post::find($id);
        // Prikazujem ga na strani za editovanje sa svim kategorijama i tagovima
        return view('admin.posts.edit')->with('post', $post)
                                       ->with('categories', Category::all())
                                       ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validacija
        $this->validate($request, [
            'title'       => 'required',
            'content'     => 'required',
            'category_id' => 'required'
        ]);
        // Trazim post u bazi po id-u
        $post = Post::find($id);
        // Proveravam da li je admin uradio update slike
        if ($request->hasFile('featured')) {
            // Uzimam sliku iz forme
            $featured = $request->featured;
            // Menjam joj ime kako nebi doslo do greske ako se pojave dve slike sa istim imenom
            $featured_new_name = time() . $featured->getClientOriginalName();
            // Path slike i ubacujem je
            $featured->move('uploads/posts', $featured_new_name);
            //Update-ujem sliku sa novim imenom
            $post->featured = 'uploads/posts/' . $featured_new_name;
        }
        // Update-ujem post
        $post->title       = $request->title;
        $post->content     = $request->content;
        $post->category_id = $request->category_id;

        $post->save();
        // Update-ujem tagove u postu
        $post->tags()->sync($request->tags);
        // Flash message
        Session::flash('success', 'Post updated successfully.');
        // Redirekcija
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Trazim post po id-u
        $post = Post::find($id);
        // Brisem post
        $post->delete();
        // Flash message
        Session::flash('success', 'Your post was just trashed.');
        // Redirekcija
        return redirect()->back();
    }

    public function trashed()
    {
        // Utimam trashed postove iz baze
        $posts = Post::onlyTrashed()->get();
        // Prikazujem ih na strani
        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id)
    {
        // Uzimam iz baze trashed post po id-u
        $post = Post::withTrashed()->where('id', $id)->first();
        // Brisem iz baze 
        $post->forceDelete();
        // Flash message
        Session::flash('success', 'Post deleted permanently.');
        // Redirekcija
        return redirect()->back();
    }
    public function restore($id)
    {
        // Uzimam iz baze trashed post po id-u
        $post = Post::withTrashed()->where('id', $id)->first();
        // Radim restore 
        $post->restore();
        // Flash message
        Session::flash('success', 'Post restored successfully');
        // Redirekcija
        return redirect()->route('posts');
    }
}
