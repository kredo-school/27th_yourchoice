{{-- Same as the Customer --}}
@extends('layouts.customer')

<!-- CSSのリンク -->
{{-- Same CSS as the Customer --}}
<link rel="stylesheet" href="{{ asset('css/customer-css.css') }}">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Register as a Hotel Admin</h1>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('hotel.profile.show') }}">
                            @csrf
                            @method('GET')
                            <div class="row">
                                <div class="mb-3">
                                    <label for="hotel_name" class="form-label">Hotel Name</label>
                                    <input type="text" class="form-control" id="hotel_name" name="hotel_name"
                                        value="{{ old('hotel_name') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="hotel_email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="hotel_email" name="hotel_email"
                                        value="{{ old('hotel_email') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="hotel_phone" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="hotel_phone" name="hotel_phone"
                                        value="{{ old('hotel_phone') }}">
                                </div>
                                <!-- Password -->
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        value="#" autofocus>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        value="#" autofocus>
                                </div>

                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="customer-css-mainbutton">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
