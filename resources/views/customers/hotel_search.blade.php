@extends('layouts.customer')

@section('title', 'Wheelchair and Senior')

@section('content')
<link rel="stylesheet" href="{{ asset('css/hotel_search.css') }}">

<div class="container mt-5">
    <h1 class="text-center">Wheelchair and Senior</h1>
    
    <div class="input-group my-4">
        <input type="text" class="form-control" placeholder="Where to?">
        <input type="date" class="form-control">
        <input type="number" class="form-control" placeholder="Travellers">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
    
    <div class="d-flex justify-content-start mb-3">
        <div class="me-3">
            <button class="btn btn-outline-secondary" type="button" aria-haspopup="true" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#advanced-search">
                Filter
            </button>
            @include('customers.modals.advanced_search')
        </div>
        <div class="me-3">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Price
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Low to High</a>
                <a class="dropdown-item" href="#">High to Low</a>
            </div>
        </div>
        <div class="me-3">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Room
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Single</a>
                <a class="dropdown-item" href="#">Double</a>
            </div>
        </div>
    </div>
    
    <div class="list-group">
        <div class="list-group-item">
            <a href="{{ route('customer.top.show') }}" class="stretched-link"></a>
            <div class="row align-items-center">
                <div class="col-md-2">
                    <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                </div>
                <div class="col-md-7">
                    <h5>Hotel A</h5>
                    <p>Tokyo</p>
                    <span class="badge bg-pink">Family</span>
                </div>
                <div class="col-md-3 text-end">
                    <div class="rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        (120)
                    </div>
                    <h6>$100 / 2 travellers</h6>
                    <small>include taxes & fees for 1 night</small>
                </div>
            </div>
        </div>
        <!-- Repeat similar blocks for Hotel B and Hotel C -->
        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                </div>
                <div class="col-md-7">
                    <h5>Hotel B</h5>
                    <p>Tokyo</p>
                    <span class="badge bg-pink">Pregnancy</span>
                </div>
                <div class="col-md-3 text-end">
                    <div class="rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        (60)
                    </div>
                    <h6>$100 / 2 travellers</h6>
                    <small>include taxes & fees for 1 night</small>
                </div>
            </div>
        </div>
        <div class="list-group-item">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="hotel-img">
                </div>
                <div class="col-md-7">
                    <h5>Hotel C</h5>
                    <p>Tokyo</p>
                    <span class="badge bg-pink">Religious</span>
                </div>
                <div class="col-md-3 text-end">
                    <div class="rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        (200)
                    </div>
                    <h6>$100 / 2 travellers</h6>
                    <small>include taxes & fees for 1 night</small>
                </div>
            </div>
        </div>
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
@endsection
