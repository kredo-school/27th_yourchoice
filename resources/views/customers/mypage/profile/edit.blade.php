@extends('layouts.customer_mypage')

<!-- CSSのリンク -->
<link rel="stylesheet" href="{{ asset('css/customer-css.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row">

        <!-- メインコンテンツ -->
        <div class="col-8 p-4">
            <!-- Edit Profile Information -->
            <div class="profile-section mb-4">
                <h2>Edit Profile</h2>
                <form action="{{ route('customer.profile.update') }}" method="POST">
                    @csrf
                    @method('PATCH') <!-- Specify the method for updating -->

                    <!-- First Name and Last Name -->
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $user->first_name )}}" autofocus>
                        </div>
                        <div class="col">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $user->last_name )}}" autofocus>
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" autofocus>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="mail" id="email" class="form-control" value="{{ old('email', $user->email) }}" autofocus>
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="form_control" value="{{ old('phone_number', $user->phone_number) }}" autofocus>
                    </div>

                    <!-- Accessibility Categories -->
                    <div class="mb-4">
                        <label class="form-label">Category</label>
                        <div class="category-checkbox">
                            @foreach ($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}"
                                        {{ $user->categories->contains($category->id) ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                            {{-- Error message area --}}
                            @error('category')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                            
                        
                

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('customer.profile.show') }}" class="sub-button-disabled ">Cancel</a>
                        <button type="submit" class="customer-css-mainbutton">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection