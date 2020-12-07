@extends('layouts.base')


@section('header')
<header class="header  text-dark" style="min-height:130px">
    <div class="container">
        <h1 class="text-light">Setup Shipping Address </h1>
    </div>
</header>
@endsection
@section('content')
<!-- Main Content -->
<main class="main-content">

    <section class="section">
        <div class="container">

            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <form action="{{ route('shippings.store') }}" method="POST">
                        @csrf
                        <h5 class="text-light">Personal Information</h5>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" name="first_name" id="first_name"  class="form-control @error('first_name') is-Winvalid @enderror" placeholder="First name">
                                @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last name">
                                @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" name="contact_number" id="contact_number" value="{{ old('contact_number') }}" class="form-control @error('contact_number') is-invalid @enderror" placeholder="Contact Number">
                                @error('contact_number')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 form-group"> 
                               <h5 class="text-light">Address Information</h5>
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" name="house_number" id="house_number" value="{{ old('house_number') }}" class="form-control @error('house_number') is-invalid @enderror" placeholder="House Number">
                                @error('house_number')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" name="street" id="street" value="{{ old('street') }}" class="form-control @error('street') is-invalid @enderror" placeholder="Street">
                                @error('street')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" name="barangay" id="barangay" value="{{ old('barangay') }}" class="form-control @error('barangay') is-invalid @enderror" placeholder="Barangay">
                                @error('barangay')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" name="city" id="city" value="{{ old('city') }}" class="form-control @error('city') is-invalid @enderror" placeholder="City">
                                @error('city')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" name="province" id="province" value="{{ old('province') }}" class="form-control @error('province') is-invalid @enderror" placeholder="Province">
                                @error('province')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" class="form-control @error('zip_code') is-invalid @enderror" placeholder="Zip Code">
                                @error('zip_code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <input class="form-control" type="text" name="country" id="country" value="{{ old('country') }}" class="form-control @error('country') is-invalid @enderror" placeholder="Country">
                                @error('country')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group text-light">
                                <button type="submit" class="btn btn-success float-right">Save</button>
                            </div>

                        </div>
                </div>


            </div>



            </form>



        </div>
    </section>

</main>

@endsection