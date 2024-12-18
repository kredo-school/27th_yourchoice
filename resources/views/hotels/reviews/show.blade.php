@extends('layouts.hotel')
@section('title', 'Hotel Review Management Show')

<!-- CSSのリンク -->
<link rel="stylesheet" href="{{ asset('css/customer-css.css') }}">

@section('content')

  <!-- Main Content -->
  <div class="col-md-10 p-4">
    <h3 class="fw-bold mb-4">Review Management</h3>

    <!-- Review Card 1 -->
    <div class="container mt-2">
        <div class="card shadow-sm">
            <div class="row g-0 p-3">
                <!-- Image Section -->
                <div class="col-md-3 d-flex justify-content-start align-items-start">
                    <div class="border rounded" style="width: 150px; height: 150px; background-color: #f0f0f0;">
                        <!-- Placeholder for Image -->
                        <img src="#" class="img-fluid rounded" alt="Hotel Image">
                    </div>
                </div>
                <!-- Main Content Section -->
                <div class="col-md-9">
                    <div class="card-body">
                        <div class="row">
                            <!-- Left Column: Hotel Details -->
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between">
                                    <div>    
                                        <h5 class="card-title mb-0">Hotel A</h5>
                                        <p class="text-muted small mb-1">Tokyo</p>
                                        <span class="reviewslist-css">{#category}</span>
                                    </div>
    
                             <!-- Right Section: Content -->
                                    <div class="text-end">
                                        <ul class="list-inline mb-0">
                                            <p>date of stay: {#day}</p>
                                            <p>people : {#people}</p>
                                            <p>type of room : {#room type}</p>
                                        </ul>
                                    </div>  
                                </div>    
                            </div>


                            <!-- Right Column: Rating and Comments -->
                            <div class="col-md-9">
                                <h5 class="fw-bold mb-1">Overall rating</h5>
                                <!-- Star Rating -->
                                <div class="text-warning mb-2">
                                    <!-- 星評価 (5つ星の場合) Ifで個数を表示させる？-->
                                     <div id="star-rating">
                                        <span class="fa fa-star" data-value="1"></span>
                                        <span class="fa fa-star" data-value="2"></span>
                                        <span class="fa fa-star" data-value="3"></span>
                                        <span class="fa fa-star" data-value="4"></span>
                                        <span class="fa fa-star" data-value="5"></span>
                                    </div>
                                    
                                </div>
                                <h5 class="fw-bold mb-1">Comments</h5>
                                <p class="card-text text-muted small">
                                    {#comment}In an increasingly connected world where everyone's opinions are shared with a click, reviews are more powerful than ever. Statistics show that 95% of consumers now read online ...
                                </p>

                                  <!-- 写真エリア -->
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <img src="https://via.placeholder.com/150" class="img-fluid rounded" alt="Photo 1">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="https://via.placeholder.com/150" class="img-fluid rounded" alt="Photo 2">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="https://via.placeholder.com/150" class="img-fluid rounded" alt="Photo 3">
                                    </div>
                                </div>
                               
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center mt-4">
            <li class="page-item disabled"><a class="page-link">← Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">67</a></li>
            <li class="page-item"><a class="page-link" href="#">68</a></li>
            <li class="page-item"><a class="page-link" href="#">Next →</a></li>
        </ul>
    </nav>
    <div class="text-center">
        <button type="button" class="sub-button-disabled">Back</button>
    </div>
</div>
</div>
</div>

@endsection