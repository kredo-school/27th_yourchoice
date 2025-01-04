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
                        <form method="POST" action="{{ route('register.create_admin') }}">
                            @csrf
                            @method('GET')
                            <div class="row">
                                <div class="mb-3">
                                    <label for="username" class="form-label">{{ __('Hotel name') }}</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ old('username') }}">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{ __('Phone Number') }}</label>
                                    <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}">
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Password') }}</label>
                                    <input type="password" name="password_hash" id="password_hash" class="form-control" value="{{ old('password_hash') }}" autofocus>
                                        @error('passwordd_hash')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Confirm Password') }}</label>
                                    <input type="password" name="password_hash_confirm" id="password_hash" class="form-control" autofocus>
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
