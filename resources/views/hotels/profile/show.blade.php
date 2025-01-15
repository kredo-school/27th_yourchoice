@extends('layouts.hotel')
@section('title', 'Hotel Admin Show Profile')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">

    <div class="container mt-2">
        <form method="GET" action="{{ route('hotel.profile.edit') }}" enctype="multipart/form-data">
            @csrf
            {{-- @method('GET') --}}
            <div class="row">
                <div class="col-md">
                    <h1 class="mb-4 ms-3 fw-bold">Hotel Admin Profile</h1>
                </div>
            </div>
            <div class="row">
                <!-- Left Side (Basic Information) -->
                <div class="col-md-6">
                    <div class="card mt-2 mb-2">
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
                                        {{ $user->hotel->address }}
                                    </p>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <p class="form-control-plaintext border-bottom">{{ old('hotel_phone') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Access</label>
                                <p class="form-control-plaintext border-bottom">{{ old('access') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <p class="form-control-plaintext border-bottom">{{ old('attractions') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side (Images and Other Sections) -->
                <div class="col-md-6">
                    <div class="card mt-2 mb-2">
                        <h5 class="card-header">Uploaded Images</h5>
                        <div class="card-body image-upload-container">
                            <div class="image-preview mb-3">
                                @if ($hotel->image_main)
                                    <img src="{{ $hotel->image_main }}" alt="Hotel Image"
                                        class="img-thumbnail preview-thumbnail"><br>
                                    <p>main</p>
                                @else
                                    <p class="text-muted">No image uploaded</p>
                                @endif
                            </div>
                            <div class="image-preview mb-3">
                                @if ($hotel->image_sub1)
                                    <img src="{{ $hotel->image_sub1 }}" alt="Hotel Image"
                                        class="img-thumbnail preview-thumbnail"><br>
                                    <p>sub1</p>
                                @else
                                    <p class="text-muted">No image uploaded</p>
                                @endif
                            </div>
                            <div class="image-preview mb-3">
                                @if ($hotel->image_sub2)
                                    <img src="{{ $hotel->image_sub2 }}" alt="Hotel Image"
                                        class="img-thumbnail preview-thumbnail"><br>
                                    <p>sub2</p>
                                @else
                                    <p class="text-muted">No image uploaded</p>
                                @endif
                            </div>
                            <div class="image-preview mb-3">
                                @if ($hotel->image_sub3)
                                    <img src="{{ $hotel->image_sub3 }}" alt="Hotel Image"
                                        class="img-thumbnail preview-thumbnail"><br>
                                    <p>sub3</p>
                                @else
                                    <p class="text-muted">No image uploaded</p>
                                @endif
                            </div>
                            <div class="image-preview mb-3">
                                @if ($hotel->image_sub4)
                                    <img src="{{ $hotel->image_sub4 }}" alt="Hotel Image"
                                        class="img-thumbnail preview-thumbnail"> <br>
                                    <p>sub4</p>
                                @else
                                    <p class="text-muted">No image uploaded</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- @for ($i = 0; $i < 5; $i++)
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
                                @endfor --}}


                    <!-- Right Side (Service and Amenities) -->
                    <div class="card mt-2 mb-2">
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
                                    <span class="service-item">Toothbrush&paste</span>
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
                    <div class="card mt-2 mb-2">
                        <h5 class="card-header">Category</h5>
                        <div class="card-body">
                            <div class="category-container">
                                <span class="category-item">Wheelchair and Senior</span>
                                <span class="category-item">Visual and Hearing Impaired</span>
                                <span class="category-item">Pregnancy</span>
                                <span class="category-item">Religious</span>
                                <span class="category-item">Family</span>
                                <span class="category-item">English</span>
                            </div>
                        </div>
                    </div>

                    <!-- Cancellation Policy Section -->
                    <div class="card mt-2 mb-2">
                        <h5 class="card-header">Cancellation Policy</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Free Cancellation Period: <br>X days before the reservation date.</p>
                                </div>
                                <div class="col-md-6">
                                    <p>Cancellation Fee Percentage:</p>
                                    <p>General: X%</p>
                                    <p>Same-Day: X%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="row mt-4 mb-2 text-end">
                    <div class="col">
                        <a href="{{ route('hotel.profile.editpass') }}" class="text-decoration-none text-dark">
                            <button type="button" class="btn btn-sub">Password Setting</button></a>
                        <a href="{{ route('hotel.profile.edit') }}" class="text-decoration-none text-dark ms-2">
                            <button type="submit" class="btn btn-sub">Edit</button>
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
