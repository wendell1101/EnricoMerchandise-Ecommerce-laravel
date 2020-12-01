@extends('layouts.base')

@section('navbar')
<x-navbar />
@endsection
@section('header')
<header class="header text-center text-dark shop-header">
    <div class="container">

        <div class="row">
            <div class="col-md-8 mx-auto">

                <h1 class="display-4">The Store</h1>
                <p class="lead-2 opacity-90 mt-6">You can find a list of our product in this page. We'll deliver your order in less than two days. Try it yourself!</p>

            </div>
        </div>

    </div>
</header>
@endsection


@section('content')
<section class="section bg-gray">
    <div class="container">
        <div class="row gap-y">
            @forelse($products as $product)
            <div class="col-md-6 col-xl-4">
                <div class="product-3 mb-3 border">
                    <a class="product-media" href="#">
                        <span class="badge badge-pill badge-{{ $product->labelColor() }} badge-pos-left">{{ $product->label->name}} </span>
                        <img src="{{ asset('storage/'. $product->image) }}" alt="product">
                    </a>
                    <div class="product-detail">
                        <h6><a href="{{ route('shop-product.show', $product->slug) }}" class="text-capitalize">{{ $product->name }}</a></h6>
                        <div class="product-price">{{ $product->showPrice() }}</div>

                    </div>
                    @if(!Cart::get($product->id))
                    <form action="{{ route('carts.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm ml-auto float-right cart-btn">Add to cart</button>
                    </form>
                    @else
                    <a href="{{ route('carts.remove', $product->id) }}" class="btn btn-danger btn-sm ml-auto float-right cart-btn">Remove to cart</a>
                    @endif


                </div>
            </div>
            @empty
            <h2 class="text-secondary text-center">No Product Yet</h2>
            @endforelse

        </div>


        <nav class="mt-7">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#">
                        <span class="fa fa-angle-left"></span>
                    </a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <span class="fa fa-angle-right"></span>
                    </a>
                </li>
            </ul>
        </nav>


    </div>
</section>
@endsection