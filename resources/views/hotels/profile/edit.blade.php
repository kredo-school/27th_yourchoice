@extends('layouts.hotel')
@section('title', 'Hotel Admin Edit Profile')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">
    {{-- Editpageはvalue={{old}}置いておけばOK　新規登録の場合は空欄になる --}}
    <div class="container mt-2">
        <form method="POST" action="{{ route('profile.edit') }}" enctype="multipart/form-data">
            @csrf
            @method('GET')
            <div class="row">
                <div class="col-md">
                    <h1 class="mb-4 ms-3 fw-bold">Hotel Admin Profile</h1>
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
                    </div>
                </div>

                <!-- Right Side (Images and Other Sections) -->
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-header">Upload Images</h5>
                            <div class="image-upload-container ms-3 mt-3">
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="image-preview">
                                        <label class="position-relative">
                                            <input type="file" name="images[]" class="image-input d-none"
                                                onchange="previewImage(event, {{ $i }})">
                                            <i class="fa-solid fa-image fa-3x text-muted preview-icon"
                                                id="icon-{{ $i }}"></i>
                                            <img src="" alt="Preview"
                                                class="img-thumbnail preview-thumbnail d-none"
                                                id="preview-{{ $i }}">
                                            <span class="badge bg-secondary position-absolute top-0 start-0"
                                                id="label-{{ $i }}"></span>
                                        </label>
                                        <span class="delete-icon"
                                            onclick="removeImage({{ $i }})">&times;</span>
                                    </div>
                                @endfor
                            </div>
                            <small class="text-muted ms-3">↑ Click here. You can upload up to 5 images.</small>
                        </div>
                    </div>

                    {{-- 写真空欄のコード　後で消す --}}
                    {{-- <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-header">Upload Images</h5>
                            <div class="image-upload-container ms-3 mt-3">
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="image-preview">
                                        <input type="file" name="images[]" class="image-input">
                                        <span class="delete-icon">&times;</span>
                                    </div>
                                @endfor
                            </div>
                            <small class="text-muted ms-3">You can upload up to 5 images.</small>
                        </div>
                    </div> --}}


                    <div class="card mb-2">
                        <div class="card-header">Service</div>
                        <div class="card-body">
                            <!-- Hotel Service Section -->
                            <div class="mb-3">
                                <h6>Hotel Service :</h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="parking" name="services[]"
                                        value="parking">
                                    <label class="form-check-label" for="parking">Parking availability</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="luggage" name="services[]"
                                        value="luggage">
                                    <label class="form-check-label" for="luggage">Luggage storage service</label>
                                </div><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="breakfast" name="services[]"
                                        value="breakfast">
                                    <label class="form-check-label" for="breakfast">Breakfast</label>
                                </div>
                                <div class="price-input d-inline-flex align-items-center">
                                    <span>Price:</span>
                                    <span class="ms-1">$</span>
                                    <input type="number" class="form-control price-field ms-1" name="breakfast_price"
                                        aria-label="Price">
                                </div>

                            </div>

                            <!-- Amenity Section -->
                            <div class="mb-3">
                                <h6>Amenity :</h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="wifi" name="amenities[]"
                                        value="wifi">
                                    <label class="form-check-label" for="wifi">Wi-Fi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="aircon" name="amenities[]"
                                        value="aircon">
                                    <label class="form-check-label" for="aircon">Air conditioning</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="tv" name="amenities[]"
                                        value="tv">
                                    <label class="form-check-label" for="tv">TV</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="dryer" name="amenities[]"
                                        value="dryer">
                                    <label class="form-check-label" for="dryer">Dryer</label>
                                </div>
                            </div>

                            <!-- Free Toiletries Section -->
                            <div class="mb-3">
                                <h6>Free Toiletries :</h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="shampoo" name="toiletries[]"
                                        value="shampoo">
                                    <label class="form-check-label" for="shampoo">Shampoo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="conditioner" name="toiletries[]"
                                        value="conditioner">
                                    <label class="form-check-label" for="conditioner">Conditioner</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="bodywash" name="toiletries[]"
                                        value="bodywash">
                                    <label class="form-check-label" for="bodywash">Body wash</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="toothbrush" name="toiletries[]"
                                        value="toothbrush">
                                    <label class="form-check-label" for="toothbrush">Toothbrush&paste</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category Section -->
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-header">Category</h5>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="wheelchair"
                                            name="categories[]" value="wheelchair">
                                        <label class="form-check-label" for="wheelchair">Wheelchair and
                                            Senior-friendly</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="visual"
                                            name="categories[]" value="visual">
                                        <label class="form-check-label" for="visual">Visual and Hearing
                                            Impaired-friendly</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="pregnancy"
                                            name="categories[]" value="pregnancy">
                                        <label class="form-check-label" for="pregnancy">Pregnancy-friendly</label>
                                    </div><br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="religious"
                                            name="categories[]" value="religious">
                                        <label class="form-check-label" for="religious">Religious-friendly</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="family"
                                            name="categories[]" value="family">
                                        <label class="form-check-label" for="family">Family-friendly</label>
                                    </div><br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="english"
                                            name="categories[]" value="english">
                                        <label class="form-check-label" for="english">English-friendly</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Requirements Button -->
                            <div class="row">
                                <div class="col text-end">
                                    <button type="button" class="btn btn-sub mt-3 ms-auto" data-bs-toggle="modal"
                                        data-bs-target="#requirementsModal">
                                        Requirements
                                    </button>
                                </div>
                            </div>
                            {{-- Include modal here --}}
                            @include('hotels.profile.modals.requirements_category')
                        </div>
                    </div>

                    <!-- Cancellation Policy Section -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-header">Cancellation Policy</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="freeCancellation">Free Cancellation Period:</label>
                                    <div class="d-flex align-items-center">
                                        <input type="number" class="form-control me-2 form-width" id="freeCancellation"
                                            name="free_cancellation">
                                        <span>days before the reservation date.</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Cancellation Fee Percentage:</label>
                                    <div class="d-flex align-items-center mt-1">
                                        <span class="me-3">General</span>
                                        <input type="number" class="form-control mx-2 form-width" name="fee_general">
                                        <span>%</span>
                                    </div>
                                    <div class="d-flex align-items-center mt-1">
                                        <span>Same-Day</span>
                                        <input type="number" class="form-control mx-2 form-width" name="fee_same_day">
                                        <span>%</span>
                                    </div>
                                    <div class="d-flex align-items-center mt-1">
                                        <span>No-Shows</span>
                                        <input type="number" class="form-control mx-2 form-width" name="fee_no_shows">
                                        <span>%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="row mt-4 mb-2 text-end">
                    <div class="col">
                        <a href="{{ route('profile.show') }}" class="text-decoration-none text-dark">
                            <button type="button" class="btn btn-sub2">Cancel</button></a>
                        <button type="button" class="btn btn btn-main ms-2">Confirm</button>
                    </div>
                </div>
        </form>
    </div>

    {{-- 写真の削除 --}}
    {{-- <script>
        document.querySelectorAll('.delete-image').forEach(button => {
            button.addEventListener('click', function() {
                const imageElement = this.closest('.image-preview');
                imageElement.remove(); // Remove the preview element
            });
        });
    </script> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}


    {{-- 写真関連 --}}
    <script>
        function previewImage(event, index) {
            const input = event.target;
            const preview = document.getElementById(`preview-${index}`);
            const icon = document.getElementById(`icon-${index}`);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                    icon.classList.add('d-none');
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "";
                preview.classList.add('d-none');
                icon.classList.remove('d-none');
            }
        }

        function removeImage(index) {
            const input = document.querySelectorAll('.image-input')[index];
            const preview = document.getElementById(`preview-${index}`);
            const icon = document.getElementById(`icon-${index}`);
            input.value = "";
            preview.src = "";
            preview.classList.add('d-none');
            icon.classList.remove('d-none');
        }

        // Frontend-only label setup
        document.addEventListener('DOMContentLoaded', function() {
            const labels = document.querySelectorAll('.badge');
            labels.forEach((label, index) => {
                label.textContent = index === 0 ? 'main' : `sub${index}`;
            });
        });
    </script>

@endsection
