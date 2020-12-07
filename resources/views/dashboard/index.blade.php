@extends('layouts.base')

@section('navbar')
<x-navbar2 categories="$categories" />
@endsection

@if(!isset($category))
@section('header')
<header class="header bg-gray text-center text-dark">
    @if($featured_products->count() > 0)
    <div class="container">
    <h4 class="text-left text-light">Featured Products</h4>
    </div>
    
    <div class="swiper-container w3-animate-left">
        <!--header-->

        <div class="swiper-wrapper">
            @foreach($featured_products as $product)
            <div class="swiper-slide">
                <div class="imgBx">
                    <img src="{{ 'storage/'. $product->image }}" alt="image">
                </div>
                <div class="details">
                    <h3>{{ $product->name }}<br><span class="text-capitalize">{{ $product->category->name }}</span></h3>
                </div>
                <a href="{{ route('shop-product.show', $product->slug) }}"><button id="btn-readmore">View Product</button></a>
            </div>
            @endforeach

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        @endif
</header>


@endsection
@else
<header class="header text-dark">
    <div class="container">
        <h2 class="text-capitalize">Category: {{$category->name }}</h2>
    </div>
</header 
@endif 
@section('content') 
<section class="section bg-gray">
<div class="container">
    <div class="row gap-y">
        @forelse($products as $product)
        <div class="col-md-6 col-xl-4 w3-animate-opacity">
            <div class="product-3 mb-3">
                <a class="product-media" href="{{ route('shop-product.show', $product->slug) }}">
                    <span class="badge badge-pill badge-{{ $product->labelColor() }} badge-pos-left">{{ $product->label->name}} </span>
                    <img src="{{ asset('storage/'. $product->image) }}" class="img-fluid" alt="image"  style="width:100%; min-height:250px!important">
                </a>
                <div class="product-detail">
                    <h6><a href="{{ route('shop-product.show', $product->slug) }}" class="text-capitalize">{{ $product->name }}</a></h6>
                    <div class="product-price">{{ $product->showPrice() }}</div>

                </div>

                @if(Cart::session((auth()->user()) ? auth()->id() : '_token')->get($product->id))
                <a href="{{ route('carts.remove', $product->id) }}" class="btn btn-danger btn-sm ml-auto float-right cart-btn">Remove to cart</a>
                @else

                <form action="{{ route('carts.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm ml-auto float-right cart-btn">Add to cart</button>
                </form>

                @endif


            </div>
        </div>
        @empty
        <h2 class="text-secondary text-center">No Product Yet</h2>
        @endforelse

    </div>

    <div class="d-flex justify-content-center" style="margin-top:100px">
        {{ $products->links() }}
    </div>



</div>
</section>
@endsection