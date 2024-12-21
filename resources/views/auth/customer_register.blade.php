@extends('layouts.customer')

<!-- CSSのリンク -->
<link rel="stylesheet" href="{{ asset('css/customer-css.css') }}">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Register as a Customer</h1> 
            <div class="card">
           

                <div class="card-body">
                    <form method="POST" action="{{ route('customer.profile.show') }}">
                        @csrf
                        @method('GET')

                         <!-- First Name and Last Name -->
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first-name" id="first-name" class="form-control" value="#" readonly>
                        </div>
                        <div class="col">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last-name" id="last-name" class="form-control" value="#" autofocus>
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="customer-email" id="customer-email" class="form-control" value="#" autofocus>
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="customer-phone" id="customer-phone" class="form-control" value="{{ old('customer-phone') }}">
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="#" autofocus>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="#" autofocus>
                    </div>

                    <!-- Accessibility Categories -->
                    <div class="mb-4">
                        <label class="form-label">Category</label>
                       
              
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="wheelchair">
                            <label class="form-check-label" for="wheelchair">Wheelchair and Senior-Friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="pregnancy">
                            <label class="form-check-label" for="pregnancy">Pregnancy-friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="family">
                            <label class="form-check-label" for="family">Family-friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="visuallyImpaired">
                            <label class="form-check-label" for="visuallyImpaired">Visually and Hearing Impairment-Friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="religious">
                            <label class="form-check-label" for="religious">Religious-friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="english">
                            <label class="form-check-label" for="english">English-friendly</label>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="customer-css-mainbutton">Register</button>
                    </div>
                    @csrf
                    <div class="mt-3">
                        <h4 class="text-center"><i class="fa-brands fa-google"></i> You can also use Google account</h4>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
