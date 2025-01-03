@extends('layouts.customer_mypage')

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
                        <div class="col">
                            <label class="form-label">First Name</label>
                            <input type="text" name="first-name" id="first-name" class="form-control" value="#" readonly>
                        </div>
                        <div class="col">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="last-name" id="last-name" class="form-control" value="#" autofocus>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="#" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="costomer-email" id="customer-email" class="form-control" value="#" autofocus>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Phone number</label>
                        <input type="number" name="customer-phone" id="cusomer-phone" class="form-control" value="#" autofocus>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Category</label>
                      
                        <!--into the selected category from edit page-->
            
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('customer.profile.editpass') }}" class="sub-button-outline ">Password Setting</a>
                        <a href="{{ route('customer.profile.edit') }}" class="sub-button-outline ">Edit Profile</a>
                    </div>
                </form>
            </div>



            
    </div>
</div>


@endsection