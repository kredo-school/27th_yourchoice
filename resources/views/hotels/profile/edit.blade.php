@extends('layouts.hotel')
@section('title', 'Hotel Admin Edit Profile')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">
    <div class="container mt-2">
        <form method="POST" action="{{ route('hotel.profile.update') }}" enctype="multipart/form-data" id="categoryForm">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md">
                    <h1 class="mb-4 ms-3 fw-bold">Hotel Admin Profile</h1>
                </div>
            </div>
            <div class="row">
                <!-- Left Side (Basic Information) -->
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">Basic</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="hotel_name" class="form-label" required>Hotel Name</label>
                                <input type="text" class="form-control" id="hotel_name" name="hotel_name"
                                    value="{{ old('hotel_name', $user->hotel->hotel_name) }}" autofocus>
                                @error('hotel_name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="hotel_email" class="form-label" required>Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label">Website URL</label>
                                <input type="url" class="form-control" id="url" name="url"
                                    value="{{ old('url', $user->hotel->url) }}">
                                @error('url')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="postal_code" class="form-label" required>Postal Code</label>
                                <div class="input-group">
                                    <span class="input-group-text">〒</span>
                                    <input type="text" class="form-control" id="postal_code" name="postal_code"
                                        value="{{ old('postal_code', $user->hotel->postal_code) }}">
                                </div>
                                @error('postal_code')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="prefecture" class="form-label" required>Address</label>
                                <input type="text" class="form-control mb-1" id="prefecture" name="prefecture"
                                    placeholder="prefecture" value="{{ old('prefecture', $user->hotel->prefecture) }}">
                                @error('prefecture')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control mb-1" id="city" name="city"
                                    placeholder="City" value="{{ old('city', $user->hotel->city) }}">
                                @error('city')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control mb-1" id="street_address" name="street_address"
                                    placeholder="Street Adress"
                                    value="{{ old('street_address', $user->hotel->street_address) }}">
                                @error('street_address')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="form-label" required>Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="{{ old('phone_number', $user->phone_number) }}">
                                @error('phone_number')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="access" class="form-label" required>Access</label>
                                {{-- <input type="text" class="form-control" id="access" name="access"
                                    value="{{ old('access', $user->hotel->access) }}"> --}}
                                <textarea type="text" class="form-control" id="access" name="access">{{ old('access', $user->hotel->access) }}</textarea>
                                @error('access')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label" required>Description</label>
                                <textarea class="form-control custom-textarea" id="description" name="description">{{ old('description', $user->hotel->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side (Images Sections) -->
                <div class="col-md-6">
                    <div class="card mt-2 mb-2">
                        <h5 class="card-header">Uploaded Images</h5>
                        <div class="card-body image-upload-container">
                            @foreach (['image_main', 'image_sub1', 'image_sub2', 'image_sub3', 'image_sub4'] as $index => $imageField)
                                <div class="image-preview mb-3">
                                    @if ($user->hotel->$imageField)
                                        <!-- 既存の画像がある場合のプレビュー -->
                                        <img src="{{ $user->hotel->$imageField }}" alt="Hotel Image"
                                            class="img-thumbnail preview-thumbnail" id="preview-{{ $index + 1 }}">
                                    @else
                                        <!-- 新しい画像のアップロード用 -->
                                        <i class="fa-solid fa-image fa-3x text-muted preview-icon"
                                            id="icon-{{ $index + 1 }}"></i>
                                        <img src="" alt="Preview {{ $index + 1 }}"
                                            class="img-thumbnail preview-thumbnail d-none"
                                            id="preview-{{ $index + 1 }}">
                                    @endif
                                    <!-- 入れ替え用の画像ファイル入力 -->
                                    <label class="upload-icon">
                                        <input type="file" name="{{ $imageField }}" class="image-input d-none"
                                            onchange="previewImage(event, 'preview-{{ $index + 1 }}', 'icon-{{ $index + 1 }}')">
                                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                    </label>
                                    <!-- 削除ボタン（image_main以外） -->
                                    @if ($imageField !== 'image_main')
                                        <span class="delete-icon" id="icon-{{ $index + 1 }}"
                                            onclick="removeImage('preview-{{ $index + 1 }}', 'icon-{{ $index + 1 }}', '{{ $imageField }}')">&times;</span><br>
                                        <input type="hidden" name="delete_{{ $imageField }}"
                                            id="delete_{{ $imageField }}">
                                    @endif
                                    {{-- <p class="mt-2">
                                        {{ str_replace('image_', '', $imageField) }}
                                        @if ($imageField === 'image_main')
                                            <span class="text-danger">*</span>
                                        @endif
                                    </p> --}}
                                    <!-- ラベルにrequiredを追加 -->
                                    <label for="{{ $imageField }}" class="mt-2">
                                        {{ str_replace('image_', '', $imageField) }}
                                        @if ($imageField === 'image_main')
                                            <span class="text-danger">*</span>
                                        @endif
                                    </label>
                                    @error($imageField)
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- JavaScript -->
                    <script src="{{ asset('js/addimage_hotel_profile.js') }}"></script>

                    <!-- Hotel Service Section -->
                    <div class="card mt-2 mb-2">
                        <div class="card-header">Service</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <h6>Hotel Service:</h6>
                                @php
                                    $services = [
                                        7 => 'Parking availability',
                                        8 => 'Luggage storage service',
                                        9 => 'Breakfast',
                                    ];
                                @endphp
                                @foreach ($services as $id => $label)
                                    @if ($id == 9)
                                        <br> <!-- Breakfast の前に改行を追加 -->
                                    @endif
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"
                                            id="category_{{ $id }}" name="category_services[]"
                                            value="{{ $id }}" @if ($user->hotel->categories->contains($id)) checked @endif>
                                        <label class="form-check-label"
                                            for="category_{{ $id }}">{{ $label }}</label>
                                    </div>
                                @endforeach
                                <div class="price-input d-inline-flex align-items-center">
                                    <span>Price:</span>
                                    <div class="input-group ms-2 w-50">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control w-50" id="breakfast_price"
                                            name="breakfast_price" aria-label="Price"
                                            value="{{ old('breakfast_price', $user->hotel->breakfast_price) }}" disabled
                                            min="0" step="0.01">
                                    </div>
                                </div>
                                @error('breakfast_price')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                <!-- JavaScript -->
                                <script src={{ asset('js/formValidation_hotel_profile.js') }}></script>
                            </div>

                            <!-- Amenity Section -->
                            <div class="mb-3">
                                <h6>Amenity:</h6>
                                @php
                                    $amenities = [
                                        10 => 'Wi-Fi',
                                        11 => 'Air conditioning',
                                        12 => 'TV',
                                        13 => 'Dryer',
                                    ];
                                @endphp
                                @foreach ($amenities as $id => $label)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"
                                            id="category_{{ $id }}" name="category_amenities[]"
                                            value="{{ $id }}" @if ($user->hotel->categories->contains($id)) checked @endif>
                                        <label class="form-check-label"
                                            for="category_{{ $id }}">{{ $label }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Free Toiletries Section -->
                            <div class="mb-3">
                                <h6>Free Toiletries:</h6>
                                @php
                                    $toiletries = [
                                        14 => 'Shampoo',
                                        15 => 'Conditioner',
                                        16 => 'Body wash',
                                        17 => 'Toothbrush & paste',
                                    ];
                                @endphp
                                @foreach ($toiletries as $id => $label)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"
                                            id="category_{{ $id }}" name="category_toiletries[]"
                                            value="{{ $id }}" @if ($user->hotel->categories->contains($id)) checked @endif>
                                        <label class="form-check-label"
                                            for="category_{{ $id }}">{{ $label }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Category Section -->

                    <div class="card mt-2 mb-2">
                        <h5 class="card-header">Category</h5>
                        <label for="#" class="text-center" required>
                            --- Please select at least one category ---
                        </label>

                        <div class="card-body">
                            <div class="categories-grid">
                                @php
                                    $categories = [
                                        1 => 'Wheelchair and Senior-friendly',
                                        2 => 'Pregnancy-friendly',
                                        3 => 'Family-friendly',
                                        4 => 'Visual and Hearing Impaired-friendly',
                                        5 => 'Religious-friendly',
                                        6 => 'English-friendly',
                                    ];
                                @endphp
                                @foreach ($categories as $id => $label)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            id="category_{{ $id }}" name="categories[]"
                                            value="{{ $id }}" data-type="category"
                                            @if ($user->hotel->categories->contains($id)) checked @endif>
                                        <label class="form-check-label"
                                            for="category_{{ $id }}">{{ $label }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('categories')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror

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
                    <div class="card mt-2 mb-2">
                        <h5 class="card-header">Cancellation Policy</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="freeCancellation" required>Free Cancellation Period</label>
                                    <div class="d-flex align-items-center">
                                        <input type="number" class="form-control me-2 form-width"
                                            id="cancellation_period" name="cancellation_period"
                                            value="{{ old('cancellation_period', $user->hotel->cancellation_period) }}"
                                            min="0">
                                        <span>days before the reservation date.</span><br>
                                    </div>
                                    @error('cancellation_period')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="#" required>Cancellation Fee Percentage</label>
                                    <div class="d-flex align-items-center mt-1">
                                        <span class="me-3">General</span>
                                        <input type="number" class="form-control mx-2 form-width" name="general_fee"
                                            id="general_fee" value="{{ old('general_fee', $user->hotel->general_fee) }}"
                                            min="0">
                                        <span>%</span><br>
                                    </div>
                                    @error('general_fee')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                    <div class="d-flex align-items-center mt-1">
                                        <span>Same-Day</span>
                                        <input type="number" class="form-control mx-2 form-width" name="sameday_fee"
                                            id="sameday_fee" value="{{ old('sameday_fee', $user->hotel->sameday_fee) }}"
                                            min="0">
                                        <span>%</span><br>
                                    </div>
                                    @error('sameday_fee')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="row mt-4 mb-2 text-end">
                    <div class="col">
                        <a href="{{ route('hotel.profile.show') }}" class="text-decoration-none text-dark">
                            <button type="button" class="btn btn-sub2">Cancel</button></a>
                        <button type="submit" class="btn btn btn-main ms-2">Confirm</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
