@extends('layouts.customer')

@section('content')
<!-- Link the CSS file -->
<link rel="stylesheet" href="{{ asset('css/reservations.css') }}">

<div class="container-fluid">
  <div class="row">                                
    <div class="container-reservations">
      <button  type="submit" class="button1"><a href="#" >Return to the  previous page</button></a>
                      
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
        <h2><strong><i class="fa-solid fa-lock"></i> Step 4. Payment details</strong></h2>
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
          <dd>YOUR CHOICE</dd>
  
          <dt>■ Room Type</dt>
          <dd>Twin Room</dd>
  
          <dt>■ Number of people</dt>
          <dd>2</dd>
  
          <dt>■ Reservation Date</dt>
          <dd>9, December, 2024 → 10, December, 2024</dd>
  
          <dt>■ Price</dt>
          <dd>$ 150</dd>
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
</div>
  
  </section>

    <!-- Submit Button -->
    <button type="submit" class="button2"><a href="{{ route('customer.reserve.show') }}">Book</button></a>
    
        
  
            
@endsection