<!-- =================== CLOTHING CARE SECTION START (home_) =================== -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clothing Care</title>

  <?php include 'link.php'; ?>

</head>


<body>


  <?php include 'nav.php'; ?>


  <section class="home_clothing_care">
    <div class="home_clothing_icon">
      <!-- Iron Icon SVG -->

      <img src="./images/istriwalla_logo.png" alt="Iron Icon">

    </div>
    <div class="home_clothing_title">CLOTHING CARE</div>
  </section>








  <section class="login_sec_container">

    <!-- Image Section -->
    <!-- <div class="login_sec_image  animate-from-top">
      <img src="./images/ironing.png" alt="Ironing Image">
    </div> -->





    <!-- Video Section -->
    <div class="login_sec_image animate-from-top">
      <video autoplay muted loop playsinline width="100%" class="steam_up">
        <source src="./images/Istriwalla.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>





    <!-- Heading and Subtext -->
    <h2 class="login_sec_heading">Why Choose Istriwalla?</h2>
    <p class="login_sec_subtext">
      We're not just ironing clothes; we're giving you back your time and confidence
    </p>

    <!-- Features Section -->
    <div class="login_sec_features">

      <!-- Feature 1 -->
      <div class="login_sec_feature_box animate-from-bottom">
        <div class="login_sec_icon">
          <!-- 🕒 -->
          <!-- <img src="./images/watch.png" alt=""> -->
          <!-- <div class="icons"> -->
          <i class="fa-solid fa-clock"></i>
          <!-- </div> -->
        </div>
        <div class="login_sec_title">24-Hour Service</div>
        <div class="login_sec_desc">Quick turnaround with next-day delivery</div>
      </div>

      <!-- Feature 2 -->
      <div class="login_sec_feature_box animate-from-bottom">
        <div class="login_sec_icon">
          <i class="fa-solid fa-star"></i>
        </div>
        <div class="login_sec_title">Professional Quality</div>
        <div class="login_sec_desc">State-of-the-art warehouse with expert care</div>
      </div>

      <!-- Feature 3 -->
      <div class="login_sec_feature_box animate-from-bottom">
        <div class="login_sec_icon">
          <i class="fa-solid fa-check"></i>
        </div>
        <div class="login_sec_title">Doorstep Pickup & Delivery</div>
        <div class="login_sec_desc">Convenient service right at your location</div>
      </div>

    </div>

  </section>





  <!-- Two Image Boxes Section -->
  <section class="login_sec_img_section">
    <div class="login_sec_img_box  animate-from-left">
      <img src="./images/istri_Delivery.png" alt="Istriwalla Delivery">
    </div>
    <div class="login_sec_img_box  animate-from-right">
      <img src="./images/istri_Ironing.png" alt="Istriwalla Ironing">
    </div>
  </section>




  <!-- ----------------------------- -->
  <section class="login_our_process_section" id="process">

    <!-- Title -->
    <h2 class="login_our_process_title">Our Process</h2>
    <p class="login_our_process_subtitle">Full steam ahead - here's how we make it happen</p>

    <!-- Steps -->
    <div class="login_our_process_steps">
      <div class="login_our_process_step">
        <div class="login_our_process_circle">1</div>
        <div class="login_our_process_step_title">Warm Up</div>
        <div class="login_our_process_step_desc">Select steam iron service and place your order online</div>
      </div>
      <div class="login_our_process_step">
        <div class="login_our_process_circle">2</div>
        <div class="login_our_process_step_title">Pick Up</div>
        <div class="login_our_process_step_desc">Our associate arrives in an electric van to collect your clothes</div>
      </div>
      <div class="login_our_process_step">
        <div class="login_our_process_circle">3</div>
        <div class="login_our_process_step_title">Steam Up</div>
        <div class="login_our_process_step_desc">Professional ironing at our world-class facility</div>
      </div>
      <div class="login_our_process_step">
        <div class="login_our_process_circle">4</div>
        <div class="login_our_process_step_title">Show Up</div>
        <div class="login_our_process_step_desc">Next-day delivery in eco-friendly packaging</div>
      </div>
    </div>

    <!-- CTA Section -->
    <div class="login_our_process_cta">Ready to Experience the Future of Clothing Care?</div>
    <p class="login_our_process_cta_desc">Join thousands of satisfied customers in Bangalore who trust Istriwalla for their ironing needs</p>
    <!-- <a href="#" class="login_our_process_button">Start Your Order Today →</a> -->

    <?php if (isset($_SESSION['user_id'])): ?>
      <button class="btn book_now me-2" onclick="openBookingModal()">Start Your Order Today →</button>
    <?php else: ?>
      <button class="login_our_process_button"
        onclick="alert('Please login first to book a service.'); window.location.href='login.php';">
        Start Your Order Today →
      </button>
    <?php endif; ?>
    </div>
    </div>

    <p class="login_our_process_note">No setup fees • Transparent pricing • 100% satisfaction guaranteed</p>

  </section>




  <?php include 'footer.php'; ?>


</body>

</html>
<!-- =================== CLOTHING CARE SECTION END (home_) =================== -->