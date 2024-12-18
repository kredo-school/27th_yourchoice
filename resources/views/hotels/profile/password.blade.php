@extends('layouts.hotel')
@section('title', 'Hotel Admin Password Setting')
@section('content')

    <!-- CSSのリンク -->
    <link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">
    <div class="container-fluid d-flex justify-content-center mt-5">
        <form action="">
            <div class="row">
                <div class="col">
                    <h2>Password Setting</h2>
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="#" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="#" autofocus>
                    </div>
                </div>
            </div>
            <div class="row mt-4 text-center">
                <div class="col">
                    <a href="{{ route('profile.show') }}" class="text-decoration-none text-dark">
                        <button type="button" class="btn btn-sub2">Cancel</button></a>
                    <button type="button" class="btn btn-main ms-2">Confirm</button>
                </div>
            </div>
        </form>
    </div>
@endsection
