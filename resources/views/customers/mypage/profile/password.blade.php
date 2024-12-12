@extends('layouts.customer_mypage')

<!-- CSSのリンク -->
<link rel="stylesheet" href="{{ asset('css/customer-css.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row">

          <!-- メインコンテンツ -->
          <div class="col-6 p-4">
            <!-- プロファイル情報 -->
            <div class="profile-section mb-4">
                <h2>Password Setting</h2>
                <form>
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="#" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password" id="password" class="form-control" value="#" autofocus>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <button type="button" class="sub-button-disabled " >Cancel</button>
                        <button type="submit" class="customer-css-mainbutton" >Confirm</button>
                    </div>
                </form>
            </div>
          
    </div>
</div>


@endsection