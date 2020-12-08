<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->orderBy('created_at')->get();

        return view('orders.index', compact('orders'));
    }
    public function show(Order $order)
    {
        $date1 = $order->created_at;
        $expected_delivery = date('Y-m-d-D', strtotime("+7 day", strtotime($date1)));
        $order = json_decode($order);
        return view('orders.show', compact('order', 'expected_delivery'));
    }
   
    public function store(Request $request)
    {
        // cart data
        $products = \Cart::session(auth()->id())->getContent();

        $shipping = 50;
        $cartSubTotal = \Cart::session(auth()->id())->getSubtotal();
        $cartFinalTotal = $cartSubTotal + $shipping;
        //data 
        $billing_id = auth()->user()->billing_addresses->last()->id;
        $shipping_id = auth()->user()->shipping_addresses->last()->id;
        $random = Str::random(10);
        $transaction_id = strtoupper($random);
        $status = 'created';
        $total_amount = $cartFinalTotal;

        $data = [
            'products' => $products,
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

        if ($request->payment_type === 'cod') {
            return redirect(route('orders.show', $order->slug))->with('order', $order);
        } elseif ($request->payment_type === 'paypal') {
            return redirect(route('payments.index'))->with('order', $order);
        }
    }
}
