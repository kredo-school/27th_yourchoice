@extends('layouts.customer')

<!-- CSS -->
<link rel="stylesheet" href="{{ asset('css/topstyle.css') }}">

<!-- Text to Speech：Page Overview ページ概要を説明 -->
@section('attributes')
    <body data-page-description="Welcome to the homepage. Choose your perfect trip.">
@endsection

@section('content')
{{-- Customer Toppage --}}

    <section class="hero">
        <h1>Your Choice</h1>
        <p>Travel for everyone</p>
        <p class="description">This website is a hotel platform designed to cater to diverse needs.</p>
    </section>
    <section class="categories">
        <h2>What category are you looking for?</h2>
        <div class="categories-grid">
            @foreach ([
                'Wheelchair and Senior' => 'wheelchair.png',
                'Pregnancy' => 'pregnancy.png',
                'Family' => 'family.png',
                'Visual and Hearing Impaired' => 'visual-hearing.png',
                'Religious' => 'religious.png',
                'English Friendly' => 'english-friendly.png'
            ] as $category => $image)
                <form action="{{ route('customer.top.display') }}" method="GET" class="category-form">
                    @csrf
                    <input type="hidden" name="topCategory" value="{{ $category }}">
                    <button type="submit" class="category-btn" 
                            data-description="For {{ $category }} .">
                        <img src="{{ asset('images/' . $image) }}" alt="{{ $category }}">
                    </button>
                </form>
            @endforeach
        </div>
    </section>
@endsection

<!-- Text to Speech：call js -->
@push('scripts')
<script src="{{ asset('js/api_text_to_speech.js') }}"></script>
@endpush
