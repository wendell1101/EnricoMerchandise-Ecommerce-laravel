@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">       
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h2 class="text-secondary">Products</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        @if($products->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>                      
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>
                        

                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ ++$loop->index }}</th>
                        <td>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="image" width="50" height="50">
                        </td>
                        <td><a href="{{ route('products.show', $product->slug) }}">{{ $product->name }} </a></td>
                        <td>{{ $product->showPrice() }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->slug) }}" class="text-warning mr-3"><i class="fas fa-pen"></i></a>
                            <a href="{{ route('products.confirm-delete', $product->slug) }}" class="text-danger"><i class="fas fa-trash"></i></a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @else
        <h2 class="text-secondary text-center">No Product Yet</h2>
        @endif
    </div>
</div>





@endsection