<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use App\Profile;

class UsersController extends Controller
{

    public function __construct()
    {
        // Samo admin moze da pristupi users delu u admin panel-u
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create')->with('users', User::all());
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
            'name' => 'required',
            'email' => 'required|email'
        ]);
        // Ubacujem u bazu
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt('password')
        ]);
        // Profil user-a
        $profile = Profile::create([
            'user_id'  => $user->id,
            // Default avatar
            'avatar'   => 'uploads/avatars/avatar.png'
        ]);
        // Flash popruka
        Session::flash('success', 'User added successfully.');
        // Redirekcija
        return redirect()->route('users');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        // Brisem profil user-a
        $user->profile->delete();
        // Brisem user-a
        $user->delete();
        // Flash poruka
        Session::flash('success', 'User deleted successfully');
        // Redirekcija
        return redirect()->back();
    }

    // Make admin
    public function admin($id)
    {
        $user = User::find($id);
        // menjam boolian vrednost admin sa 0 na 1
        $user->admin = 1;
        $user->save();

        Session::flash('success', 'Successfully changed user permission.');
        return redirect()->back();
    }

    // Not admin
    public function not_admin($id)
    {
        $user = User::find($id);
        // menjam boolian vrednost admin sa 1 na 0
        $user->admin = 0;
        $user->save();

        Session::flash('success', 'Successfully changed user permission.');
        return redirect()->back();

    }
}
