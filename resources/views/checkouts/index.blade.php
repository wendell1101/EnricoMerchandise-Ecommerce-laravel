@extends('layouts.base')

@section('navbar')
<x-navbar2 />
@endsection

@section('header')
<header class="header bg-gray">
    <div class="container">
        <h1 class="display-4">Checkout</h1>
        <p class="lead-2 mt-6">Seems you're done! Finalize your checkout.</p>
    </div>
</header>
@endsection
@section('content')
<main class="main-content">

    <section class="section">
        <div class="container">

            <form action="{{ route('orders.store') }}" method="POST" class="row gap-y">
                @csrf
                <div class="col-lg-8">

                    <table class="table table-cart">
                        <tbody valign="middle">
                            @foreach($products as $product)
                            <tr>
                                <td>
                                    <a href="#">
                                        <img class="rounded" src="{{ asset('storage/' . $product->associatedModel->image) }}" alt="...">
                                    </a>
                                </td>

                                <td style="width: auto">
                                    <h5>{{ $product->name }}</h5>
                                </td>

                                <td>
                                    <h4 class="price">PHP {{number_format((float)Cart::get($product->id)->getPriceSum(), 2, '.', '')}}</h4>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="payment_method">Choose Payment Method</label>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="payment_type" id="cod" 
                                    value="cod" class="mr-2" checked="checked">Cash On Delivery
                            </div>
                            <div class="form-group">
                                <input type="radio" name="payment_type" id="paypal" value="paypal" class="mr-2">Paypal
                            </div>
                        </div>
                    </div>
                    <hr class="my-8">


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
                            <a class="btn btn-block btn-secondary" href="{{ route('carts.index') }}">Revise Cart</a>
                        </div>

                        <div class="col-6">
                            <button class="btn btn-block btn-primary" type="submit">
                                Checkout <i class="ti-angle-right fs-9"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </form>



        </div>
    </section>

</main>
@endsection