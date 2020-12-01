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
        return view('billing.create');
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
}
