@extends('layouts.hotel')
@section('title', 'Hotel Admin Password Setting')
@section('content')

    <!-- CSSのリンク -->
    <link rel="stylesheet" href="{{ asset('css/hoteladmin.css') }}">
    <div class="container-fluid">
        <div class="row justify-content-center">

            <!-- メインコンテンツ -->
            <div class="col-4 p-4">
                <!-- プロファイル情報 -->
                <div class="profile-section mb-4">
                    <h2>Password Setting</h2>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="password" id="password" class="form-control" value="#"
                                autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password" id="password" class="form-control" value="#"
                                autofocus>
                        </div>

                        <div class="row mt-4 text-center">
                            <div class="col">
                                <a href="{{ route('profile.show') }}" class="text-decoration-none text-dark">
                                    <button type="button" class="btn btn-sub2">Cancel</button></a>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn btn-main">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>


    @endsection
