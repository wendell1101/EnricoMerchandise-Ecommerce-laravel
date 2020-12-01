@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">
        <h2 class="text-secondary">Edit User</h2>
        <form action="{{ route('users.update', $user->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ isset($user) ? $user->name : old('name') }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Email</label>
                <input type="text" name="email" id="email" value="{{ isset($user) ? $user->email : old('price') }}" class="form-control @error('price') is-invalid @enderror">
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Profile</label>
                <input type="file" name="profile" id="profile" value="{{ isset($user) ? $user->profile : old('profile') }}" class="form-control @error('profile') is-invalid @enderror">
                @error('profile')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                @if($user->profile)
                <img src="{{ asset('storage/' . $user->profile) }}" alt="profile" class="img-fluid rounded-circle shadow mt-3" width="100" height="80">
                @else
                <img src="{{ $user->getUrlfriendlyAvatar() }}" alt="profile" class="img-fluid rounded-circle shadow mt-3" width="100" height="80">
                @endif
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" value="{{ $user->role }}">
                    <option value="customer" @if($user->role === 'customer')  selected="selected" @endif>Customer</option>
                    <option value="product_manager" @if($user->role === 'product_manager')  selected="selected" @endif >Product Manager</option>
                    <option value="admin" @if($user->role === 'admin')  selected="selected" @endif>Admin</option>
                </select>
            </div>

     
           
            <div class="form-group d-flex justify-content-end">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary ml-2">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
