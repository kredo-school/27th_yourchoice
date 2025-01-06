@extends('layouts.customer_mypage')

@section('title', 'Profile')

<!-- CSSのリンク -->
<link rel="stylesheet" href="{{ asset('css/customer-css.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row">

          <!-- メインコンテンツ -->
          <div class="col-8 p-4">
            <!-- プロファイル情報 -->
            <div class="profile-section mb-4">
                <h2>Profile</h2>
                <form>
                    <div class="row mb-3">
                       {{-- @foreach ($user->user as $user)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <a href="{{ route('customer.profile.show', $profile->id) }}">
                                    <img src="{{ $profile->first_name }}" alt="first_name {{ $profile->first_name }}" class="first_name">
                                </a>
                            </div>
                        @endforeach --}}


                        <div class="col">
                            <label class="form-label">First Name</label>
                            <a href="{{ route('register.create') }}" class="text-decoration-none text-dark">
                                {{-- $post->user->first_name --}}
                            </a>
                        </div>
                        <div class="col">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" autofocus>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" autofocus>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="number" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}" autofocus>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Category</label>
                            {{-- @forelse ($post->UserCategory as $category)
                                <span class="reviewslist-css">
                                    {{ $category->name }}
                                </span>
                            @empty
                                <div class="badge bg-dark text-wrap">Uncategorized</div>
                            @endforelse --}}
                    </div>
            
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('customer.profile.editpass') }}" class="sub-button-outline ">Password Setting</a>
                        <a href="{{ route('customer.profile.edit') }}" class="sub-button-outline ">Edit Profile</a>
                    </div>
                </form>
            </div>



            
    </div>
</div>

@endsection