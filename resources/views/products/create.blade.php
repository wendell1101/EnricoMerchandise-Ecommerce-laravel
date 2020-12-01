@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">
        <h2 class="text-secondary">Create Product</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror">
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Description</label>
                <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror">
                {{ old('description') }}
                </textarea>

                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Content</label>
                <textarea name="content" id="content" rows="5" class="form-control @error('content') is-invalid @enderror">
                {{ old('content') }}
                </textarea>

                @error('content')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!--categories -->
            @if($categories->count() > 0)
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control category @error('category_id') is-invalid @enderror">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @endif

            <!--labels -->
            @if($labels->count() > 0)
            <div class="form-group">
                <label for="label">Label</label>
                <select name="label" id="label" class="form-control category @error('category_id') is-invalid @enderror">
                    @foreach($labels as $label)
                    <option value="{{ $label->id }}">{{ $label->name }}</option>
                    @endforeach
                </select>
                @error('label_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @endif

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
            </div>
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group d-flex justify-content-end">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary ml-2">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
    $(document).ready(function() {
        $('#category').select2();
        $('#label').select2();
    });
</script>
@endsection