<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use App\Payment;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            "orders" => Order::all(),
            "products" => Product::all(),
            "users" => User::all(),
            "payments" => Payment::all(),
        ];
        return view('home')->with($data);
    }
}
