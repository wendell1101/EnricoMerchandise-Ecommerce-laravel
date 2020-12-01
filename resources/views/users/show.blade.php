@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">
        <div class=" mb-2">
            <a href="{{ route('users.index') }}">Back</a>
            <h2 class="text-secondary text-capitalize">{{ $user->name }} Profile</h2>
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="img-container img-fluid" style="width:250px!important">
                        <img src="{{ (isset($user->profile)) ? asset('storage/' . $user->profile )  : $user->getUrlfriendlyAvatar() }} " alt="profile" class="rounded-circle shadow" style="width:100%; height:100%">
                    </div>
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <div>
                        <p class="text-capitalize">{{ $user->name }}</p>
                        <p> {{ $user->email }}</p>
                        <p>Joined at: {{ date('m-d-Y', strtotime($user->created_at)) }}</p>
                        <p>Role : {{ $user->role }}</p>

                    </div>
                   
                </div>
            </div>


        </div>

    </div>
</div>





@endsection