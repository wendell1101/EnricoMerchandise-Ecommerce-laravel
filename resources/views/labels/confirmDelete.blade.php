@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('labels.destroy', $label->slug) }}" method="POST">
            @csrf
            @method('Delete')
            <h2 class="text-secondary mt-2 mb-2">Are you sure you want to delete this label - ({{ $label->name }}) ?</h2>            
            <div class="form-group">
                <button type="submit" class="btn btn-danger ml-2">Yes, Delete</button>
                <a href="{{ route('labels.index') }}" class="btn btn-secondary">Cancel</a>               
            </div>
        </form>
    </div>
</div>





@endsection