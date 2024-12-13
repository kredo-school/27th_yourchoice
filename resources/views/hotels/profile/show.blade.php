@extends('layouts.hotel')
@section('title', 'Hotel Admin Show Profile')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">

    <div class="container mt-4">
        <form method="POST" action="{{ route('profile.show') }}" enctype="multipart/form-data">
            @csrf
            @method('GET')
            <div class="row">
                <div class="col-md">
                    <h1 class="mt-4 mb-4 ms-3 fw-bold">Hotel Admin Profile</h1>
                </div>
            </div>
            <div class="row">

                <!-- Left Side (Basic Information) -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">Basic</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Hotel Name</label>
                                <p class="form-control-plaintext border-bottom">{{ old('hotel_name') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <p class="form-control-plaintext border-bottom">{{ old('hotel_email') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Website URL</label>
                                <p class="form-control-plaintext border-bottom">{{ old('website') }}</p>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Postal Code</label>
                                <p class="form-control-plaintext border-bottom">〒{{ old('hotel_postal_code') }}</p>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <div>
                                    <p class="form-control-plaintext border-bottom">
                                        {{ old('hotel_region') }}{{ old('hotel_city') }}{{ old('hotel_address') }}
                                    </p>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <p class="form-control-plaintext border-bottom">{{ old('hotel_phone') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Definition of Access</label>
                                <p class="form-control-plaintext border-bottom">{{ old('access') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Attractions of the Hotel</label>
                                <p class="form-control-plaintext border-bottom">{{ old('attractions') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Remarks</label>
                                <p class="form-control-plaintext border-bottom">{{ old('remarks') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side (Images and Other Sections) -->
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-header">Uploaded Images</h5>
                            <div class="image-upload-container ms-3 mt-3">
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="image-preview">
                                        <div class="position-relative">
                                            @if (isset($images[$i]))
                                                <img src="{{ $images[$i] }}" alt="Uploaded Image"
                                                    class="img-thumbnail preview-thumbnail"
                                                    id="preview-{{ $i }}">
                                                <span class="badge bg-secondary position-absolute top-0 start-0"
                                                    id="label-{{ $i }}">Image {{ $i + 1 }}</span>
                                            @else
                                                <p class="text-muted">No image uploaded</p>
                                            @endif
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <!-- Right Side (Service and Amenities) -->
                    <div class="card mb-2">
                        <div class="card-header">Service</div>
                        <div class="card-body">
                            <!-- Hotel Service Section -->
                            <div class="mb-3">
                                <h6>Hotel Service:</h6>
                                <div class="service-line">
                                    <span class="service-item">Parking availability</span>
                                    <span class="service-item">Luggage storage service</span>
                                    <span class="service-item">Breakfast - Price: $20</span>
                                </div>
                            </div>

                            <!-- Amenity Section -->
                            <div class="mb-3">
                                <h6>Amenity:</h6>
                                <div class="service-line">
                                    <span class="service-item">Wi-Fi</span>
                                    <span class="service-item">Air conditioning</span>
                                    <span class="service-item">TV</span>
                                    <span class="service-item">Dryer</span>
                                </div>
                            </div>

                            <!-- Free Toiletries Section -->
                            <div class="mb-3">
                                <h6>Free Toiletries:</h6>
                                <div class="service-line">
                                    <span class="service-item">Shampoo</span>
                                    <span class="service-item">Conditioner</span>
                                    <span class="service-item">Body wash</span>
                                    <span class="service-item">Toothbrush</span>
                                    <span class="service-item">Toothpaste</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- 以下backend作成時参考にするコード --}}
                    {{-- <!-- Right Side (Service and Amenities) -->
                <div class="card mb-2">
                    <div class="card-header">Service</div>
                    <div class="card-body">
                        <!-- Hotel Service Section -->
                        <div class="mb-3">
                            <h6>Hotel Service :</h6>
                            <ul>
                                @if (in_array('parking', $services))
                                    <li>Parking availability</li>
                                @endif
                                @if (in_array('luggage', $services))
                                    <li>Luggage storage service</li>
                                @endif
                                @if (in_array('breakfast', $services))
                                    <li>Breakfast - Price: ${{ $breakfast_price }}</li>
                                @endif
                            </ul>
                        </div>

                        <!-- Amenity Section -->
                        <div class="mb-3">
                            <h6>Amenity :</h6>
                            <ul>
                                @if (in_array('wifi', $amenities))
                                    <li>Wi-Fi</li>
                                @endif
                                @if (in_array('aircon', $amenities))
                                    <li>Air conditioning</li>
                                @endif
                                @if (in_array('tv', $amenities))
                                    <li>TV</li>
                                @endif
                                @if (in_array('dryer', $amenities))
                                    <li>Dryer</li>
                                @endif
                            </ul>
                        </div>

                        <!-- Free Toiletries Section -->
                        <div class="mb-3">
                            <h6>Free Toiletries :</h6>
                            <ul>
                                @if (in_array('shampoo', $toiletries))
                                    <li>Shampoo</li>
                                @endif
                                @if (in_array('conditioner', $toiletries))
                                    <li>Conditioner</li>
                                @endif
                                @if (in_array('bodywash', $toiletries))
                                    <li>Body wash</li>
                                @endif
                                @if (in_array('toothbrush', $toiletries))
                                    <li>Toothbrush</li>
                                @endif
                                @if (in_array('toothpaste', $toiletries))
                                    <li>Toothpaste</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div> --}}

                    <!-- Category Section -->
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-header">Category</h5>
                            <div class="category-container">
                                <span class="category-item">Wheelchair and Senior-friendly</span>
                                <span class="category-item">Visual and Hearing Impaired-friendly</span>
                                <span class="category-item">Pregnancy-friendly</span>
                                <span class="category-item">Religious-friendly</span>
                                <span class="category-item">Family-friendly</span>
                                <span class="category-item">English-friendly</span>
                            </div>
                        </div>
                    </div>

                    <!-- Cancellation Policy Section -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-header">Cancellation Policy</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Free Cancellation Period: <br>X days before the reservation date.</p>
                                </div>
                                <div class="col-md-6">
                                    <p>Cancellation Fee Percentage:</p>
                                    <p>General: X%</p>
                                    <p>Same-Day: X%</p>
                                    <p>No-Shows: X%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="d-flex mt-4">
                    <button type="button" class="btn btn-sub ms-auto">Password Setting</button>
                    <button type="submit" class="btn btn-sub ms-2">Edit</button>
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
