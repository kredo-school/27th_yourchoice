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
                <form action="#" method="POST">
                    @csrf
                    @method('PUT') <!-- Specify the method for updating -->

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

                    <!-- Date of Birth and Nationality -->
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{ old('birthdate') }}">
                        </div>
                        <div class="col">
                            <label class="form-label">Nationality</label>
                            <input type="text" name="nationality" id="nationality" class="form-control" value="{{ old('nationality') }}">
                        </div>
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="customer-phone" id="customer-phone" class="form-control" value="{{ old('customer-phone') }}">
                    </div>

                    <!-- Passport Number -->
                    <div class="mb-3">
                        <label class="form-label">Passport No.</label>
                        <input type="number" name="passport" id="passport" class="form-control" value="#" autofocus>
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
                    <div class="d-flex justify-content-between">
                        <a href="#" class="sub-button-disabled ">Cancel</a>
                        <button type="submit" class="customer-css-mainbutton">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection