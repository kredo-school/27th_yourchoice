@extends('layouts.customer')
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/register_top.css') }}">
@section('content')
{{-- Customer Toppage --}}
<!DOCTYPE html>
<html lang="en">

    <main>
        <section class="choice-section">
            <h1>Which one are you?</h1>
            <div class="choices">
                <a href="/customer" class="choice customer">Customer</a>
                <a href="/hotel" class="choice hotel">Hotel</a>
            </div>
        </section>
    </main>
</body>
</html>
