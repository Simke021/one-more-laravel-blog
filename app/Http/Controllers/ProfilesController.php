<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {
        // Validacija
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email',
            'facebook' => 'required|url',
            'twitter'  => 'required|url'
        ]);

        // Radim update
        $user = Auth::user();
            // Proveravam da li je user promenuo avatar
            if($request->hasFile('avatar'))
            {
                $avatar = $request->avatar;
                // Menjam ime avatar-a kako nebi doslo do greske ukoliko postoje dva avatara sa istim imenom
                $avatar_new_name = time() . $avatar->getClientOriginalName();
                // Move to path
                $avatar->move('uploads/avatars', $avatar_new_name);

                $user->profile->avatar = 'uploads/avatars/' . $avatar_new_name;
                $user->profile->save();
            }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->facebook = $request->facebook;
        $user->profile->twitter  = $request->twitter;   
        $user->profile->about = $request->about;    

            // Proveravam da li je user menjao sifru
            if ($request->has('password')) {
                $user->password = bcrypt($request->password);
            }

        $user->save();
        $user->profile->save();

        // Flash poruka
        Session::flash('success', 'Profile updated successfully.');
        // Redirekcija
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
