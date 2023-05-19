<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        //first we check if the user is authenticated or not
        //if not authenticated then we redirect to the
        //login route
        if(!Auth::check()){
            return redirect()->route('login');
        }

        //we use skewed logic because if user tries to access admin route
        //without having the privilege then we redirect them to
        //the teacher's route

        $home = $role == "admin"? "/":"/admin/dashboard";
 
        if (! $request->user()->isAdmin()) {
            return redirect($home)->with('error', "You are not authorized!");
        }

        return $next($request);
    }
}
