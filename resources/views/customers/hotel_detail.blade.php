@extends('layouts.customer')

@section('title', 'Hotel Detail')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Large Image -->
        <div class="col-md-6">
            <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="img-fluid large-img">
        </div>
        <!-- Small Images -->
        <div class="col-md-6">
            <div class="row">
                <div class="col-6 col-md-6 pb-2">
                    <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="img-fluid small-img">
                </div>
                <div class="col-6 col-md-6 pb-2">
                    <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="img-fluid small-img">
                </div>
                <div class="col-6 col-md-6 pb-2">
                    <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="img-fluid small-img">
                </div>
                <div class="col-6 col-md-6 pb-2">
                    <img src="{{ asset('images/hotel.jpg') }}" alt="hotel-img" class="img-fluid small-img">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h1 class="mt-3">Hotel A</h1>
            <span class="badge badge-primary">Family</span>
            <p class="mt-3">About</p>
            <p>Hotel A offers modern and comfortable accommodations conveniently located within a 5-minute walk from Shibatachi Station and Shiba Park. This hotel is ideal for both business and leisure travelers, providing easy access to local attractions, restaurants, and parks. Our rooms are equipped with all the amenities you need for a pleasant stay, including free Wi-Fi, air conditioning, a flat-screen TV, and a private bathroom with complimentary toiletries. Enjoy our on-site restaurant, fitness center, and 24-hour front desk service.</p>
            <p>Access</p>
            <p>From Shibatachi Station, it takes approximately 5 minutes to walk to Hotel A. The hotel is also within a 10-minute drive from Tokyo Tower and 20 minutes from Haneda Airport by car. Nearby attractions include the beautiful Shiba Park, the historic Zojoji Temple, and the bustling Roppongi area. Shiba Park offers a peaceful retreat in the heart of Tokyo, while Roppongi is known for its vibrant nightlife and diverse dining options.</p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Exceptional 43 reviews</h5>
                    <div class="d-flex align-items-center">
                        <span class="badge badge-success mr-2">10</span>
                        <div>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                        </div>
                    </div>
                    <p class="mt-3">"素晴らしい滞在でした。Booking.comでの宿泊のレビューが信頼できます。"</p>
                    <p>— User Name</p>
                    <div class="mt-4">
                        <h6>Explore the area</h6>
                        <p>Blackheath, NSW</p>
                        <a href="#">View map</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="mt-5">
        <div class="d-flex justify-content-start mb-3">
            <div class="dropdown me-3">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filter
                </button>
                <div class="dropdown-menu" aria-labelledby="filterDropdown">
                    <a class="dropdown-item" href="#">Option 1</a>
                    <a class="dropdown-item" href="#">Option 2</a>
                </div>
            </div>
            <div class="dropdown me-3">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="priceDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Price
                </button>
                <div class="dropdown-menu" aria-labelledby="priceDropdown">
                    <a class="dropdown-item" href="#">Low to High</a>
                    <a class="dropdown-item" href="#">High to Low</a>
                </div>
            </div>
            <div class="dropdown me-3">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="roomDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Room
                </button>
                <div class="dropdown-menu" aria-labelledby="roomDropdown">
                    <a class="dropdown-item" href="#">Single</a>
                    <a class="dropdown-item" href="#">Double</a>
                </div>
            </div>
        </div>
        <div class="list-group">
            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <img src="{{ asset('images/hotel-room.jpg') }}" alt="hotel-room" class="hotel-room img-fluid">
                    </div>
                    <div class="col-md-7">
                        <h5>Single Room</h5>
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-check"></i> Shampoo</li>
                            <li class="list-inline-item"><i class="fa fa-check"></i> Conditioner</li>
                            <li class="list-inline-item"><i class="fa fa-check"></i> Body wash</li>
                            <li class="list-inline-item"><i class="fa fa-check"></i> Toothbrush</li>
                            <li class="list-inline-item"><i class="fa fa-check"></i> Toothpaste</li>
                        </ul>
                    </div>
                    <div class="col-md-3 text-end">
                        <h6>$100 / 2 travellers</h6>
                        <small>include taxes & fees for 1 night</small>
                        <button class="btn btn-danger mt-2">Book now</button>
                    </div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <img src="{{ asset('images/hotel-room.jpg') }}" alt="hotel-room" class="hotel-room img-fluid">
                    </div>
                    <div class="col-md-7">
                        <h5>Double Room</h5>
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-check"></i> Shampoo</li>
                            <li class="list-inline-item"><i class="fa fa-check"></i> Conditioner</li>
                            <li class="list-inline-item"><i class="fa fa-check"></i> Body wash</li>
                            <li class="list-inline-item"><i class="fa fa-check"></i> Toothbrush</li>
                            <li class="list-inline-item"><i class="fa fa-check"></i> Toothpaste</li>
                        </ul>
                    </div>
                    <div class="col-md-3 text-end">
                        <h6>$100 / 2 travellers</h6>
                        <small>include taxes & fees for 1 night</small>
                        <button class="btn btn-danger mt-2">Book now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection