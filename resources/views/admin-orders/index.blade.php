@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">       
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h2 class="text-secondary">Orders</h2>
        </div>
        @if($orders->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Total Amount</th>                      
                        <th scope="col">Status</th>                      
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                        

                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{ ++$loop->index }}</th>
                        <td>{{ $order->transaction_id }}</td>
                        <td>
                           {{ $order->billing_address->first_name .' '. $order->billing_address->last_name}}
                        </td>
                        <td>
                            {{ $order->billing_address->email }}
                        </td>
                        <td>
                            PHP {{number_format((float)$order->total_amount, 2, '.', '')}}
                        </td>
                        <td>
                            {{ $order->status }}
                        </td>
                        <td>
                            {{ $order->active }}
                        </td>
                       
                        <td>
                            <a href="{{ route('admin-orders.edit', $order->slug) }}" class="text-warning mr-3"><i class="fas fa-pen"></i></a>
                            <a href="{{ route('admin-orders.confirm-delete', $order->slug) }}" class="text-danger"><i class="fas fa-trash"></i></a>
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