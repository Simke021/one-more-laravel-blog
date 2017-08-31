<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tags.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'tag' => 'required'
        ]);
        // Ubacujem tag u bazu
        Tag::create([
            'tag' => $request->tag
        ]);

        // Flash session poruka
        Session::flash('success', 'You successfully created tag.');
        // Redirekcija
        return redirect(route('tags'));
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
        // Trazim tag po id-u u bazi
        $tag = Tag::find($id);
        // Prikatujem je na strani
        return view('admin.tags.edit')->with('tag', $tag);
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
            'tag' => 'required'
        ]);
        // Trazim tag po id-u u bazi
        $tag = Tag::find($id);
        // Ubacujem u bazu editovan tag
        $tag->tag = $request->tag;
        $tag->save();
        // Flash session poruka
        Session::flash('success', 'You successfully updated tag.');
        // Redirekcija
        return redirect(route('tags'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);
        // Flash session poruka
        Session::flash('success', 'You successfully deleted tag.');
        return redirect(route('tags'));
    }
}
