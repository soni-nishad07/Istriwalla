







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Istriwalla</title>

  <?php include 'link.php'; ?>  

</head>


<body>

<!-- <header class="login_navbar">
    <div class="login_logo">ISTRIWALLA<br><small style="font-size: 0.7rem;">IRONING IN MINUTES</small></div>
    <nav class="login_menu">
      <a href="#">Home</a>
      <a href="#">About Us</a>
      <a href="#">Services</a>
      <a href="#">Contact Us</a>
    </nav>
    <a href="#" class="login_cta">Book Now</a>
  </header> -->




  <?php include 'nav.php'; ?>



  <!-- <main class="login_container">
    <h2>Login</h2>
    <form>
      <input type="email" placeholder="Email" required>
      <input type="password" placeholder="Password" required>
      <button type="submit" class="login_btn">Login</button>
    </form>
    <div class="login_footer">
      Don’t have an account? <a href="register">Register</a>
    </div>
  </main> -->



  <div class="login_body">


  <main class="login_container">
  <!-- Reset password -->
  <div id="loginForm" class="form_section active">
  
   <h2>Reset Password</h2>
  <form action="reset_password_process.php" method="POST">
    <input type="email" name="email" placeholder="Enter your email" required />
    <button type="submit"  class="login_btn">Send Reset Link</button>
  </form>
    <div class="login_footer">
      Don’t have an account? <a href="login.php">Register</a>
    </div>
  </div>




  



</main>



  </div>



    <section class="login_sec_container">

    <!-- Image Section -->
    <div class="login_sec_image">
      <img src="./images/ironing.png" alt="Ironing Image">
    </div>

    <!-- Heading and Subtext -->
    <h2 class="login_sec_heading">Why Choose Istriwalla?</h2>
    <p class="login_sec_subtext">
      We're not just ironing clothes; we're giving you back your time and confidence
    </p>

    <!-- Features Section -->
    <div class="login_sec_features">
      
      <!-- Feature 1 -->
      <div class="login_sec_feature_box">
        <div class="login_sec_icon">
          <!-- 🕒 -->
           <img src="./images/watch.png" alt="">
        </div>
        <div class="login_sec_title">24-Hour Service</div>
        <div class="login_sec_desc">Quick turnaround with next-day delivery</div>
      </div>

      <!-- Feature 2 -->
      <div class="login_sec_feature_box">
        <div class="login_sec_icon">
          <!-- ⭐ -->
           <img src="./images/star.png" alt="">
        </div>
        <div class="login_sec_title">Professional Quality</div>
        <div class="login_sec_desc">State-of-the-art warehouse with expert care</div>
      </div>

      <!-- Feature 3 -->
      <div class="login_sec_feature_box">
        <div class="login_sec_icon">
          <!-- ✔️ -->
            <img src="./images/tick.png" alt="">
        </div>
        <div class="login_sec_title">Doorstep Pickup & Delivery</div>
        <div class="login_sec_desc">Convenient service right at your location</div>
      </div>

    </div>

  </section>





    <!-- Two Image Boxes Section -->
  <section class="login_sec_img_section">
    <div class="login_sec_img_box">
      <img src="./images/istri_Delivery.png" alt="Istriwalla Delivery">
    </div>
    <div class="login_sec_img_box">
      <img src="./images/istri_Ironing.png" alt="Istriwalla Ironing">
    </div>
  </section>




  <!-- ----------------------------- -->
     <section class="login_our_process_section">

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
    <a href="#" class="login_our_process_button">Start Your Order Today →</a>
    <p class="login_our_process_note">No setup fees • Transparent pricing • 100% satisfaction guaranteed</p>

  </section>




  <?php include 'footer.php'; ?>




</body>
</html>
