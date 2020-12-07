@extends('layouts.base')


@section('header')
<header class="header  text-dark" style="height:100px">
    <div class="container">
        <h1>Your Orders</h1>
    </div>
</header>
@endsection
@section('content')
<section class="section">
    <div class="container">
      
    <x-alert />
        @if($orders->count() > 0 )
        <div class="row">
            
            <div class="col-lg-8 mx-auto table-responsive">
          

            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">TRANSACTION ID</th>
                        <th scope="col">TOTAL AMOUNT</th>                      

                        

                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                       
                        <td>
                            {{ ++$loop->index }}
                        </td>
                        <td>
                            <a href="{{ route('orders.show', $order->slug) }}">{{ $order->transaction_id }}</a>
                        </td>
                        <td>
                        PHP {{number_format((float)$order->total_amount, 2, '.', '')}}
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

            </div>
        @else
            <h2 class="text-center">No Orders Yet</h2>
        @endif



    </div>
</section>

@endsection