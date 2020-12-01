@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">       
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h2 class="text-secondary">Labels</h2>
            <a href="{{ route('labels.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        @if($labels->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">No. of products</th>
                        <th scope="col">Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($labels as $label)
                    <tr>
                        <th scope="row">{{ ++$loop->index }}</th>
                        <td><a href="{{ route('labels.show', $label->slug) }}">{{ $label->name }}</a></td>
                        <td>{{ $label->products->count() }}</td>
                        <td>
                            <a href="{{ route('labels.edit', $label->slug) }}" class="text-warning mr-3"><i class="fas fa-pen"></i></a>
                            <a href="{{ route('labels.confirm-delete', $label->slug) }}" class="text-danger"><i class="fas fa-trash"></i></a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @else
        <h2 class="text-secondary text-center">No Label Yet</h2>
        @endif
    </div>
</div>





@endsection