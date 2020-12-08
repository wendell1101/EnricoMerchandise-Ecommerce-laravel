<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfCartIsEmpty
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
        if(\Cart::session(auth()->id())->isEmpty()){
            return redirect(route('carts.index'));
        }
        return $next($request);
    }
}
