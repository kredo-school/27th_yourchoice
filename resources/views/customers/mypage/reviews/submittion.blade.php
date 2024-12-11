@extends('layouts.customer_mypage')

<link rel="stylesheet" href="{{ asset('css/style_customers_mypage_reviews_submittion.css') }}">

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card p-5">
                    <div class="review-container">
                        <div class="hotel-info">
                            <div class="hotel-image">
                                <img src="placeholder.png" alt="Hotel Image">
                            </div>
                            <div class="hotel-details">
                                <h2>Hotel A</h2>
                                <p>Tokyo</p>
                                <span class="tag">Wheelchair</span>
                            </div>
                            <div class="stay-details">
                                <p><strong>date of stay:</strong> 2023/11/2 ~ 2024/11/3</p>
                                <p><strong>people:</strong> 2</p>
                                <p><strong>type of room:</strong> twin</p>
                            </div>
                        </div>
                        <div class="review-form">
                                <label for="rating">Overall rating</label>
                            <div class="rating" id="rating">
                                <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                            </div>
                                <label for="comments">Comments</label>
                                <textarea id="comments" rows="4"></textarea>
                                <label for="image-upload">Image file</label>
                                <input type="file" id="image-upload">
                                <button type="submit">Submit review</button>
                        </div>
                    </div>
        
    </div>
</div>
@endsection