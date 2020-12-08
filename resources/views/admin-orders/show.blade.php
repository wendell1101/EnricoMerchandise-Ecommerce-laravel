@extends('layouts.app')

@section('content')


<div class="container">
    <article class="card">
        <div class="card-body">
            <h6>Transaction Id: {{ $order->transaction_id }}</h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>{{ $expected_delivery }}</div>
                    <div class="col"> <strong>Shipping By:</strong> <br> EnricoMerchandise, | <i class="fa fa-phone"></i> +63998234823 </div>
                    <div class="col text-uppercase"> <strong>Status:</strong> <br> {{ $order->status }} </div>
                    <div class="col"> <strong>Transaction Id #:</strong> <br> {{ $order->transaction_id }}</div>
                </div>
            </article>
            <div class="track">
                @if($order->status === 'created')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order created</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-credit-card"></i> </span> <span class="text"> Paid</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Shipped</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-undo"></i> </span> <span class="text">Refunded</span> </div>
                @elseif($order->status === 'paid')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order created</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-credit-card"></i> </span> <span class="text"> Paid</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Shipped</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-undo"></i> </span> <span class="text">Refunded</span> </div>
                @elseif($order->status === 'shipped')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order created</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-credit-card"></i> </span> <span class="text"> Paid</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Shipped</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-undo"></i> </span> <span class="text">Refunded</span> </div>
                @elseif($order->status === 'refunded')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order created</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-credit-card"></i> </span> <span class="text"> Paid</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Shipped</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-undo"></i> </span> <span class="text">Refunded</span> </div>
                @endif
            </div>
            <hr>

            <ul class="row">
                @foreach($order->products as $product)
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="{{ asset('storage/' .  $product->associatedModel->image ) }}" alt="image" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">{{ $product->name }} ({{ $product->quantity }})<br></p>
                            <span class="text-muted">
                                PHP {{number_format((float)$product->price, 2, '.', '')}}
                            </span><br>

                        </figcaption>
                    </figure>
                </li>
                @endforeach

            </ul>
            <span>Shipping Fee: PHP {{number_format((float)50, 2, '.', '')}}</span><br>
            <span>Total: PHP {{number_format((float)$order->total_amount, 2, '.', '')}}</span>

            <hr>
            <a href="{{ route('admin-orders.index') }}" class="btn btn-success" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
</div>


@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/order_progress.css')}}">
@endsection