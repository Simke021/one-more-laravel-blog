<?php

namespace App\Http\Middleware;

use Session;
use Auth;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Proveravam da li user ima dozvolu da menja permission, tj. da li je ovlascen za to
        if(!Auth::user()->admin)
        {
            // Session info poruka
            Session::flash('info', 'You do not have permission to perform this action.');
            // Redirekcija
            return redirect()->back();
        }
        return $next($request);
    }
}
