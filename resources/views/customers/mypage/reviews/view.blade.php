@extends('layouts.customer_mypage')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card p-5">
                    <div class="review-card">
                    <div class="review-header d-flex justify-content-between align-items-center">
                        <div class="hotel-info">
                            <h4>Hotel A</h4>
                            <p>Tokyo</p>
                            <span class="badge badge-pill badge-light text-danger">Wheelchair</span>
                        </div>
                        <div class="stay-info text-right">
                            <p><strong>date of stay:</strong> 2023/11/2 ~ 2024/11/3</p>
                            <p><strong>people:</strong> 2</p>
                            <p><strong>type of room:</strong> twin</p>
                        </div>
                    </div>
                    <hr>
                    <div class="review-body">
                        <h5>Overall rating</h5>
                        <p class="rating">
                            ★★★★☆
                        </p>
                        <h5>Comments</h5>
                        <p>
                            In an increasingly connected world where everyone’s opinions are shared with a click, reviews are more powerful than ever. Statistics show that 95% of consumers now read online reviews, and as many as 88% trust them as much as personal recommendations.
                        </p>
                        <p>
                            Yet, acquiring these gold nuggets of advocacy can often feel as daunting as striking gold. So how do you motivate your customers to share their fantastic experiences and pen them into persuasive, positive reviews?
                        </p>
                        <p>
                            In this article, we’ll show you real-life examples of positive customer reviews. These review examples not only laud excellent customer experiences but are powerful tools that boost your online reputation and catalyze business success.
                        </p>
                    </div>
                    <div class="review-images d-flex mt-4">
                        <div class="image-placeholder"></div>
                        <div class="image-placeholder"></div>
                        <div class="image-placeholder"></div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection