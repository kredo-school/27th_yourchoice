@extends('layouts.customer')
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/register_top.css') }}">
@section('content')
{{-- Customer Toppage --}}
<!DOCTYPE html>
<html>
    <main class="choice-section-container">
        <section class="choice-section">
            <h1>Which one are you?</h1>
            <div class="choices">
                <a href="{{route("register.create_customer")}}" class="choice customer">Customer</a>
                <a href="{{route("register.create_hotel")}}" class="choice hotel">Hotel</a>
            </div>
        </section>
    </main>
</html>

@endsection
