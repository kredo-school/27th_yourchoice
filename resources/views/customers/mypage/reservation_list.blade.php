@extends('layouts.customer_mypage')

@section('content')
<link rel="stylesheet" href="{{ asset('css/hotel_search.css') }}">

<div class="container-fluid">
    <div class="row">
            <h2>Reservation List</h2>
                <div class="reservation-list">
                    {{-- @foreach($reservations as $reservation) --}}
                    <div class="card mb-3">
                        <div class="card-body ">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title">{{ 'hotel_name' }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ 'location' }}</h6>
                                        <span class="badge bg-primary">{{ 'accessibility' }}</span>
                                    </div>
                                    <div class="col ">
                                        <p class="mb-1">{{ 'date_of_stay' }}</p>
                                        <p class="mb-0 font-weight-bold">{{ 'status' }}</p>
                                    </div>
                                    <div class="col">
                                        <p class="fs-5 fw-bolder align-bottom" >{{ '$100' }}</p>
                                    </div>
                                    <div class="col-12 mt-2 d-flex justify-content-end">
                                        <a href="{{ route('mypage.reservation_detail.inprogress')}}" class="align-self-end">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                    {{-- @foreach($reservations as $reservation) --}}
                    <div class="card mb-3">
                        <div class="card-body ">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title">{{ 'hotel_name' }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ 'location' }}</h6>
                                        <span class="badge bg-primary">{{ 'accessibility' }}</span>
                                    </div>
                                    <div class="col ">
                                        <p class="mb-1">{{ 'date_of_stay' }}</p>
                                        <p class="mb-0 font-weight-bold">{{ 'status' }}</p>
                                    </div>
                                    <div class="col">
                                        <p class="fs-5 fw-bolder align-bottom" >{{ '$100' }}</p>
                                    </div>
                                    <div class="col-12 mt-2 d-flex justify-content-end">
                                        <a href="{{ route('mypage.reservation_detail.inprogress')}}" class="align-self-end">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                    {{-- @foreach($reservations as $reservation) --}}
                    <div class="card mb-3">
                        <div class="card-body ">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                                    </div>
                                    <div class="col">
                                        <h5 class="card-title">{{ 'hotel_name' }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ 'location' }}</h6>
                                        <span class="badge bg-primary">{{ 'accessibility' }}</span>
                                    </div>
                                    <div class="col ">
                                        <p class="mb-1">{{ 'date_of_stay' }}</p>
                                        <p class="mb-0 font-weight-bold">{{ 'status' }}</p>
                                    </div>
                                    <div class="col">
                                        <p class="fs-5 fw-bolder align-bottom" >{{ '$100' }}</p>
                                    </div>
                                    <div class="col-12  d-flex justify-content-end">
                                        <a href="{{ route('mypage.reservation_detail.inprogress')}}" class="align-self-end">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
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
