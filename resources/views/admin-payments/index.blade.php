@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">       
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h2 class="text-secondary">Payments</h2>
        </div>
        @if($payments->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Total Amount</th>       
                        <th scope="col">Action</th>
                        

                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <th scope="row">{{ ++$loop->index }}</th>                       
                        <td>
                           {{ $payment->name }}
                        </td>
                        <td>
                            {{ $payment->email }}
                        </td>
                        <td>
                            PHP {{number_format((float)$payment->amount, 2, '.', '')}}
                        </td>
                       
                       
                        <td>
                            <a href="{{ route('admin-payments.confirm-delete', $payment->id) }}" class="text-danger"><i class="fas fa-trash"></i></a>
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