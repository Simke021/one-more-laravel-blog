<?php

namespace App\Http\Controllers;

use Session;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // Prikazujem ih na strani           // Uzimam sve kategorije iz baze i stavljam ih u promenljivu categories
        return view('admin.categories.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name' => 'required|max:255'
        ]);
        // dd($request->all());
        // Ubacujem u bazu novu kategoriju
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        // Flash session poruka
        Session::flash('success', 'You successfully created category.');
        // Redirekcija
        return redirect(route('categories'));
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
        // Trazim karegoriju po id-u u bazi
        $category = Category::find($id);
        // Prikatujem je na strani
        return view('admin.categories.edit')->with('category', $category);
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
        // Trazim karegoriju po id-u u bazi
        $category = Category::find($id);
        // Ubacujem u bazu editovanu kategoriju
        $category->name = $request->name;
        $category->save();
        // Flash session poruka
        Session::flash('success', 'You successfully updated category.');
        // Redirekcija
        return redirect(route('categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        // Brisem sve postove koji su vezani za kategoriju
        foreach($category->posts as $post){
            $post->delete();
        };
        // ili forceDelte() ako zelim da obrisem skroz post iz baze
        $category->delete();
        // Flash session poruka
        Session::flash('success', 'You successfully deleted category and trash all posts with that category.');
        return redirect(route('categories'));
    }
}
