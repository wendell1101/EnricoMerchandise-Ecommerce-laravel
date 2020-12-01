<?php

namespace App\Http\Middleware;

use App\Category;
use App\Label;
use Closure;

class CheckIfHasCategoryAndLabel
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
        $categories = Category::all();
        $labels = Label::all();
        if((!$categories->count() > 0)){
            return redirect(route('categories.create'))->with('error', 'You need to have a category first to create a product. Create one.');
        }elseif(!$labels->count() > 0){
            return redirect(route('labels.create'))->with('error', 'You need to have a label first to create a product. Create one.');
        }
        return $next($request);
    }
}
