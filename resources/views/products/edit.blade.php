@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">
        <h2 class="text-secondary">Edit Product</h2>
        <form action="{{ route('products.update', $product->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ isset($product) ? $product->name : old('name') }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" value="{{ isset($product) ? $product->price : old('price') }}" class="form-control @error('price') is-invalid @enderror">
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Description</label>
                <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror">
                {{ isset($product) ? $product->description : old('description') }}
                </textarea>

                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Content</label>
                <textarea name="content" id="content" rows="5" class="form-control @error('content') is-invalid @enderror">
                {{ isset($product) ? $product->content : old('content') }}
                </textarea>

                @error('content')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!--categories -->
            @if($categories->count() > 0)
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control category @error('category_id') is-invalid @enderror">
                    @foreach($categories as $category)

                    <option value="{{ $category->id }}" @if($category->id === $product->category->id)
                        selected='selected'
                        @endif
                        > {{ $category->name }} </option>
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
                <select name="label_id" id="label" class="form-control label @error('label') is-invalid @enderror">
                    @foreach($labels as $label)

                    <option value="{{ $label->id }}" @if($label->id === $product->label->id)
                        selected='selected'
                        @endif
                        > {{ $label->name }} </option>
                    @endforeach
                </select>
                @error('label_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @endif
            <div class="form-group">
                <input type="checkbox" name="featured" id="featured"  @if($product->featured == 1) checked @endif>
                <label for="featured">Featured</label>                
            </div>

            <div class="form-group">               
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                <img src="{{ asset('storage/' . $product->image) }}" alt="image" class="img-fluid shadow mt-3" width="300" height="300">
            </div>
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror


            <div class="form-group d-flex justify-content-end">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary ml-2">Update</button>
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