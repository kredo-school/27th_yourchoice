@extends('layouts.customer_mypage')

<link rel="stylesheet" href="{{ asset('css/customer-css.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-8 p-4">
            <div class="profile-section mb-4">
                <h2>Edit Profile</h2>
                <form action="{{ route('customer.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $user->first_name )}}" autofocus>
                            @error('first_name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $user->last_name )}}">
                            @error('last_name')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}">
                        @error('username')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
                        @error('email')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number', $user->phone_number) }}">
                        @error('phone_number')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Category</label>
                        @foreach ($all_categories as $category)
                        <div class="form-check">
                            <input type="checkbox" name="category[]" id="category_{{ $category->id }}" class="form-check-input" value="{{ $category->id }}" 
                                {{ in_array($category->id, $selected_categories) ? 'checked' : '' }}>
                            <label for="category_{{ $category->id }}" class="form-check-label">{{ $category->name }}</label>
                        </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('customer.profile.show') }}" class="sub-button-disabled">Cancel</a>
                        <button type="submit" class="customer-css-mainbutton">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- Text to Speech：call js -->
@push('scripts')
<script src="{{ asset('js/api_text_to_speech.js') }}"></script>
@endpush