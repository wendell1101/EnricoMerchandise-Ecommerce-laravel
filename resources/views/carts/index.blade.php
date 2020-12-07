@extends('layouts.base')



@section('header')
@endsection
@section('content')
<section class="section">
    <div class="container">
        <h1>Cart Items</h1>
    <x-alert />
        @if($products->count() > 0 )
        <div class="row">
            <div class="col-lg-8 table-responsive">

                <table class="table table-cart">
                    <tbody valign="middle">
                        <tr>
                            <th>Remove</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        @foreach($products as $product)
                        <tr>
                            <td>
                                <a class="item-remove" href="{{ route('carts.destroy', $product->id) }}"><i class="ti-close"></i></a>
                            </td>

                            <td>
                                <a href="#">
                                    <img class="rounded" src="{{ asset('storage/' . $product->associatedModel->image) }}" alt="image">
                                </a>
                            </td>

                            <td>
                                <h5>{{ $product->name}}</h5>
                            </td>

                            <td>
                                <p class="price text-left">PHP {{number_format((float)$product->price, 2, '.', '')}}</p>
                            </td>

                            <td>
                                <form action="{{ route('carts.update', $product->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="d-flex align-items-center">
                                        <input class="form-control form-control-sm mr-2" type="number" min="1" 
                                            name="quantity" value="{{ $product->quantity }}" style="width:50px">
                                        <button type="submit" class="btn btn-primary btn-sm btn-save">Save</button>
                                    </div>

                                </form>

                            </td>

                            <td>
                                <p class="price text-left">PHP {{number_format((float)Cart::get($product->id)->getPriceSum(), 2, '.', '')}}</p>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>


            <div class="col-lg-4">
                <div class="cart-price">
                    <div class="flexbox">
                        <div>
                            <p><strong>Subtotal:</strong></p>
                            <p><strong>Shipping:</strong></p>
                        </div>

                        <div>
                            <p>PHP {{number_format((float)$cartSubTotal, 2, '.', '')}}</p>
                            <p>PHP {{number_format((float)$shippingFee, 2, '.', '')}}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="flexbox">
                        <div>
                            <p><strong>Total:</strong></p>
                        </div>

                        <div>
                            <p class="fw-600">PHP {{number_format((float)$cartFinalTotal, 2, '.', '')}}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-block btn-secondary" href="/">Shop more</a>
                    </div>

                    <div class="col-6">
                        <a  href="{{ route('billings.create') }}" class="btn btn-block btn-success" type="submit">Checkout <i class="ti-angle-right fs-9"></i></a>
                    </div>
                </div>

            </div>
        </div>


        @else
        <h2 class="text-center">Your cart is empty</h2>
        @endif



    </div>
</section>

@endsection