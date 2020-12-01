<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        
        $products = \Cart::session(auth()->id())->getContent()->sortBy('id');
        $shipping = 50;
        $cartSubTotal = \Cart::session(auth()->id())->getSubtotal();
        $cartFinalTotal = $cartSubTotal + $shipping;

        $data = [
            'products' => $products,
            'cartSubTotal' => $cartSubTotal,
            'cartFinalTotal' => $cartFinalTotal,
            'shippingFee' => $shipping,
        ];

        return view('checkouts.index')->with($data);
    }
}
