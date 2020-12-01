@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">
        <h2 class="text-secondary">Update Label</h2>
        <form action="{{ route('labels.update', $label->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" 
                   value="{{ isset($label->name) ? $label->name : old('name') }}" 
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group d-flex justify-content-end">
                <a href="{{ route('labels.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary ml-2">Update</button>
            </div>
        </form>
    </div>
</div>





@endsection