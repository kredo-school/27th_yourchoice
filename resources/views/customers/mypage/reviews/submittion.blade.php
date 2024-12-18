@extends('layouts.customer_mypage')

<link rel="stylesheet" href="{{ asset('css/reviewsubmittion.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card p-5">
                    <div class="review-header">
                        <div class="hotel-image">
                            <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                        </div>
                        <div class="hotel-info">
                            <h4>Hotel A</h4>
                            <p>Tokyo</p>
                            <span class="badge bg-pink">Wheelchair</span>
                        </div>
                        <div class="stay-info text-right">
                            <p><strong>date of stay:</strong> 2023/11/2 ~ 2024/11/3</p>
                            <p><strong>people:</strong> 2</p>
                            <p><strong>type of room:</strong> twin</p>
                        </div>
                    </div>
                    <hr>
                        <div class="review-form">
                                <label for="rating">Overall rating</label>
                            <div class="rating" id="rating">
                                <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                            </div>
                                <label for="comments">Comments</label>
                                <textarea id="comments" rows="4"></textarea>
                                <label for="image-upload">Image file</label>
                                <input type="file" id="image-upload">
                                <button type="submit" class="mainbtn">Submit review</button>
                        </div>
                    </div>
        
    </div>
</div>
@endsection