@extends('layouts.hotel')
@section('title', 'Hotel Admin Rooms Create')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">
    {{-- Editpageはvalue={{old}}置いておけばOK　新規登録の場合は空欄になる --}}
    <div class="container mt-2 d-flex justify-content-center">
        <form method="POST" action="{{ route('rooms.create') }}" enctype="multipart/form-data">
            @csrf
            @method('GET')

            <div class="row">
                <!-- Left Side (Basic Information) -->
                <h1 class="mb-4 ms-3 fw-bold">Add Rooms</h1>
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="room_number" class="form-label">Room No.</label>
                                <input type="number" class="form-control" id="room_number" name="room_number"
                                    value="{{ old('room_number') }}" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="room_type" class="form-label">Room Type</label>
                                <input type="text" class="form-control" id="room_type" name="room_type"
                                    value="{{ old('room_type') }}">
                            </div>
                            <div class="mb-3">
                                <label for="room_price" class="form-label">Room Price</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="room_price" name="room_price"
                                        value="{{ old('room_price') }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="capacity" class="form-label">Capacity</label>
                                <input type="number" class="form-control" id="capacity" name="capacity"
                                    value="{{ old('capacity') }}">
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
                                <label for="room_remerks" class="form-label">Remarks</label>
                                <input type="text" class="form-control" id="room_remerks" name="room_remerks"
                                    value="{{ old('room_remerks') }}">
                            </div>

                            <!-- Buttons -->
                            <div class="row mt-4 mb-2">
                                <div class="col">
                                    <a href="{{ route('rooms.show') }}" class="text-decoration-none text-dark">
                                        <button type="button" class="btn btn-sub2 w-100">Cancel</button></a>
                                </div>
                                <div class="col ms-auto"> <button type="submit" class="btn btn-main w-100">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
@endsection
