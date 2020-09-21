<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
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
        if(!isset($request->id)){
            return abort(404);
        }else if(!Auth::check()){
            return abort(404);
        }else if( Auth::user()->id != $request->id){
            return abort(404);
        }
        return $next($request);
    }
}
