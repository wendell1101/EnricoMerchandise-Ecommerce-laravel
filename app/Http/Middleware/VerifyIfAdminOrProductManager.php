<?php

namespace App\Http\Middleware;

use Closure;

class VerifyIfAdminOrProductManager
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
        if(auth()->user()->isCustomer()){
            return redirect()->back()->with('error', 'You need to be an admin or product manager to access this page');
        }
        return $next($request);
    }
}
