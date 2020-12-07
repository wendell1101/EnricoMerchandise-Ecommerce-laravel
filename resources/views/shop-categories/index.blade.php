@extends('layouts.base')


@section('header')
@if(!isset($category))
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
@endif
@endsection


@section('content')
<section class="section bg-gray">
    <div class="container">
        <h2 class="text-capitalize mb-5">{{ isset($category) ? $category->name : ''}}</h2>
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

        <div class="d-flex justify-content-center" style="margin-top:100px">
            {{ $products->links() }}
        </div>
        


    </div>
</section>
@endsection

@section('js')
<script>
    let cartForm = $('#cartForm');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#cartBtn').click(() => {
        e.preventDefault();
        handleCartForm(id);
    })

    let cartBtn = $('#cartBtn');
    function handleAddCartForm(id) {
        $.ajax({
            type: 'POST',
            url: '/add-to-cart/' + id,
            data: {
                id: id
            },
            success: function(data) {
                if (data.added){
                    cartBtn.replaceWith(`
                    <button onClick="handleDeleteCartForm({{$product->id}})" class="btn btn-danger btn-sm ml-auto float-right cart-btn" id="cartBtn">Remove to cart</button>
                    `)
                }else{
                    cartBtn.replaceWith(`
                    <button onClick="handleAddCartForm({{$product->id}})" class="btn btn-success btn-sm ml-auto float-right cart-btn" id="cartBtn">Add to cart</button>
                    `)
                } 
               
            },
            error: function(error) {
                alert(error);
            },
        });
    }

   
</script>

@endsection