@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">       
        <div class="mb-2">
            <h2 class="text-secondary">Users</h2>
           
        </div>
        @if($users->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Profile</th>
                        <th scope="col">Name</th>                      
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                        

                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr style="line-height:40px">
                        <th scope="row">{{ ++$loop->index }}</th>
                        <td>
                            <img src="{{ (isset($user->profile)) ? asset('storage/' . $user->profile )  : $user->getUrlfriendlyAvatar() }} " alt="profile" class="rounded-circle" width="50" height="50">
                        </td>
                        <td><a href="{{ route('users.show', $user->slug) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->slug) }}" class="text-warning mr-3"><i class="fas fa-pen"></i></a>
                            <a href="{{ route('users.confirm-delete', $user->slug) }}" class="text-danger"><i class="fas fa-trash"></i></a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @else
        <h2 class="text-secondary text-center">No User Yet</h2>
        @endif
    </div>
</div>





@endsection