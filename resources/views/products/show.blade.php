@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">
        <div class=" mb-2">
            <a href="{{ route('products.index') }}">Back</a>
           
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                <div class="img-container img-fluid" style="width:500px!important">
                        <img src="{{ asset('storage/' . $product->image) }} " alt="image" class="img-fluid" style="width:100%; height:100%">
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class=" text-capitalize">{{ $product->name }}</h2>
                        <p>Category: <b>{{ $product->category->name }}</b></p>
                        <p>Description {{ $product->description }}</p>
                </div>

                <div class="col">
                    
                    <div>
                        <p>{!! $product->content !!}</p>
                    </div>

                </div>
            </div>


        </div>

    </div>
</div>





@endsection