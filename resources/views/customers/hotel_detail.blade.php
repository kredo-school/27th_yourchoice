@extends('layouts.customer')

@section('title', 'Hotel Detail')

@section('content')
<link rel="stylesheet" href="{{ asset('css/hotel_search.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">


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
                    </div>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="input-group my-4 w-50">
        <input type="date" class="form-control">
        <input type="number" class="form-control" placeholder="Travellers">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">
                <i class="fa fa-search"></i>
            </button>
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
                    <a href="{{ route('customer.reserve.edit') }}" class="btn btn-danger mt-2">Book now</a>
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
                    <a href="{{ route('customer.reserve.edit') }}" class="btn btn-danger mt-2">Book now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
      key: "AIzaSyAQ1u-pft-pLmlVb5TYcprtivdXXNkjfDk",
      v: "weekly",
      // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
      // Add other bootstrap parameters as needed, using camel case.
    });
</script>

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>

@endsection
