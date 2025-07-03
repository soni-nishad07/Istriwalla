




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
  <!-- Login Form -->
 <!-- Login Form -->
<div id="loginForm" class="form_section active">
  <h2>Login</h2>
  <form action="logincode.php" method="POST">
    <input type="email" name="email" placeholder="Email" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit" class="login_btn">Login</button>
  </form>
  <div class="login_footer">
    Don’t have an account? <a onclick="toggleForm('register')">Register</a><br>
       <!-- Forgot password? <a href="forgot_password.php">Reset Password</a> -->
  </div>
</div>





  
<?php
include 'db.php'; // Ensure this is the correct path to your DB connection
$result = $conn->query("SELECT * FROM apartment_names ORDER BY name ASC");
?>

<!-- Register Form -->
<div id="registerForm" class="form_section">
  <h2>Register</h2>
  <form action="registercode.php" method="POST">
    <input type="text" name="full_name" placeholder="Name" required />

    <!-- Apartment Dropdown -->
    <select name="apartment_name" required>
      <option value="">Select Apartment</option>
      <?php while ($row = $result->fetch_assoc()): ?>
        <option value="<?= htmlspecialchars($row['name']) ?>">
          <?= htmlspecialchars($row['name']) ?>
        </option>
      <?php endwhile; ?>
    </select>

    <input type="text" name="pin_code" placeholder="Pin Code" required />
    <textarea name="address" placeholder="Address" rows="2" required></textarea>
    <input type="email" name="email" placeholder="Email" required />
    <input type="number" name="phone" placeholder="Phone Number" required />
    <input type="password" name="password" placeholder="Create Password" required />
    <button type="submit" class="login_btn">Register</button>
  </form>
  <div class="login_footer">
    Already have an account? <a onclick="toggleForm('login')">Login</a>
  </div>
</div>




</main>



  </div>



    <section class="login_sec_container">



    
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


                            <?php if (isset($_SESSION['user_id'])): ?>
      <button class="login_our_process_button" onclick="openBookingModal()">Start Your Order Today →</button>
<?php else: ?>
  <button  class="login_our_process_button"
      onclick="alert('Please login first to book a service.'); window.location.href='login.php';">
Start Your Order Today →
  </button>
<?php endif; ?>


    <p class="login_our_process_note">No setup fees • Transparent pricing • 100% satisfaction guaranteed</p>

  </section>




  <?php include 'footer.php'; ?>




</body>
</html>
