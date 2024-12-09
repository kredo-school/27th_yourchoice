<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Admin Profile</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="title">Hotel Admin Profile</h1>
        <div class="profile-grid">
            <!-- Basic Section -->
            <div class="section basic">
                <h2>Basic</h2>
                <form>
                    <label for="hotel_name">Hotel Name</label>
                    <input type="text" id="hotel_name" name="hotel_name" value="yourchoice">
                    
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="yourchoice@gmail.com">

                    <label for="website_url">Website URL</label>
                    <input type="url" id="website_url" name="website_url" value="https://www.yourchoice.com">

                    <label for="postal_code">Postal Code</label>
                    <input type="text" id="postal_code" name="postal_code" value="000-0000">

                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" value="0-000-0, City, Region/State">

                    <label for="phone_number">Phone Number</label>
                    <input type="tel" id="phone_number" name="phone_number" value="000-000-0000">

                    <label for="directions">Directions to Access</label>
                    <textarea id="directions" name="directions">10 minutes from ○○ Station on foot</textarea>

                    <label for="attractions">Attractions of the Hotel</label>
                    <textarea id="attractions" name="attractions">Peaceful Environment, Quiet surroundings for relaxation and rest</textarea>
                </form>
            </div>

            <!-- Facility & Service Section -->
            <div class="section facility-service">
                <h2>Facility & Service</h2>
                <form>
                    <label for="services">Hotel Service</label>
                    <textarea id="services" name="services">Parking availability, Luggage storage service, Breakfast $20</textarea>

                    <label for="amenities">Amenity</label>
                    <textarea id="amenities" name="amenities">WiFi, Air conditioning, TV, Dryer</textarea>

                    <label for="free_toiletries">Free Toiletries</label>
                    <textarea id="free_toiletries" name="free_toiletries">Shampoo, Conditioner, Body wash, Toothbrush, Toothpaste</textarea>
                </form>
            </div>

            <!-- Category Section -->
            <div class="section category">
                <h2>Category</h2>
                <button class="category-btn">Wheelchair and Senior</button>
            </div>

            <!-- Cancellation Policy Section -->
            <div class="section cancellation-policy">
                <h2>Cancellation Policy</h2>
                <form>
                    <label for="free_cancellation_period">Free Cancellation Period</label>
                    <input type="number" id="free_cancellation_period" name="free_cancellation_period" value="7"> days before reservation date.

                    <label for="cancellation_fee">Cancellation Fee Percentage</label>
                    <ul>
                        <li>General: 20%</li>
                        <li>Same-Day: 80%</li>
                        <li>No-Shows: 100%</li>
                    </ul>
                </form>
            </div>

            <!-- Remarks Section -->
            <div class="section remarks">
                <h2>Remarks</h2>
                <textarea id="remarks" name="remarks"></textarea>
            </div>
        </div>

        <div class="buttons">
            <button class="password-btn">Password Setting</button>
            <button class="edit-btn">Edit</button>
        </div>
    </div>
</body>
</html>
