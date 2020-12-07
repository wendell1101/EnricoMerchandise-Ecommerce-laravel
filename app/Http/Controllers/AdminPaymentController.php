<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin_or_product_manager');
    }
    public function index()
    {
        $payments = Payment::orderBy('created_at')->get();
        return view('admin-payments.index', compact('payments'));
    }

    public function edit(Payment $payment)
    {
        return view('admin-payments.edit', compact('payment'));
    }

   

    public function confirmDelete(Payment $payment)
    {
        return view('admin-payments.confirmDelete', compact('payment'));
    }
    public function destroy(Payment $payment)
    {
        $payment->delete();  
        return redirect(route('admin-payments.index'))->with('success', 'A payment has been deleted successfuly');
    }
}
