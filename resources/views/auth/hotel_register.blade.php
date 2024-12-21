@extends('layouts.hotel')
@section('title', 'Hotel Admin Register')

<!-- CSSのリンク -->
<link rel="stylesheet" href="{{ asset('css/customer-css.css') }}">

@section('content')
    <link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">
    {{-- Editpageはvalue={{old}}置いておけばOK　新規登録の場合は空欄になる --}}
    <div class="container mt-4">
        <form method="POST" action="{{ route('hotel.profile.show') }}" enctype="multipart/form-data">
            @csrf
            @method('GET')
            <div class="row">
                <div class="col-md">
                    <h1 class="mt-4 mb-4 ms-3 fw-bold">Register as a Hotel Admin</h1>
                </div>
            </div>
            <div class="row">
                <!-- Left Side (Basic Information) -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">Basic</div>
                        <div class="card-body">
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
                                <label for="website" class="form-label">Website URL</label>
                                <input type="url" class="form-control" id="website" name="website"
                                    value="{{ old('website') }}">
                            </div>

                            <div class="mb-3">
                                <label for="hotel_postal_code" class="form-label">Postal Code</label>
                                <div class="input-group">
                                    <span class="input-group-text">〒</span>
                                    <input type="text" class="form-control" id="hotel_postal_code"
                                        name="hotel_postal_code" value="{{ old('hotel_postal_code') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="hotel_address" class="form-label">Address</label>
                                <div class="d-flex gap-2">
                                    <input type="text" class="form-control" id="hotel_region" name="hotel_region"
                                        placeholder="Region/State" value="{{ old('hotel_region') }}">
                                    <input type="text" class="form-control" id="hotel_city" name="hotel_city"
                                        placeholder="City" value="{{ old('hotel_city') }}">
                                    <input type="text" class="form-control" id="hotel_address" name="hotel_address"
                                        placeholder="Address" value="{{ old('hotel_address') }}">

                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="hotel_phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="hotel_phone" name="hotel_phone"
                                    value="{{ old('hotel_phone') }}">
                            </div>
                            <div class="mb-3">
                                <label for="access" class="form-label">Definition of Access</label>
                                <input type="text" class="form-control" id="access" name="access"
                                    value="{{ old('access') }}">
                            </div>
                            <div class="mb-3">
                                <label for="attractions" class="form-label">Attractions of the Hotel</label>
                                <textarea class="form-control" id="attractions" name="attractions">{{ old('attractions') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="remarks" class="form-label">Remarks</label>
                                <textarea class="form-control" id="remarks" name="remarks">{{ old('remarks') }}</textarea>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="customer-css-mainbutton">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>        
@endsection
