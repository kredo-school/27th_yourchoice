@extends('layouts.hotel')
@section('title', 'Hotel Admin Rooms Create')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">

    <div class="container mt-2 d-flex justify-content-center">
        <form method="POST" action="{{ route('hotel.room.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="row">
                <h1 class="mb-4 ms-3 fw-bold">Add Rooms</h1>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="room_number" class="form-label">Room No.</label>
                                <input type="number" class="form-control" id="room_number" name="room_number"
                                    value="room_number" autofocus required>
                            </div>
                            @error('room_number')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="room_type" class="form-label">Room Type</label>
                                <input type="room_type" class="form-control" id="room_type" name="room_type" required>
                            </div>
                            @error('room_type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <div class="mb-3">
                                <label for="room_price" class="form-label">Room Price</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="room_price" name="room_price"
                                        value="room_price" required>
                                </div>
                            </div>
                            @error('room_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror


                            <div class="mb-3">
                                <label for="capacity" class="form-label">Capacity</label>
                                <input type="number" class="form-control" id="capacity" name="capacity" value="capacity" required>
                            </div>
                            @error('capacity')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror


                            <div>
                                <div class="mb-3">
                                    <label for="room_image" class="form-label">Room Image</label>
                                </div>
                                <div class="image-preview mb-3">
                                    <label class="position-relative">
                                        <!-- File input -->
                                        <input type="file" name="image" class="image-input d-none"
                                            onchange="previewImage(event, 'preview-1', 'icon-1', 'label-1')">
                                        <!-- Icon for image preview -->
                                        <i class="fa-solid fa-image fa-3x text-muted preview-icon" id="icon-1"></i>
                                        <!-- Image preview -->
                                        <img src="" alt="Preview" class="img-thumbnail preview-thumbnail d-none" id="preview-1">
                                        <!-- Badge label -->
                                        <span class="badge bg-secondary position-absolute top-0 start-0" id="label-1"></span>
                                    </label>
                                </div>
                                    <script src="{{ asset('js/addimage.js') }}"></script>
                                <!-- <small class="text-muted ms-1">↑ Click here.</small> -->
                            </div>
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror


                            <div class="mb-3">
                                <label for="room_remarks" class="form-label">Remarks</label>
                                <textarea class="form-control" id="room_remarks" name="room_remarks"></textarea>
                            </div>
                            @error('room_remarks')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <!-- Buttons -->
                            <div class="row mt-4 mb-2 text-center">
                                <div class="col d-flex justify-content-center gap-2">
                                    <a href="{{ route('hotel.room.show') }}" class="text-decoration-none text-dark">
                                        <button type="button" class="btn btn-sub2">Cancel</button></a>
                                    <button type="submit" class="btn btn-main ms-2">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
