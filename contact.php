











<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us | Ironing Service</title>

    <?php include 'link.php'; ?>


</head>


<body>


    <?php include 'nav.php'; ?>


  <section class="contact_header_wrapper">
    <div class="contact_header_container">
            <img src="./images/istriwalla_logo.png"  alt="Iron Icon" class="contact_header_icon">
      <h1 class="contact_header_heading">Contact Us</h1>
      <p class="contact_header_description">
        Get in touch with us for the best ironing service in Bangalore. We’re here to make your life easier with our doorstep clothing care solutions.
      </p>
      <!-- <button class="contact_header_btn">Book Steam Iron Service</button> -->


      <?php if (isset($_SESSION['user_id'])): ?>
      <button class="btn book_now me-2" onclick="openBookingModal()">Book Steam Iron Service </button>
<?php else: ?>
  <button class="contact_header_btn"
      onclick="alert('Please login first to book a service.'); window.location.href='login.php';">
      Book Steam Iron Service
  </button>
<?php endif; ?>


    </div>
  </section>








  <!-- ==== CONTACT SECTION HTML CODE (START) ==== -->

  <section class="contact_icons_sec">
    <!-- Phone -->
    <div class="contact-card  animate-from-top">
     <i class="fa-solid fa-square-phone"></i>
      <div class="contact-title">Phone</div>
      <div class="contact-detail"><i class="fa-solid fa-phone"  style="    font-size: 19px;
    display: inline-block;"></i> +91 8861919004</div>
      <!-- <div class="contact-detail"><i class="fa-solid fa-phone-volume"  style="    font-size: 19px;
    display: inline-block;"></i> +91 98765 43211</div> -->
      <div class="contact-subtext">Call us for immediate assistance</div>
    </div>

    <!-- Email -->
    <div class="contact-card  animate-from-top">
      <i class="fas fa-envelope-open-text"></i>
      <div class="contact-title">Email</div>
      <div class="contact-detail">info@istriwalla.in</div>
      <div class="contact-detail">support@istriwalla.in</div>
      <div class="contact-subtext">Send us your queries anytime</div>
    </div>

    <!-- Service Area -->
    <div class="contact-card  animate-from-top"  id="service_area">
      <i class="fas fa-map-marker-alt"></i>
      <div class="contact-title">Service Area</div>
      <div class="contact-detail">Bangalore, Karnataka</div>
      <div class="contact-subtext">We serve all areas within Bangalore</div>
    </div>

    <!-- Working Hours -->
    <div class="contact-card  animate-from-top"  id="turnaround">
      <i class="fas fa-clock"></i>
      <div class="contact-title">Working Hours</div>
      <div class="contact-detail">Mon - Sat: 8:00 AM – 8:00 PM</div>
      <div class="contact-detail">Sunday: 9:00 AM – 6:00 PM</div>
      <div class="contact-subtext">We're here when you need us</div>
    </div>
  </section>









  
<!-- contact.php -->
<section class="contact_section">
  <div class="contact_wrapper">
    <h2 class="contact_title">Send us a Message</h2>
    <p class="contact_subtitle">Fill out the form below and we'll get back to you as soon as possible.</p>

    <?php if (isset($_GET['success'])): ?>
      <p style="color: green;">Message sent successfully!</p>
    <?php elseif (isset($_GET['error'])): ?>
      <p style="color: red;">Something went wrong. Please try again.</p>
    <?php endif; ?>

    <form class="contact_form" action="contact_insert.php" method="POST">
      <div class="contact_row">
        <div class="contact_group">
          <label for="contact_first_name" class="contact_label">First Name</label>
          <input type="text" name="first_name" id="contact_first_name" placeholder="Enter your first name" class="contact_input" required />
        </div>
        <div class="contact_group">
          <label for="contact_last_name" class="contact_label">Last Name</label>
          <input type="text" name="last_name" id="contact_last_name" placeholder="Enter your last name" class="contact_input" required />
        </div>
      </div>

      <div class="contact_group">
        <label for="contact_email" class="contact_label">Email</label>
        <input type="email" name="email" id="contact_email" placeholder="Enter your Email" class="contact_input" required />
      </div>

      <div class="contact_group">
        <label for="contact_phone" class="contact_label">Phone Number</label>
        <input type="tel" name="phone" id="contact_phone" placeholder="Enter your Phone Number" class="contact_input" required />
      </div>

      <div class="contact_group">
        <label for="contact_area" class="contact_label">Area</label>
        <input type="text" name="area" id="contact_area" placeholder="Enter your Area in Bangalore" class="contact_input" required />
      </div>

      <div class="contact_group">
        <label for="contact_message" class="contact_label">Message</label>
        <textarea name="message" id="contact_message" rows="4" placeholder="Tell us about your ironing needs or any questions you have..." class="contact_input" required></textarea>
      </div>

      <button type="submit" class="contact_button">Send Message</button>
    </form>
  </div>
</section>




    <!-- ==== CONTACT SECTION HTML CODE (END) ==== -->




    <!-- Booking Modal -->
<div class="booking_modal" id="bookingModal" style="display: none;">
    <div class="booking_form_container">
        <button class="close_modal" onclick="closeBookingModal()">&times;</button>
        <h3 class="text-center mb-5">Place Your Order</h3>
        <form action="submit_order.php" method="POST">

            <label>No. of Clothes for Iron</label>
            <input type="number" name="cloth_count" id="clothCount" placeholder="Enter number" required oninput="calculateAmount()" />

            <label>Address</label>
            <textarea name="address" placeholder="Enter delivery address" required></textarea>

            <label>Amount (₹10 per cloth)</label>
            <input type="text" id="amountDisplay" readonly value="Rs. 10" />
            <input type="hidden" name="amount" id="amountHidden" value="10" />

            <label>Payment Mode</label>
            <select name="payment_mode" required>
                <option value="Cash">Cash</option>
            </select>

            <button type="submit" class="submit_btn">Place Order</button>
        </form>
    </div>
</div>

<!-- JS to auto-calculate -->
<script>
function calculateAmount() {
    const count = document.getElementById('clothCount').value || 0;
    const pricePerCloth = 10;
    const total = parseInt(count) * pricePerCloth;
    document.getElementById('amountDisplay').value = `Rs. ${total}`;
    document.getElementById('amountHidden').value = total;
}
</script>


<!-- ------booking js--------- -->
<script>
    function openBookingModal() {
        document.getElementById('bookingModal').style.display = 'flex';
    }

    function closeBookingModal() {
        document.getElementById('bookingModal').style.display = 'none';
    }

</script>


  <?php include 'footer.php'; ?>    


</body>
</html>
