@extends('layouts.hotel')
@section('title', 'Hotel Admin Edit Profile')
@section('content')

    <div class="container mt-4">
        <h2 class="mb-4">Hotel Admin Profile</h2>
        <form method="POST" action="{{ route('profile.edit') }}" enctype="multipart/form-data">
            @csrf
            @method('GET')

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
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}">
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label">Website URL</label>
                                <input type="url" class="form-control" id="website" name="website"
                                    value="{{ old('website') }}">
                            </div>
                            <div class="mb-3">
                                <label for="postal_code" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code"
                                    value="{{ old('postal_code') }}">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ old('address') }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone') }}">
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
                        </div>
                    </div>
                </div>

                <!-- Right Side (Images and Other Sections) -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">Upload Images</div>
                        <div class="card-body">
                            <div class="image-upload-container">
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="image-preview">
                                        <input type="file" name="images[]" class="image-input">
                                        <span class="delete-icon">&times;</span>
                                    </div>
                                @endfor
                            </div>
                            <small class="text-muted">You can upload up to 5 images.</small>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">Facility & Service</div>
                        <div class="card-body">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="parking" name="services[]"
                                    value="parking">
                                <label class="form-check-label" for="parking">Parking availability</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="wifi" name="services[]"
                                    value="wifi">
                                <label class="form-check-label" for="wifi">Wi-Fi</label>
                            </div>
                        </div>
                    </div>

                    <!-- Category Section -->
                    <div class="card mb-4">
                        <div class="card-header">Category</div>
                        <div class="card-body">
                            <!-- Requirements Button -->
                            <button type="button" class="btn btn-info mt-3" data-bs-toggle="modal"
                                data-bs-target="#requirementsModal">
                                Requirements
                            </button>


                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="wheelchair" name="categories[]"
                                    value="wheelchair">
                                <label class="form-check-label" for="wheelchair">Wheelchair and Senior-Friendly</label>
                                <input type="checkbox" class="form-check-input" id="pregnancy" name="categories[]"
                                    value="pregnancy">
                                <label class="form-check-label" for="pregnancy">Pregnancy-Friendly</label>
                                <input type="checkbox" class="form-check-input" id="family" name="categories[]"
                                    value="family">
                                <label class="form-check-label" for="family">Family-Friendly</label>
                                <input type="checkbox" class="form-check-input" id="visualandhearing"
                                    name="categories[]" value="visualandhearing">
                                <label class="form-check-label" for="visualandhearing">Visual and Hearing
                                    Impaired-Friendly</label>
                                <input type="checkbox" class="form-check-input" id="religious" name="categories[]"
                                    value="religious">
                                <label class="form-check-label" for="religious">Religious-Friendly</label>
                                <input type="checkbox" class="form-check-input" id="english" name="categories[]"
                                    value="english">
                                <label class="form-check-label" for="english">English-Friendly</label>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">Cancellation Policy</div>
                        <div class="card-body">
                            <label for="free_cancellation_period" class="form-label">Free Cancellation Period</label>
                            <input type="number" class="form-control mb-3" id="free_cancellation_period"
                                name="free_cancellation_period">
                            <label for="general_fee" class="form-label">Cancellation Fee (General)</label>
                            <input type="number" class="form-control" id="general_fee" name="general_fee">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Remarks Section -->
            <div class="row mt-3">
                <div class="col-12">
                    <label for="remarks" class="form-label">Remarks</label>
                    <textarea class="form-control" id="remarks" name="remarks"></textarea>
                </div>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
        </form>
    </div>

    {{-- 写真の削除 --}}
    <script>
        document.querySelectorAll('.delete-image').forEach(button => {
            button.addEventListener('click', function() {
                const imageElement = this.closest('.image-preview');
                imageElement.remove(); // Remove the preview element
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


@endsection
