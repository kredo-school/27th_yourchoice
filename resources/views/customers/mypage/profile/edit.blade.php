@extends('layouts.customer_mypage')

<!-- CSSのリンク -->
<link rel="stylesheet" href="{{ asset('css/customer-css.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row">

          <!-- メインコンテンツ -->
          <div class="col-10 p-4">
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
                        <label class="form-label">Email</label>
                        <input type="email" name="costomer-email" id="customer-email" class="form-control" value="#" autofocus>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="birthdate" id="birthdate" class="form-control" value="#" autofocus>
                        </div>
                        <div class="col">
                            <label class="form-label">Nationality</label>
                            <input type="text" name="nationality" id="nationality" class="form-control" value="#" autofocus>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone number</label>
                        <input type="number" name="customer-phone" id="cusomer-phone" class="form-control" value="#" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Passport No.</label>
                        <input type="number" name="passport" id="passport" class="form-control" value="#" autofocus>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Category</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="wheelchair">
                            <label class="form-check-label" for="wheelchair">Wheelchair and Senior-Friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="pregnancy">
                            <label class="form-check-label" for="pregnancy">Pregnancy-friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="family">
                            <label class="form-check-label" for="family">Family-friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="visuallyImpaired">
                            <label class="form-check-label" for="visuallyImpaired">Visually and Hearing Impairment-Friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="religious">
                            <label class="form-check-label" for="religious">Religious-friendly</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="english">
                            <label class="form-check-label" for="english">English-friendly</label>
                        </div>
                    </div>
            
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn col-5 customer-css">Cancel</button>
                        <button type="submit" class="btn col-5 customer-css" >Confirm</button>
                    </div>
                </form>
            </div>



            
    </div>
</div>


@endsection