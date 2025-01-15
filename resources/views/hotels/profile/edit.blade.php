@extends('layouts.hotel')
@section('title', 'Hotel Admin Edit Profile')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">
    {{-- Editpageはvalue={{old}}置いておけばOK　新規登録の場合は空欄になる --}}
    <div class="container mt-2">
        <form method="POST" action="{{ route('hotel.profile.update') }}" enctype="multipart/form-data" id="categoryForm">
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
                    <div class="card mb-3">
                        <div class="card-header">Basic</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="hotel_name" class="form-label">Hotel Name</label>
                                <input type="text" class="form-control" id="hotel_name" name="hotel_name"
                                    value="{{ old('hotel_name', $user->hotel->hotel_name) }}">
                                @error('hotel_name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="hotel_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="hotel_email" name="hotel_email"
                                    value="{{ old('hotel_email') }}">
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
                                <label for="postal_code" class="form-label">Postal Code</label>
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
                                <label for="prefecture" class="form-label">Address</label>
                                <input type="text" class="form-control mb-2" id="prefecture" name="prefecture"
                                    placeholder="prefecture" value="{{ old('prefecture', $user->hotel->prefecture) }}">
                                @error('prefecture')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control mb-2" id="city" name="city"
                                    placeholder="City" value="{{ old('city', $user->hotel->city) }}">
                                @error('city')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" id="street_address" name="street_address"
                                    placeholder="Street Adress"
                                    value="{{ old('street_address', $user->hotel->street_address) }}">
                                @error('street_address')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="{{ old('phone_number', $user->phone_number) }}">
                                @error('phone_number')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="access" class="form-label">Access</label>
                                <input type="text" class="form-control" id="access" name="access"
                                    value="{{ old('access', $user->hotel->access) }}">
                                @error('access')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ old('description', $user->hotel->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <!-- Right Side (Images and Other Sections) --> --}}
                <div class="col-md-6">
                    <div class="card mt-2 mb-2">
                        <h5 class="card-header">Uploaded Images</h5>
                        <div class="card-body image-upload-container">
                            <!-- Image main -->
                            <div class="image-preview mb-3">
                                @if ($user->hotel->image_main)
                                    <!-- 既存の画像がある場合のプレビュー -->
                                    <img src="{{ $user->hotel->image_main }}" alt="Hotel Image"
                                        class="img-thumbnail preview-thumbnail" id="preview-1">
                                @else
                                    <!-- 新しい画像のアップロード用 -->
                                    <i class="fa-solid fa-image fa-3x text-muted preview-icon" id="icon-1"></i>
                                    <img src="" alt="Preview 1" class="img-thumbnail preview-thumbnail d-none"
                                        id="preview-1">
                                @endif
                                <!-- 画像ファイル入力 -->
                                <label class="upload-icon">
                                    <input type="file" name="image_main" class="image-input d-none"
                                        onchange="previewImage(event, 'preview-1', 'icon-1')">
                                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                </label>
                                <!-- 削除ボタン -->
                                <span class="delete-icon" id="icon-1"
                                    onclick="removeImage('preview-1', 'icon-1', 'image_main')">&times;</span><br>
                                <p class="mt-2">main</p>
                                @error('image_main')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                <!-- 画像削除用の隠し入力 -->
                                <input type="hidden" name="delete_image_main" id="delete_image_main">
                            </div>

{{-- 

                            <div class="image-preview mb-3">
                              @if ($user->hotel->image_main)
                                  <!-- 既存の画像がある場合のプレビュー -->
                                  <img src="{{ $user->hotel->image_main }}" alt="Hotel Image"
                                      class="img-thumbnail preview-thumbnail" id="preview-1">
                              @else
                                  <!-- 新しい画像のアップロード用 -->
                                  <i class="fa-solid fa-image fa-3x text-muted preview-icon" id="icon-1"></i>
                                  <img src="" alt="Preview 1" class="img-thumbnail preview-thumbnail d-none"
                                      id="preview-1">
                              @endif
                              <!-- 入れ替え用の画像ファイル入力 -->
                              <label class="upload-icon">
                                  <input type="file" name="image_main" class="image-input d-none"
                                      onchange="previewImage(event, 'preview-1', 'icon-1')">
                                  <i class="fa-solid fa-arrow-up-from-bracket"></i>
                              </label>
                              <!-- 削除ボタン -->
                              <span class="delete-icon" id="icon-1"
                                  onclick="removeImage('preview-1', 'icon-1', 'image_main')">&times;</span><br>
                              <p class="mt-2">main</p>
                              @error('image_main')
                                  <div class="text-danger small">{{ $message }}</div>
                              @enderror
                              <!-- 画像削除用の隠し入力 -->
                              <input type="hidden" name="delete_image_main" id="delete_image_main">
                          </div>
 --}}





                            <!-- Image sub1 -->
                            <div class="image-preview mb-3">
                                @if ($user->hotel->image_sub1)
                                    <!-- 既存の画像がある場合のプレビュー -->
                                    <img src="{{ $user->hotel->image_sub1 }}" alt="Hotel Image"
                                        class="img-thumbnail preview-thumbnail" id="preview-2">
                                @else
                                    <!-- 新しい画像のアップロード用 -->
                                    <i class="fa-solid fa-image fa-3x text-muted preview-icon" id="icon-2"></i>
                                    <img src="" alt="Preview 2" class="img-thumbnail preview-thumbnail d-none"
                                        id="preview-2">
                                @endif
                                <!-- 入れ替え用の画像ファイル入力 -->
                                <label class="upload-icon">
                                    <input type="file" name="image_sub1" class="image-input d-none"
                                        onchange="previewImage(event, 'preview-2', 'icon-2')">
                                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                </label>
                                <!-- 削除ボタン -->
                                <span class="delete-icon" id="icon-2"
                                    onclick="removeImage('preview-2', 'icon-2', 'image_sub1')">&times;</span><br>
                                <p class="mt-2">sub1</p>
                                @error('image_sub1')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                <!-- 画像削除用の隠し入力 -->
                                <input type="hidden" name="delete_image_sub1" id="delete_image_sub1">
                            </div>

                            <!-- Image sub2 -->
                            <div class="image-preview mb-3">
                                @if ($user->hotel->image_sub2)
                                    <!-- 既存の画像がある場合のプレビュー -->
                                    <img src="{{ $user->hotel->image_sub2 }}" alt="Hotel Image"
                                        class="img-thumbnail preview-thumbnail" id="preview-3">
                                @else
                                    <!-- 新しい画像のアップロード用 -->
                                    <i class="fa-solid fa-image fa-3x text-muted preview-icon" id="icon-3"></i>
                                    <img src="" alt="Preview 3" class="img-thumbnail preview-thumbnail d-none"
                                        id="preview-3">
                                @endif
                                <!-- 入れ替え用の画像ファイル入力 -->
                                <label class="upload-icon">
                                    <input type="file" name="image_sub2" class="image-input d-none"
                                        onchange="previewImage(event, 'preview-3', 'icon-3')">
                                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                </label>
                                <!-- 削除ボタン -->
                                <span class="delete-icon" id="icon-3"
                                    onclick="removeImage('preview-3', 'icon-3', 'image_sub2')">&times;</span><br>
                                <p class="mt-2">sub2</p>
                                @error('image_sub2')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                <!-- 画像削除用の隠し入力 -->
                                <input type="hidden" name="delete_image_sub2" id="delete_image_sub2">
                            </div>

                            <!-- Image sub3 -->
                            <div class="image-preview mb-3">
                                @if ($user->hotel->image_sub3)
                                    <!-- 既存の画像がある場合のプレビュー -->
                                    <img src="{{ $user->hotel->image_sub3 }}" alt="Hotel Image"
                                        class="img-thumbnail preview-thumbnail" id="preview-4">
                                @else
                                    <!-- 新しい画像のアップロード用 -->
                                    <i class="fa-solid fa-image fa-3x text-muted preview-icon" id="icon-4"></i>
                                    <img src="" alt="Preview 4" class="img-thumbnail preview-thumbnail d-none"
                                        id="preview-4">
                                @endif
                                <!-- 入れ替え用の画像ファイル入力 -->
                                <label class="upload-icon">
                                    <input type="file" name="image_sub3" class="image-input d-none"
                                        onchange="previewImage(event, 'preview-4', 'icon-4')">
                                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                </label>
                                <!-- 削除ボタン -->
                                <span class="delete-icon" id="icon-4"
                                    onclick="removeImage('preview-4', 'icon-4', 'image_sub3')">&times;</span><br>
                                <p class="mt-2">sub3</p>
                                @error('image_sub3')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                <!-- 画像削除用の隠し入力 -->
                                <input type="hidden" name="delete_image_sub3" id="delete_image_sub3">
                            </div>

                            <!-- Image sub4 -->
                            <div class="image-preview mb-3">
                                @if ($user->hotel->image_sub4)
                                    <!-- 既存の画像がある場合のプレビュー -->
                                    <img src="{{ $user->hotel->image_sub4 }}" alt="Hotel Image"
                                        class="img-thumbnail preview-thumbnail" id="preview-5">
                                @else
                                    <!-- 新しい画像のアップロード用 -->
                                    <i class="fa-solid fa-image fa-3x text-muted preview-icon" id="icon-5"></i>
                                    <img src="" alt="Preview 5" class="img-thumbnail preview-thumbnail d-none"
                                        id="preview-5">
                                @endif
                                <!-- 入れ替え用の画像ファイル入力 -->
                                <label class="upload-icon">
                                    <input type="file" name="image_sub4" class="image-input d-none"
                                        onchange="previewImage(event, 'preview-5', 'icon-5')">
                                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                                </label>
                                <!-- 削除ボタン -->
                                <span class="delete-icon" id="icon-5"
                                    onclick="removeImage('preview-5', 'icon-5', 'image_sub4')">&times;</span><br>
                                <p class="mt-2">sub4</p>
                                @error('image_sub4')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                <!-- 画像削除用の隠し入力 -->
                                <input type="hidden" name="delete_image_sub4" id="delete_image_sub4">
                            </div>
                        </div>
                    </div>
                    <!-- JavaScript -->
                    <script src="{{ asset('js/addimage_hotel_profile.js') }}"></script>


                    <!-- Hotel Service Section -->
                    <div class="card mt-2 mb-2">
                        <div class="card-header">Service</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <h6>Hotel Service :</h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category_7" name="categories[]"
                                        value="7" @if ($user->hotel->categories->contains(7)) checked @endif>
                                    <label class="form-check-label" for="parking">Parking
                                        availability</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category_8" name="categories[]"
                                        value="8" @if ($user->hotel->categories->contains(8)) checked @endif>
                                    <label class="form8-check-label" for="luggage">Luggage storage
                                        service</label>
                                </div><br>
                                {{-- <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category_9" name="categories[]"
                                        value="9" @if ($user->hotel->categories->contains(9)) checked @endif>
                                    <label class="form-check-label" for="breakfast">Breakfast</label>
                                </div>
                                <div class="price-input d-inline-flex align-items-center">
                                    <span>Price:</span>
                                    <div class="input-group ms-2 w-50">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control w-50" id="breakfast_price"
                                            name="breakfast_price" aria-label="Price"
                                            value="{{ old('breakfast_price', $user->hotel->breakfast_price) }}">
                                    </div>
                                </div> --}}
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category_9" name="categories[]"
                                        value="9" @if ($user->hotel->categories->contains(9)) checked @endif>
                                    <label class="form-check-label" for="category_9">Breakfast</label>
                                </div>
                                <div class="price-input d-inline-flex align-items-center">
                                    <span>Price:</span>
                                    <div class="input-group ms-2 w-50">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control w-50" id="breakfast_price"
                                            name="breakfast_price" aria-label="Price"
                                            value="{{ old('breakfast_price', $user->hotel->breakfast_price) }}" disabled>
                                    </div>
                                </div>
                                @error('breakfast_price')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                                {{-- <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="category_9" name="categories[]"
                                      value="9" @if ($user->hotel->categories->contains(9)) checked @endif>
                                  <label class="form-check-label" for="category_9">Breakfast</label>
                              </div>
                              <div class="price-input d-inline-flex align-items-center">
                                  <span>Price:</span>
                                  <div class="input-group ms-2 w-50">
                                      <span class="input-group-text">$</span>
                                      <input type="number" class="form-control w-50" id="breakfast_price"
                                          name="breakfast_price" aria-label="Price"
                                          value="{{ old('breakfast_price', $user->hotel->breakfast_price) }}" 
                                          @if (!old('categories') || !in_array(9, old('categories', []))) disabled @endif>
                                  </div>
                              </div>
                              
                              <!-- エラーメッセージの表示 -->
                              @error('breakfast_price')
                                  <div class="text-danger small">
                                      {{ $message }}
                                  </div>
                              @enderror --}}

                            </div>
                            <!-- Amenity Section -->
                            <div class="mb-3">
                                <h6>Amenity :</h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category_10" name="categories[]"
                                        value="10" @if ($user->hotel->categories->contains(10)) checked @endif>
                                    <label class="form-check-label" for="wifi">Wi-Fi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category_11" name="categories[]"
                                        value="11" @if ($user->hotel->categories->contains(11)) checked @endif>
                                    <label class="form-check-label" for="aircon">Air conditioning</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category_12" name="categories[]"
                                        value="12" @if ($user->hotel->categories->contains(12)) checked @endif>
                                    <label class="form-check-label" for="tv">TV</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category_13" name="categories[]"
                                        value="13" @if ($user->hotel->categories->contains(13)) checked @endif>
                                    <label class="form-check-label" for="dryer">Dryer</label>
                                </div>
                            </div>

                            <!-- Free Toiletries Section -->
                            <div class="mb-3">
                                <h6>Free Toiletries :</h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category_14" name="categories[]"
                                        value="14" @if ($user->hotel->categories->contains(14)) checked @endif>
                                    <label class="form-check-label" for="shampoo">Shampoo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category_15" name="categories[]"
                                        value="15" @if ($user->hotel->categories->contains(15)) checked @endif>
                                    <label class="form-check-label" for="conditioner">Conditioner</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category_16" name="categories[]"
                                        value="16" @if ($user->hotel->categories->contains(16)) checked @endif>
                                    <label class="form-check-label" for="bodywash">Body wash</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="category_17" name="categories[]"
                                        value="17" @if ($user->hotel->categories->contains(17)) checked @endif>
                                    <label class="form-check-label" for="tooth">Toothbrush&paste</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category Section -->
                    <div class="card mt-2 mb-2">
                        <h5 class="card-header">Category<br>
                            <h6 class="text-center">--- Please select at least one category ---</h6>
                        </h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="category_1"
                                            name="categories[]" value="1" data-type="category"
                                            @if ($user->hotel->categories->contains(1)) checked @endif>
                                        <label class="form-check-label" for="wheelchair">Wheelchair and
                                            Senior-friendly</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="category_4"
                                            name="categories[]" value="4" data-type="category"
                                            @if ($user->hotel->categories->contains(4)) checked @endif>
                                        <label class="form-check-label" for="visual">Visual and Hearing
                                            Impaired-friendly</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="category_2"
                                            name="categories[]" value="2" data-type="category"
                                            @if ($user->hotel->categories->contains(2)) checked @endif>
                                        <label class="form-check-label" for="pregnancy">Pregnancy-friendly</label>
                                    </div><br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="category_5"
                                            name="categories[]" value="5" data-type="category"
                                            @if ($user->hotel->categories->contains(5)) checked @endif>
                                        <label class="form-check-label" for="religious">Religious-friendly</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="category_3"
                                            name="categories[]" value="3" data-type="category"
                                            @if ($user->hotel->categories->contains(3)) checked @endif>
                                        <label class="form-check-label" for="family">Family-friendly</label>
                                    </div><br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="category_6"
                                            name="categories[]" value="6" data-type="category"
                                            @if ($user->hotel->categories->contains(6)) checked @endif>
                                        <label class="form-check-label" for="english">English-friendly</label>
                                    </div>
                                </div>
                                <!-- JavaScript -->
                                <script src={{ asset('js/formValidation_hotel_profile.js') }}></script>
                                <!-- JavaScriptでエラーメッセージを表示 -->
                                <div id="error-message">
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
                    <div class="card mt-2 mb-2">
                        <h5 class="card-header">Cancellation Policy</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="freeCancellation">Free Cancellation Period:</label>
                                    <div class="d-flex align-items-center">
                                        <input type="number" class="form-control me-2 form-width"
                                            id="cancellation_period" name="cancellation_period"
                                            value="{{ old('cancellation_period', $user->hotel->cancellation_period) }}">
                                        <span>days before the reservation date.</span><br>
                                    </div>
                                    @error('cancellation_period')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Cancellation Fee Percentage:</label>
                                    <div class="d-flex align-items-center mt-1">
                                        <span class="me-3">General</span>
                                        <input type="number" class="form-control mx-2 form-width" name="general_fee"
                                            id="general_fee" value="{{ old('general_fee', $user->hotel->general_fee) }}">
                                        <span>%</span><br>
                                    </div>
                                    @error('general_fee')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                    <div class="d-flex align-items-center mt-1">
                                        <span>Same-Day</span>
                                        <input type="number" class="form-control mx-2 form-width" name="sameday_fee"
                                            id="sameday_fee" value="{{ old('sameday_fee', $user->hotel->sameday_fee) }}">
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
    </div>

    </form>
    </div>
@endsection
