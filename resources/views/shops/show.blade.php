@extends('layouts.base')


@section('header')
<header class="header text-dark shop-header">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <h1 class="display-4 text-capitalize">{{ $product->name }}</h1>
                <p class="lead-2 opacity-90 mt-6">{{ $product->description}}</p>

            </div>
        </div>
    </div>
</header>
@endsection


@section('content')
<main class="main-content">

    <!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Detail
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
    <section class="section">
        <div class="container">

            <div class="row">
                <div class="col-md-6 ml-auto order-md-last mb-7 mb-md-0">
                    <span class="badge badge-pill badge-{{ $product->labelColor() }} badge-pos-left product-label">{{ $product->label->name }}</span>
                    <img src="{{ asset('storage/' . $product->image ) }}" class="img-fluid" alt="image" style="width:100%; min-height:250px!important">
                    <div class="row mt-3">
                        <div class="col">
                            <h4 class="text-dark">{{ $product->showPrice() }}</h4>
                        </div>
                        <div class="col">
                            @if(Cart::session((auth()->user()) ? auth()->id() : '_token')->get($product->id))
                            <a href="{{ route('carts.remove', $product->id) }}" class="btn btn-lg btn-danger float-right">Remove to cart</a>
                            @else

                            <form action="{{ route('carts.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-lg btn-success float-right">Add to cart</button>
                            </form>

                            @endif

                           
                        </div>


                    </div>


                </div>

                <div class="col-11 mx-auto col-md-5 mx-md-0">
                    <p class="text-light my-6">
                        {!! $product->content !!}
                    </p>


                </div>

            </div>

        </div>
    </section>


    <!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Similar products
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
    @if($products->count() > 0)
    <section class="section bt-1" style="transform:translate(0,-100px)">
        <div class="container">

            <h4 class="mb-7">Similar products that you may like</h4>

            <div class="row gap-y">
                @foreach($products as $product)
                <div class="col-md-6 col-xl-3">
                    <div class="product-3">
                        <a class="product-media" href="#">
                            <span class="badge badge-pill badge-{{ $product->labelColor() }} badge-pos-left">{{ $product->label->name }}</span>
                            <img src="{{ asset('storage/' .$product->image ) }}" alt="product">
                        </a>

                        <div class="product-detail">
                            <h6><a href="{{ route('shop-product.show', $product->slug ) }}">{{ $product->name }}</a></h6>
                            <div class="product-price">{{ $product->showPrice() }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    @endif


</main>
@endsection