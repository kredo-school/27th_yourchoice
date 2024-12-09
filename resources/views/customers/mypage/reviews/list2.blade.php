@extends('layouts.customer_mypage')

@section('content')
<div class="container-fluid">
    <div class="row">
            <h2>Review List</h2>
            <div class="review-list">
                <!-- foreach($reviews as $review) -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ 'hotel_name' }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ 'location' }}</h6>
                            <span class="badge bg-primary">{{ 'accessibility' }}</span>
                            <p class="mt-2">Overall Rating: 
                                <strong>★</strong>
                            </p>
                            <p class="card-text">{{ Str::limit('comments', 100) }} <a href="#">read more</a></p>
                        </div>
                    </div>
                <!-- endforeach -->
                                 <!-- foreach($reviews as $review) -->
                                 <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ 'hotel_name' }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ 'location' }}</h6>
                            <span class="badge bg-primary">{{ 'accessibility' }}</span>
                            <p class="mt-2">Overall Rating: 
                                <strong>★</strong>
                            </p>
                            <p class="card-text">{{ Str::limit('comments', 100) }} <a href="#">read more</a></p>
                        </div>
                    </div>
                <!-- endforeach -->
                                 <!-- foreach($reviews as $review) -->
                                 <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ 'hotel_name' }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ 'location' }}</h6>
                            <span class="badge bg-primary">{{ 'accessibility' }}</span>
                            <p class="mt-2">Overall Rating: 
                                <strong>★</strong>
                            </p>
                            <p class="card-text">{{ Str::limit('comments', 100) }} <a href="#">read more</a></p>
                        </div>
                    </div>
                <!-- endforeach -->
            </div>

            <!-- ページネーション -->
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
</div>
@endsection