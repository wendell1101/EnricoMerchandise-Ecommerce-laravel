@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">
        <h2 class="text-secondary">Edit Order</h2>
        <form action="{{ route('admin-orders.update', $order->slug ) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="created" @if($order->status === 'created') selected="selected" @endif>Created</option>
                    <option value="paid" @if($order->status === 'paid') selected="selected" @endif>Paid</option>
                    <option value="shipped" @if($order->status === 'shipped') selected="selected" @endif>Shipped</option>
                    <option value="refunded" @if($order->status === 'refunded') selected="selected" @endif>Refunded</option>
                </select>
            </div>
            <div class="form-group">
                <input type="checkbox" name="active" id="active" @if($order->active == 1) checked @endif>
                <label for="active">Active</label>
            </div>


            <div class="form-group d-flex justify-content-end">
                <a href="{{ route('admin-orders.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary ml-2">Update</button>
            </div>
        </form>


    </div>
</div>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection