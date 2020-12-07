<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin_or_product_manager');
    }
    
    public function index()
    {
        $orders = Order::orderBy('created_at')->get();
        return view('admin-orders.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        return view('admin-orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        if($request->active === 'on'){
            $active = true;
        }else{
            $active = false;
        }
        $order->update([
            'status' => $request->status,
            'active' => $active,
        ]);
        return redirect(route('admin-orders.index'))->with('success', 'An order has been updated');
    }

    public function confirmDelete(Order $order)
    {
        return view('admin-orders.confirmDelete', compact('order'));
    }
    public function destroy(Order $order)
    {
        $order->delete();  
        return redirect(route('admin-orders.index'))->with('success', 'An order has been deleted successfuly');
    }
}
