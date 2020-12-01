<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $cartItems = \Cart::session('_token')->getContent();
        $data = [
            'products' => Product::orderBy('category_id')->get(),
            'cartItems' => $cartItems,
        ];
        return view('dashboard.index')->with($data);
    }
}
