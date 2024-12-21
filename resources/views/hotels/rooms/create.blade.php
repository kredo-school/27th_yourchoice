@extends('layouts.hotel')
@section('title', 'Hotel Admin Rooms Create')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">

    <div class="container mt-2 d-flex justify-content-center">
        <form method="POST" action="{{ route('hotel.room.show') }}" enctype="multipart/form-data">
            @csrf
            @method('GET')

            <div class="row">
                <h1 class="mb-4 ms-3 fw-bold">Add Rooms</h1>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="room_number" class="form-label">Room No.</label>
                                <input type="number" class="form-control" id="room_number" name="room_number"
                                    value="room_number" autofocus>
                            </div>
                            @error('room_number')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="room_type" class="form-label">Room Type</label>
                                <select id="room_type" name="room_type" class="form-control">
                                    <option value="" disabled selected>-- Select Here --</option>
                                    <option value="single">Single Room</option>
                                    <option value="double">Double Room</option>
                                    <option value="twin">Twin Room</option>
                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="room_price" class="form-label">Room Price</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="room_price" name="room_price"
                                        value="room_price">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="capacity" class="form-label">Capacity</label>
                                <input type="number" class="form-control" id="capacity" name="capacity" value="capacity">
                            </div>
                            <div>
                                <label for="room_image" class="form-label">Room Image</label>
                            </div>
                            <div class="image-preview">
                                <label class="position-relative">
                                    <input type="file" name="images[]" class="image-input d-none"
                                        onchange="previewImage(event, #)">
                                    <i class="fa-solid fa-image fa-3x text-muted preview-icon" id="icon-#"></i>
                                    <img src="" alt="Preview" class="img-thumbnail preview-thumbnail d-none"
                                        id="preview-#">
                                    <span class="badge bg-secondary position-absolute top-0 start-0" id="label-#"></span>
                                </label>
                                <span class="delete-icon" onclick="removeImage(#)">&times;</span>
                                <small class="text-muted ms-1">↑ Click here.</small>
                            </div>
                            <div class="mb-3">
                                <label for="room_remarks" class="form-label">Remarks</label>
                                <textarea class="form-control" id="room_remarks" name="room_remarks" value="{{ old('room_remarks') }}"></textarea>
                            </div>

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
