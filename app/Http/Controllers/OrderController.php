<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function progress(Request $request)
    {
        if(!$request->session()->has('order')){
            return redirect()->back();
        }
        return view('orders.progress');
    }
    public function store(Request $request)
    {
        // cart data
        $products = \Cart::session(auth()->id())->getContent()->sortBy('id');
        $shipping = 50;
        $cartSubTotal = \Cart::session(auth()->id())->getSubtotal();
        $cartFinalTotal = $cartSubTotal + $shipping;
        //data 
        $billing_id = auth()->user()->billing_addresses->last()->id;
        $shipping_id = auth()->user()->billing_addresses->last()->id;
        $random = Str::random(10);
        $transaction_id = strtoupper($random);
        $status = 'created';
        $total_amount = $cartFinalTotal;
      
        if ($request->payment_type === 'cod') {
            $data = [
                'transaction_id' => $transaction_id,
                'status' => $status,
                'total_amount' => $total_amount,
                'user_id' => auth()->id(),
                'billing_address_id' => $billing_id,
                'shipping_address_id' => $shipping_id,
            ];
            
            $order = Order::create($data);

            // create session
            session(['order' => $order]);
            session(['cart_products' => $products]);
            // clear cart
            \Cart::session(auth()->id())->clear();
            return redirect(route('orders.progress'));
        } elseif ($request->payment_type === 'paypal') {
            dd('paypal');
        }
    }
}
