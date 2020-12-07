<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ShopCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
      
        return view('layouts.base', compact('categories'));
    }
    public function show(Category $category)    {
        $cartItems = \Cart::session('_token')->getContent();
        $data = [
            'products' => Product::where('category_id', $category->id)->orderBy('category_id')->paginate(6),
            'cartItems' => $cartItems,
            'category' => $category,
        ];
        
        return view('dashboard.index')->with($data);
    }
}
