@extends('layouts.customer_mypage')

@section('title', 'Profile')

<!-- CSSのリンク -->
<link rel="stylesheet" href="{{ asset('css/customer-css.css') }}">

<!-- Text to Speech：Page Overview ページ概要を説明 -->
@section('attributes')
    <body data-page-description="This is your profile page.">
@endsection

@section('content')
<div class="container-fluid">
    <form method="GET" action="{{ route('customer.profile.edit') }}" enctype="multipart/form-data">
        {{-- @csrf --}}
        {{-- @method('GET') --}}
    <div class="row">

          <!-- メインコンテンツ -->
          <div class="col-8 p-4">
            <!-- プロファイル情報 -->
            <div class="profile-section mb-4">
                <h2>Profile</h2>
                <form>
                    <div class="row mb-3">
                     <div class="col">
                            <label class="form-label">First Name</label>
                            <p class="text-decoration-none profile_text">{{ $user->first_name }}</p>         
                        </div>
                        <div class="col">
                            <label class="form-label">Last Name</label>
                            <p class="text-decoration-none profile_text">{{ $user->last_name }}</p>         
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <p class="text-decoration-none profile_text">{{ $user->username }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <p class="text-decoration-none profile_text">{{ $user->email }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <p class="text-decoration-none profile_text">{{ $user->phone_number }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Category</label>
                        @csrf
                            @forelse ($categories as $category)
                                <p class="category-item reviewslist-css m-1">
                                    {{ $category->name }}
                                </s>
                            @empty
                                <div class="badge bg-dark text-wrap">Uncategorized</div>
                            @endforelse
                           
                    </div>
            
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('customer.profile.editpass') }}" class="sub-button-outline " data-description="Password Setting">Password Setting</a>
                        <a href="{{ route('customer.profile.edit') }}" class="sub-button-outline " data-description="Edit Profile">Edit Profile</a>
                    </div>
                </form>
            </div>



            
    </div>
</div>

@endsection

<!-- Text to Speech：call js -->
@push('scripts')
<script src="{{ asset('js/api_text_to_speech.js') }}"></script>
@endpush