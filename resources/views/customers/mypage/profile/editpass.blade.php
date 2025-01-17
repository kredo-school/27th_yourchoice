@extends('layouts.customer_mypage')
@section('title', 'Hotel Admin Password Setting')
@section('content')

    <!-- CSSのリンク -->
    <link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">
    <div class="container-fluid d-flex justify-content-center mt-5">
        <form method="POST" action="{{ route('customer.profile.updatepass') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <h2>Password Setting</h2>
                    
                    <!-- パスワードフィールド -->
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" name="password" id="password" class="form-control" required autofocus>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- 確認用パスワードフィールド -->
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        @error('password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row mt-4 text-center">
                <div class="col">
                    <a href="{{ route('customer.profile.show') }}" class="text-decoration-none text-dark">
                        <button type="button" class="btn btn-sub2">Cancel</button>
                    </a>
                    <button type="submit" class="btn btn-main ms-2">Confirm</button>
                </div>
            </div>
        </form>
    </div>

    
@endsection
