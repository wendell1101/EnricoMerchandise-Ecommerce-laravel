@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">
        <div class=" mb-2">
            <a href="{{ route('categories.index') }}">Back</a>
        </div>
        <h2>{{ $label->name }} - Products</h2>
        @if($label->products->count() > 0 )
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        

                    </tr>
                </thead>
                <tbody>
                    @foreach($label->products as $product)
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="image" width="80" height="80">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->showPrice() }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @else
        <h2 class="text-center text-secondary">No Product Yet</h2>
        @endif

    </div>
</div>

@endsection