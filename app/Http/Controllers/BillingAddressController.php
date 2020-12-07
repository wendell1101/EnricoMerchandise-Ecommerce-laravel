<?php

namespace App\Http\Controllers;

use App\BillingAddress;
use App\ShippingAddress;
use App\Http\Requests\Billings\CreateBillingAddressRequest;
use Illuminate\Http\Request;

class BillingAddressController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create()
    {
        $billing = auth()->user()->billing_addresses->last();
        return view('billing.create', compact('billing'));
    }

    public function store(CreateBillingAddressRequest $request)
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'house_number' => $request->house_number,
            'street' => $request->street,
            'barangay' => $request->barangay,
            'city' => $request->city,
            'province' => $request->province,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
            'user_id' => auth()->id(),
        ];


        if ($request->same_shipping) {
            BillingAddress::create($data);
            ShippingAddress::create($data);
            return redirect(route('checkouts.index'));
        } else {
            BillingAddress::create($data);
            return redirect(route('shippings.create'));
        }
    }

    public function usePreviousAddress(Request $request)
    {
        if($request->previous_billing){
            $billing = auth()->user()->billing_addresses->last();
            $data = [
                'first_name' => $billing->first_name,
                'last_name' => $billing->last_name,
                'email' => $billing->email,
                'contact_number' => $billing->contact_number,
                'house_number' => $billing->house_number,
                'street' => $billing->street,
                'barangay' => $billing->barangay,
                'city' => $billing->city,
                'province' => $billing->province,
                'zip_code' => $billing->zip_code,
                'country' => $billing->country,
            ];
            $billing->update($data);
            $shipping = auth()->user()->shipping_addresses->last();
            $shipping->update($data);
            return redirect(route('checkouts.index'));
        }
    }
}

