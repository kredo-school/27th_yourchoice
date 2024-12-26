<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation Page</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
   <!-- Right Side Of Navbar -->
   <ul class="navbar-nav ms-auto">
    <!-- Authentication Links -->
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
    
</ul>

<h6 class="card-subtitle mb-2 text-muted">location</h6>
                            <span class="badge bg-primary">Return to the  previous page</span>
                            
  <div class="container">
    <!-- Step 1 -->
    <div class="step" id="step1">
      <h2>Step 1: Your Details</h2>
      <form>
        <label for="first-name">First Name</label>
        <input type="text" id="first-name" name="first-name" required>

        <label for="last-name">Last Name</label>
        <input type="text" id="last-name" name="last-name" required>

        <label for="contact">Contact</label>
        <input type="text" id="contact" name="contact" required>
      </form>
    </div>

    <!-- Step 2 -->
    <div class="step" id="step2">
      <h2>Step 2: Optional</h2>
      <label for="breakfast">
        <input type="checkbox" id="breakfast" name="breakfast">
        Breakfast
      </label>
    </div>

    <!-- Step 3 -->
    <div class="step" id="step3">
      <h2>Step 3: Requests to the Hotel</h2>
      <textarea id="requests" name="requests" placeholder="Enter your requests here..."></textarea>
    </div>

    <!-- Step 4 -->
    <div class="step" id="step4">
      <h2>Step 4: Payment Details</h2>
      <form>
        <label for="card-name">Card Name</label>
        <input type="text" id="card-name" name="card-name" required>

        <label for="card-number">Card Number</label>
        <input type="text" id="card-number" name="card-number" required>

        <label for="expiry-date">Expiry Date</label>
        <input type="month" id="expiry-date" name="expiry-date" required>

        <label for="security-code">Security Code</label>
        <input type="text" id="security-code" name="security-code" required>
      </form>
    </div>

    <!-- Step 5 -->
    <div class="step" id="step5">
      <h2>Step 5: Cancellation Policy</h2>
      <table>
        <thead>
          <tr>
            <th>Key</th>
            <th>Policy</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Fully refundable until...</td>
            <td>100%</td>
          </tr>
          <!-- Add more rows as needed -->
        </tbody>
      </table>
    </div>

    <!-- Reservation Details -->
    <div class="reservation-details">
      <h2>Reservation Details</h2>
      <p><strong>Hotel Name:</strong> Example Hotel</p>
      <p><strong>Stay Dates:</strong> 12/12/2024 - 14/12/2024</p>
      <p><strong>Guests:</strong> 2 adults</p>
      <p><strong>Total Price:</strong> $300</p>
    </div>

    <!-- Submit Button -->
    <button type="submit">Book</button>
  </div>
</body>
</html>
