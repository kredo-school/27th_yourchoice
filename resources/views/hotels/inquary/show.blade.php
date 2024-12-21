{{-- Customers Inquary --}}
@extends('layouts.hotel')
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/inquarystyle.css') }}">

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Page</title>
    <link rel="stylesheet" href="chat.css">
    <!-- Font Awesome (For Icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="chat-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Inquiry</h2>
            <div class="inquiry-item">
                <div class="icon">
                    <i class="fa fa-user-gear"></i>
                </div>
                {{--BackEndが始まるまでImage表示  now static-------}}
                <div class="content">
                    <h3>Inquiry Site Administrator</h3>
                    <p>You: Thank you.</p>
                    <span class="date">6/20/2020</span>
                </div>
            </div>

            <div class="inquiry-item">
                <div class="icon">
                    <a href="#" class="category">
                        <img src="{{ asset('images/logo.png') }}" alt="Wheelchair and Senior">
                    </a>
                </div>
                <div class="content">
                    <h3>Hotel A</h3>
                    <p>A Hotel: Yes, we have...</p>
                    <span class="date">8/20/2020</span>
                </div>
            </div>

            <div class="inquiry-item">
                <div class="icon">
                    <a href="#" class="category">
                        <img src="{{ asset('images/logo.png') }}" alt="Wheelchair and Senior">
                    </a>
                </div>
                <div class="content">
                    <h3>Hotel D</h3>
                    <p>You: Thank you.</p>
                    <span class="date">7/20/2020</span>
                </div>
            </div>

            <div class="inquiry-item">
                <div class="icon">
                    <a href="#" class="category">
                        <img src="{{ asset('images/logo.png') }}" alt="Wheelchair and Senior">
                    </a>
                </div>
                <div class="content">
                    <h3>Hotel C</h3>
                    <p>You: Thank you.</p>
                </div>
            </div>
        </div>

        <!-- Main Chat Section -->
        <div class="chat-main">
            <div class="chat-header">
                <h2>Hotel A</h2>
            </div>
            <span class="chat-date">8/20/2020</span>
            <div class="chat-content">
                <!-- Received Message -->
                <div class="message received">
                    <p>Hello 👋<br> 
                    I have questions about the shared areas. Are the restaurant and public bath accessible by wheelchair?</p>
                    <span class="time">11:20 AM</span>
                </div>

                <!-- Sent Message -->
                <div class="message sent">
                    <p>Thank you. Lastly, regarding parking and the entrance, do you have designated parking spaces for wheelchair users? Also, is the entrance covered to provide protection from rain?</p>
                    <span class="time">11:40 AM</span>
                </div>

                <!-- Received Reply -->
                <div class="message received">
                    <p>Yes, we have dedicated parking spaces for wheelchair users located near the hotel entrance. The entrance is equipped with a ramp and a roof to ensure smooth and weather-protected access.</p>
                    <span class="time">11:55 AM</span>
                </div>
            </div>

                {{--BackEndが始まるまでImage表示--ここまで-- --}}
            <!-- Input Box -->
            <div class="chat-input">
                <input type="text" placeholder="Start typing...">
                <button><i class="fa fa-paper-plane"></i></button>
            </div>
        </div>
    </div>
</body>
</html>

@endsection