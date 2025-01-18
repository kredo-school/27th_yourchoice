@extends('layouts.customer')

@section('content')
<!-- Link the CSS file -->
<link rel="stylesheet" href="{{ asset('css/reservations.css') }}">

<div class="container-fluid">
  <div class="row">                                
    <div class="container-reservations">
      <button  type="submit" class="button1"><a href="#" >Return to the  previous page</button></a>
                      
      <!-- Step 1 -->
      <section class="step">
         <h2><strong><i class="fa-solid fa-user "></i> Step 1: Your Details</strong></h2>
          <!-- {{-- <form class="step1" id="step1" action="/reserved_confirmation" method="POST"> --}} -->
            <form class="step1" id="step1" action="{{ route('customer.reserve.confirmation.book',['hotel_id' => $hotel_id, 'room_id' => $room_id]) }}" method="POST">
            @csrf <!-- LaravelのCSRFトークン -->
            <label for="first-name"><strong>First Name</strong></label>
            <input type="text" id="first-name" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="readonly-input" readonly>
            <!-- {{-- <input type="text" name="first_name" value="{{ $first_name }}" readonly> --}} -->

            <label for="last-name"><strong>Last Name</strong></label>
            <input type="text" id="last-name" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="readonly-input" readonly>

            <label for="contact"><strong> Email Address</strong></label>
            <input type="email" id="contact" name="contact" value="{{ old('email', $user->email) }}"class="readonly-input"  readonly>

            <label for="contact"><strong> Mobile Number</strong></label>
            <input type="tel" id="contact" name="contact" value="{{ old('phone_number', $user->phone_number) }}" class="readonly-input" readonly>
            
          
      </section>

      <!-- Step 2 -->
      <section class="step" id="step2">
        <h2><strong><i class="fa-solid fa-mug-saucer"></i> Step 2: Optional</strong></h2>
          <label class="breakfast" for="breakfast">
            <input type="checkbox" id="breakfast" name="breakfast"  value="1" {{ old('breakfast') ? 'checked' : '' }}>Breakfast</input>
          </label>
      </section>

      <!-- Step 3 -->
      <section class="step" id="step3">
        <h2><strong><i class="fa-regular fa-comment-dots"></i> Step 3: Requests to the Hotel</strong></h2>
          <textarea class="requests" id="requests" name="requests" placeholder="Enter your requests here..."></textarea>
      </section>

      <!-- Step 4: Payment Details -->
      <section class="step" id="step4">
        <h2><strong><i class="fa-solid fa-lock"></i> Step 4. Payment details</strong></h2>
        <section class="step4" id="step4">
          
          <div class="step4">
            <div class="payment-details">
              <p><i class="fa-solid fa-circle-check"></i> We have charge any card fees</p>
              <p> <span class="as">*</span>required fields</p>
                <div class="form-group">
                    <label for="first-name">First Name <span class="as">*</span></label>
                    <input type="text" id="first_name"  name="first_name"required> 
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name <span class="as">*</span></label>
                    <input type="text" id="last_name"  name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="card-number">Card Number <span class="as">*</span></label>
                    <input type="text" id="card_number" name="card_number" required>
                </div>
                <div class="form-group">
                    <label for="expiry-date">Expiry Date <span class="as">*</span></label>
                    <input type="month" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>
                </div>
                <div class="form-group">
                    <label for="security-code">Security Code <span class="as">*</span></label>
                    <input type="password" id="security_code" name="security_code" required>
                </div>
            </div>
          </div>

          <section class="step4"> 
            <div class="payment-methods">
              <h3>We accept the following payment methods</h3>
              <img src="/images/credit-card_american express.png" alt="American Express">
              <img src="/images/credit-card_union pay.png" alt="Union pay">
              <img src="/images/credit-card_diners club.png" alt="Diners club">
              <img src="/images/credit-card_jcb.png" alt="JCB">
              <img src="/images/credit-card_master card.png" alt="Mastercard">
              <img src="/images/credit-card_visa.png" alt="VISA">
            
              <div class="payment-methods2">
                <h3><strong>You can count on us</strong></h3>
                  <ul>
                    <li><span class="checkmark">✔</span> We use secure transmission</li>
                    <li><span class="checkmark">✔</span> We protect your personal information</li>
                </ul>
                <i class="fa-solid fa-user-shield fa-4x"></i>
              </div>           
            </div> <!-- Payment Methods End -->
          </section> <!-- Step4 Section End -->
        </section>
      </section>

      <!-- Step 5: Cancellation Policy -->
      <section class="step">
          
        <div class="cancellation-policy">
          <h2><i class="fa-solid fa-shield-heart"></i> Step5. <span>Cancellation policy</span></h2>
          <div class="policy-box">
              <h2>■Cancellation Policy</h2>
              <div class="policy-details">
                <div class="free-cancellation">
                  <span>Free Cancellation Period :</span>
                    <div class="free-cancellation">
                      <span>Free Cancellation Period :</span><br>
                        <div class="days-box">7</div><br>
                        <span>days before the reservation date.</span>
                    </div>
                    
                  <div class="cancellation-fees">
                      <span>Cancellation Fee Percentage :</span>
                      <div class="fees">
                          <div>General <div class="fee-box">20</div>%</div>
                          <div>Same-Day <div class="fee-box">80</div>%</div>
                          <div>No-Shows <div class="fee-box">100</div>%</div>
                      </div>
                  </div>
                </div>  
              </div>
          </div>
      
          <div class="fully-refundable">
              <span>Fully refundable until <strong>2024-12-02</strong></span>
          </div>
        </div>
      </section>

  <!-- Reservation Details -->
  <section class="step">
    <div class="reservation-container">
      <h1>■Reservation Details</h1>
      <div class="reservation-details">
        <dl>
          <dt>■ Hotel Name</dt>
          <dd>{{ $hotel_name }}</dd>
  
          <dt>■ Room Type</dt>
          <dd>{{ $room_type }}</dd>
  
          <dt>■ Number of people</dt>
          <dd>{{ $travellers }}</dd>
  
          <dt>■ Reservation Date</dt>
          <dd>{{ $formattedCheckInDate}} → {{ $formattedCheckOutDate }}</dd>
          
          <input type="hidden" id="breakfast-checkbox" data-breakfast-price="{{ $breakfast_price }}"> Add Breakfast ($ {{ number_format($breakfast_price, 2) }})
                <input type="hidden" id="base-price" value="{{ number_format($price, 2) }}">
            
                <input type="hidden" id="travellers" name="travellers" value="{{ old('travellers', $travellers ?? '') }}">
                <input type="hidden" id="checkInDate" name="checkInDate" value="{{ old('checkInDate', $checkInDate ?? '') }}">
                <input type="hidden" id="checkOutDate" name="checkOutDate" value="{{ old('checkOutDate', $checkOutDate ?? '') }}">
                <input type="hidden" id="total_price" name="total_price" value="{{ old('total_price', $total_price ?? '') }}">
                <input type="hidden" id="room_id" name="room_id" value="{{ $room_id }}">
                <input type="hidden" id="hotel_id" name="hotel_id" value="{{ $hotel_id }}">

          <dt>■ Price</dt>
          <dd id="total-price">$ {{ number_format($total_price,2) }}</dd>
      </dl>
          <div class="amenities">
              <strong>■ Amenity</strong><br>
              <label><input type="checkbox" checked disabled> Wi-Fi</label>
              <label><input type="checkbox" checked disabled> Air conditioning</label>
              <label><input type="checkbox" checked disabled> TV</label>
              <label><input type="checkbox" checked disabled> Dryer</label>
          </div>
      </div>
  </div>
</div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const breakfastCheckbox = document.getElementById('breakfast');
    const hiddenBreakfastInput = document.getElementById('breakfast-checkbox');
    const basePriceElement = document.getElementById('base-price');
    const totalPriceElement = document.getElementById('total-price');
    // Ensure base price is parsed correctly
    let basePrice = 0;
    if (basePriceElement && basePriceElement.value) {
      basePrice = parseFloat(basePriceElement.value.replace('$', '').replace(',', ''));
    }
    const breakfastPrice = parseFloat(hiddenBreakfastInput.getAttribute('data-breakfast-price'));
    // Sync the hidden input with the main checkbox
    breakfastCheckbox.addEventListener('change', function () {
      hiddenBreakfastInput.value = breakfastCheckbox.checked ? '1' : '0';
      let total = basePrice;
      if (breakfastCheckbox.checked) {
        total += breakfastPrice;
      }
      totalPriceElement.textContent = `$ ${total.toFixed(2)}`;
    });
    // Set initial state
    breakfastCheckbox.checked = hiddenBreakfastInput.value === '1';
    let initialTotal = basePrice;
    if (breakfastCheckbox.checked) {
      initialTotal += breakfastPrice;
    }
    totalPriceElement.textContent = `$ ${initialTotal.toFixed(2)}`;
  });
 </script>


  {{-- </section> --}}

    <!-- Submit Button -->

    <!-- {{-- <form method="POST" action="{{ route('customer.reserve.store') }}">
      @csrf --}} -->
    <button type="submit" class="button2">Book</button>
    
        
  </form>
</div>           
@endsection