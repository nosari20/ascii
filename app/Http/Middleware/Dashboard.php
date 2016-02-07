<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Dashboard
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
        
        if (Auth::user()) {
            if(Auth::user()->right==2){
               return redirect(route('admin_dashboard'));
            }else if(Auth::user()->right==1){
               
               return redirect(route('writer_dashboard'));
            }else{
               return $next($request);
            }
        }else{
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }
        
        
    }
}
