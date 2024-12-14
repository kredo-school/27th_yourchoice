@extends('layouts.customer')

@section('content')




<!-- Link the CSS file -->
<link rel="stylesheet" href="{{ asset('css/reservations.css') }}">

<div class="container-fluid">
  <div class="row">        
                            
  <div class="container">
    <button  type="submit" class="badge bg-secondary">Return to the  previous page</button>
                            
    <!-- Step 1 -->
    <section class="step" id="step1">
      
      <h2><strong><i class="fa-solid fa-user"></i> Step 1: Your Details</strong></h2>
      <form class="step1">
        <label for="first-name"><strong>First Name</strong></label>
        <input type="text" id="first-name" name="first-name" required>

        <label for="last-name"><strong>Last Name</strong></label>
        <input type="text" id="last-name" name="last-name" required>

        <label for="contact"><strong> Email Address</strong></label>
        <input type="email" id="contact" name="contact" required>

        <label for="contact"><strong> Mobile Number</strong></label>
        <input type="tel" id="contact" name="contact" required>
      </form>
        
    </section>

    <!-- Step 2 -->
    <section class="step" id="step2">
      <h2><strong><i class="fa-solid fa-mug-saucer"></i> Step 2: Optional</strong></h2>
        <label class="breakfast" for="breakfast">
          <input type="checkbox" id="breakfast" name="breakfast">Breakfast</input>
        </label>
    </section>

    <!-- Step 3 -->
    <section class="step" id="step3">
      <h2><strong><i class="fa-regular fa-comment-dots"></i> Step 3: Requests to the Hotel</strong></h2>
      <textarea class="requests" id="requests" name="requests" placeholder="Enter your requests here..."></textarea>
    </section>

    <!-- Step 4: Payment Details -->
    <section class="step" id="step4">
    <h2><i class="fa-solid fa-lock"></i> Step 4. Payment details</h2>
    <section class="step4" id="step4">
      
      <div class="step4">
      <div class="payment-details">
        <p><i class="fa-solid fa-circle-check"></i> We have charge any card fees</p>
        <p> <span class="as">*</span>required fields</p>
          <div class="form-group">
              <label for="first-name">First Name <span class="as">*</span></label>
              <input type="text" id="first-name" required>
          </div>
          <div class="form-group">
              <label for="last-name">Last Name <span class="as">*</span></label>
              <input type="text" id="last-name" required>
          </div>
          <div class="form-group">
              <label for="card-number">Card Number <span class="as">*</span></label>
              <input type="text" id="card-number" required>
          </div>
          <div class="form-group">
              <label for="expiry-date">Expiry Date <span class="as">*</span></label>
              <input type="month" id="expiry-date" placeholder="MM/YY" required>
          </div>
          <div class="form-group">
              <label for="security-code">Security Code <span class="as">*</span></label>
              <input type="password" id="security-code" required>
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
 
  <i class="fa-solid fa-user-shield"></i>
</div> 
  
 
                    
      </div>
  </section>
    </section>
    </section>
  <!-- Step 5: Cancellation Policy -->
  <section class="step">
      <h2><i class="fa-solid fa-shield-heart"></i> Step 5. Cancellation policy</h2>
      <table class="cancellation-policy">
          <thead>
            <th colspan="2">Cancellation policy</th>
              <tr>
                  <th>Free Cancellation Period</th>
                  <th>Cancellation Fee Percentage</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>7 days before the reservation date</td>
                  <td>Genaral   20%</td>
              </tr>
              <tr>
                  <td></td>
                  <td>Same-Day  80%</td>
              </tr>
              <tr>
                  <td></td>
                  <td>No-Shows  100%</td>
              </tr>
            
          </tbody>
        
      </table>

      <br>
      <button type="text" class="button5"><strong>Fully refundable until 2024-12-2</strong></button>
  </section>

  <!-- Reservation Details -->
  <section class="step">
      <h2><i class="fa-solid fa-hotel"></i> Reservation Details</h2>
      <div class="reservation-details">
          <p><strong>Hotel Name:</strong> YOUR CHOICE</p>
          <p><strong>Room Type:</strong> Twin Room</p>
          <p><strong>Number of people:</strong> 2</p>
          <p><strong>Reservation Date:</strong> 9, December, 2024 → 10, December, 2024</p>
          <p><strong>Price:</strong> $150</p>
      </div>

      <p>■Amenity</p>
      <input type="checkbox" name="amenity" id="wi-fi" 
     value="wi-fi">
      <label for="wi-fi">Wi-fi</label>
      <input type="checkbox" name="amenity" id="air" 
     value="air">
      <label for="air">Air conditioning</label>
      <input type="checkbox" name="amenity" id="tv" 
     value="tv">
      <label for="tv">TV</label>
      <input type="checkbox" name="amenity" id="dryer" 
     value="dryer">
      <label for="dryer">Dryer</label>
  </section>

    <!-- Submit Button -->
    <button type="submit">Book</button>
  </div>
            
    </div>
</div>
@endsection