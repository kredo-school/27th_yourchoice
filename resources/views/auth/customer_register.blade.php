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
                    <form method="POST" action="{{ route('register.create') }}">
                        @csrf
                        @method('GET')

                    <!--<input type="hidden" name="role_id" value="#"> -->

                    <!-- First Name and Last Name -->
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">{{ __('First Name') }}</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">{{ __('Last Name') }}</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="mb-3">
                        <label class="form-label">{{ __('Username') }}</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" required autocomplete="username">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">{{ __('Email') }}</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <!-- Phone Number -->
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


                 <!--ここでtableが変わる-->
                    <!-- Accessibility Categories -->
                    <div class="mb-4">
                        <label class="form-label">Category</label>
                       
              
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="wheelchair" name="categories[]" value="1">
                            <label class="form-check-label" for="wheelchair">Wheelchair and Senior-Friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="pregnancy" name="categories[]" value="2">
                            <label class="form-check-label" for="pregnancy">Pregnancy-friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="family" name="categories[]" value="3">
                            <label class="form-check-label" for="family">Family-friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="visuallyImpaired" name="categories[]" value="4">
                            <label class="form-check-label" for="visuallyImpaired">Visually and Hearing Impairment-Friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="religious" name="categories[]" value="5">
                            <label class="form-check-label" for="religious">Religious-friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="english" name="categories[]" value="6">
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
