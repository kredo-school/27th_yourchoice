@extends('layouts.customer')

@section('title', 'Wheelchair and Senior')

@section('content')
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
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filter
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Option 1</a>
                    <a class="dropdown-item" href="#">Option 2</a>
                </div>
            </div>
            <div class="me-3">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Price
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Low to High</a>
                    <a class="dropdown-item" href="#">High to Low</a>
                </div>
            </div>
            <div class="me-3">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <div class="row">
                    <div class="col-md-3">
                        <img src="path/to/hotel-a.jpg" class="img-fluid" alt="Hotel A">
                    </div>
                    <div class="col-md-6">
                        <h5>Hotel A</h5>
                        <p>Tokyo</p>
                        <span class="badge badge-secondary">Family</span>
                    </div>
                    <div class="col-md-3 text-right">
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
                    <div class="col-md-3">
                        <img src="path/to/hotel-b.jpg" class="img-fluid" alt="Hotel B">
                    </div>
                    <div class="col-md-6">
                        <h5>Hotel B</h5>
                        <p>Tokyo</p>
                        <span class="badge badge-secondary">Pregnancy</span>
                    </div>
                    <div class="col-md-3 text-right">
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
                    <div class="col-md-3">
                        <img src="path/to/hotel-c.jpg" class="img-fluid" alt="Hotel C">
                    </div>
                    <div class="col-md-6">
                        <h5>Hotel C</h5>
                        <p>Tokyo</p>
                        <span class="badge badge-secondary">Religious</span>
                    </div>
                    <div class="col-md-3 text-right">
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
    </div>
@endsection

{{-- @push('styles')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .rating .fa-star.checked {
            color: orange;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush --}}