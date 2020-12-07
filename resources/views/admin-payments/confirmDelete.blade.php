@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('admin-payments.destroy', $payment->id) }}" method="POST">
            @csrf
            @method('Delete')
            <h2 class="text-secondary mt-2 mb-2">Are you sure you want to delete this payment - PHP({{number_format((float)$payment->amount, 2, '.', '')}}) ?</h2>            
            <div class="form-group">
                <button type="submit" class="btn btn-danger ml-2">Yes, Delete</button>
                <a href="{{ route('admin-payments.index') }}" class="btn btn-secondary">Cancel</a>               
            </div>
        </form>
    </div>
</div>





@endsection