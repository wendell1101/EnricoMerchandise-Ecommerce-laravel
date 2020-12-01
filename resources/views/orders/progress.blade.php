@extends('layouts.base')

@section('navbar')
<x-navbar />
@endsection
@section('content')
<div class="container" style="margin-top:100px; margin-bottom:100px">
    <article class="card shadow">
        <div class="card-body">
            <h6>Transaction Id: {{ session('order')['transaction_id'] }}</h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>Dec. 8, 2020</div>
                    <div class="col"> <strong>Shipping By:</strong> <br> cTech, | <i class="fa fa-phone"></i> +63998234823 </div>
                    <div class="col text-uppercase"> <strong>Status:</strong> <br> {{ session('order') ['status'] }} </div>
                    <div class="col"> <strong>Transaction Id #:</strong> <br> {{ session('order')['transaction_id'] }} </div>
                </div>
            </article>
            <div class="track">
               @if(session('order')['status'] === 'created')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order created</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-credit-card"></i> </span> <span class="text"> Paid</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Shipped</span> </div>
                <div class="step" > <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
               @elseif(session('order')['status'] === 'paid')
               <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order created</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-credit-card"></i> </span> <span class="text"> Paid</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Shipped</span> </div>
                <div class="step" > <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
                @elseif(session('order')['status'] === 'shipped')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order created</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-credit-card"></i> </span> <span class="text"> Paid</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Shipped</span> </div>
                <div class="step" > <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
                @elseif(session('order')['status'] === 'refunded')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order created</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-credit-card"></i> </span> <span class="text"> Paid</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Shipped</span> </div>
                <div class="step" > <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
                @endif
            </div>
            <hr>
            
            <ul class="row">
                @foreach(session('cart_products') as $product)
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="{{ asset('storage/' . $product->image) }}" alt="image"  class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">{{ $product->name }}<br></p> 
                            <span class="text-muted">
                               
                                    PHP {{ $product->price}}
                                    <span> - Qty. {{ $product->quantity }}</span>
                              
                            </span><br>
                          
                        </figcaption>
                    </figure>
                </li>
                @endforeach
                
            </ul>
          
            <hr>
            <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
</div>
@endsection

@section('css')

    <link rel="stylesheet" href="{{asset('css/order_progress.css')}}">

@endsection