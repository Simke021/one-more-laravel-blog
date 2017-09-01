<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	// Veza izmedju tabele user i profile
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
