@extends('layouts.customer')

@section('content')
<!-- Link the CSS file -->
<link rel="stylesheet" href="{{ asset('css/reservations.css') }}">

    <!-- Your Details -->
    <div class="container-fluid">
    <section class="step" id="step1">
        <h2 class="step5"><strong>■ Your details</strong></h2>
        <form method="POST" action="{{ route('customer.top.show') }}">
          @csrf
        
            <label class="form-lavel">First Name</label>
            <input type="text" name="first_name" id="first-name" class="form-control readonly-input" value="{{ old('first_name', $user->first_name ?? '') }}" readonly>
            {{-- <input type="text" name="first-name" id="first-name" class="form-control" value="{{ $first_name }}" readonly> --}}
            
            <label class="form-lavel">Last Name</label>
            <input type="text" name="last_name" id="last-name" class="form-control readonly-input" value="{{ old('last_name', $user->last_name ?? '') }}" autofocus readonly>
            
            <label class="form-lavel">Email Address</label>
            <input type="email" name="reservation-email" id="reservation-email" class="form-control readonly-input" value="{{ old('email', $user->email ?? '') }}" autofocus readonly>
                    
            {{-- <input type="email" placeholder="youremail@gmail.com" required> --}}
            
            <label class="form-lavel">Mobile Number</label>
            <input type="text" name="reservation-phone" id="reservation-phone" class="form-control readonly-input" value="{{ old('phone_number', $user->phone_number) }}" readonly>
            {{-- <input type="tel" placeholder="089-4243-4242" required> --}}
        </div>
        </form>
      </section>

      <!-- Step 2 -->
      <section class="step" id="step2">
        <h2 class="step5"><strong>■ Optional</strong></h2>
          <label class="breakfast" for="breakfast">
            <input type="checkbox" id="breakfast" name="breakfast" value="{{ old('breakfast', $user->breakfast) }}"  disabled>Breakfast</input>
          </label>
      </section>

      <!-- Step 3 -->
      <section class="step" id="step3">
        <h2 class="step5"><strong>■ Requests to the Hotel</strong></h2>
          <textarea class="requests" id="requests" name="requests" placeholder="Enter your requests here..." value="{{ old('customer_request', $user->cunstomer_request) }}"   readonly></textarea>
      </section>

   <!-- Payment Details -->
      <section class="step" id="step4">
        <h2 class="step5"><strong>■ Payment details</strong></h2>
        <section class="step4" id="step4">
          
          <div class="step4">
            <div class="payment-details">
              <p><i class="fa-solid fa-circle-check"></i> We have charge any card fees</p>
              <p> <span class="as">*</span>required fields</p>
                <div class="form-group">
                    <label for="first-name">First Name <span class="as">*</span></label>
                    <input type="text" id="first-name" name="first-name" value="{{ old('first_name', $user->first_name) }}" readonly>
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
    
      <!-- Reservation Details -->
  <section class="step">
    <div class="step5">
    <h2><strong>■ Reservation Details</strong></h2>
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
            
    </div>
   <div>

    <strong>■ Amenity</strong><br>
    <label><input type="checkbox" checked disabled> Wi-Fi</label>
    <label><input type="checkbox" checked disabled> Air conditioning</label>
    <label><input type="checkbox" checked disabled> TV</label>
    <label><input type="checkbox" checked disabled> Dryer</label>
   </div>
   </div>
</section>


<!-- Step 5: Cancellation Policy -->
<section class="step">
          
  <div class="cancellation-policy">
    <div class="policy-box">
        <h2 class="step5">■ Cancellation Policy</h2>
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
        

    <!-- Button -->
    <section class="confirmation">
        <button class="confirmation-btn">
            <i class="fa-solid fa-lock"></i> 
            <a href="{{ route('customer.reserve.confirmation') }}" >Reservation confirmation
        </button></a>
    </section>

</div>
@endsection