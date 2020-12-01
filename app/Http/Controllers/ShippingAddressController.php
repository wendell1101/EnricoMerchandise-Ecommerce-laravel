<?php

namespace App\Http\Controllers;

use App\ShippingAddress;
use App\BillingAddress;
use App\Http\Requests\Shippings\CreateShippingAddressRequest;
use Illuminate\Http\Request;

class ShippingAddressController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function create()
    {
        return view('shipping.create');
    }

    public function store(CreateShippingAddressRequest $request)
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

        if (ShippingAddress::all()->count() > 0) {
            $oldShipping = ShippingAddress::first();
            $oldShipping->delete();
        }
        ShippingAddress::create($data);
        return redirect(route('checkouts.index'));
    }
}
