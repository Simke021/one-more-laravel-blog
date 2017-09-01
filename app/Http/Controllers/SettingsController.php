<?php

namespace App\Http\Controllers;

use Session;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
	public function __construct()
    {
        // Samo admin moze da pristupi users delu u admin panel-u
        $this->middleware('admin');
    }

	public function index()
	{
		return view('admin.settings.settings')->with('settings', Setting::first());
	}

    public function update()
    {
    	// Validacija
    	$this->validate(request(), [
    		'site_name'      => 'required',
    		'contact_number' => 'required',
    		'contact_email'  => 'required',
    		'address'        => 'required'
    	]);

    	$settings = Setting::first();
    	// Uzimam podatke iz forme
    	$settings->site_name      = request()->site_name;
    	$settings->contact_number = request()->contact_number;
    	$settings->contact_email  = request()->contact_email;
    	$settings->address        = request()->address;

    	$settings->save();

    	// Flash poruka
    	Session::flash('success', 'Site settings updated successfully.');
    	// Redirekcija
    	return redirect()->back();
    }
}
