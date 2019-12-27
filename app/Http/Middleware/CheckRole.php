<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
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
        if ($request->user() === null) {
         //return response("Insufficient permissions", 401);
         if(Auth::check()){
        return response("Insufficient permissions", 401);
     }else{
        return redirect('/login');
     }
     }
     $actions = $request->route()->getAction();
     $roles = isset($actions['roles']) ? $actions['roles'] : null;

     if ($request->user()->hasAnyRole($roles) || !$roles) {
         return $next($request);
     }
     if(Auth::check()){
        return response("Insufficient permissions", 401);
     }else{
        return redirect('/login');
     }
    }
}
