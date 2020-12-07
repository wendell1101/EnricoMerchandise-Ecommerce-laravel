<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {        
        return view('payments.paypal');
    }
    public function update(Order $order)
    {
        $order->update(['status' => 'paid']);
        Payment::create([
            'name' => $order->user->name,
            'email' => $order->user->email,
            'amount' => $order->total_amount,
        ]);
        return redirect(route('orders.show', $order->slug));
    }
}
