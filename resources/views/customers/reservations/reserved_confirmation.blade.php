<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>

@extends('layouts.customer')

<!-- Text to Speech：Page Overview ページ概要を説明 -->
@section('attributes')
    <body data-page-description="Your reservation is complete!">
@endsection

@section('content')

<!-- Link the CSS file -->
<link rel="stylesheet" href="{{ asset('css/reservations.css') }}">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Complete</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <!-- Main Content -->
    <main class="reservation-complete">
        <div class="card">
            <div class="icon">
                <span>&#10004;</span> <!-- チェックマークアイコン -->
            </div>
            <h2><strong> Thank you for your reservation!</strong></h2>
            <p>Your reservation has been completed.<br>Please check your reservation details.</p>
            {{-- <p><strong>reservation number : <span class="reservation-number">ABC12345678</span></strong></p> --}}
            <button class="check-button" data-description="check your reservation."><a href="{{ route('customer.reservation.reservationlist') }}" >check your reservation</button></a>
        </div>
    </main>
</body>
</html>

<!-- Text to Speech：call js -->
@push('scripts')
<script src="{{ asset('js/api_text_to_speech.js') }}"></script>
@endpush
