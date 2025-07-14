




<!-- ====== Professional Steam Iron Service Section (Classname Prefix: service_) ====== -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Steam Iron Service</title>

    <?php include 'link.php'; ?>

</head>

<body>


    <?php include 'nav.php'; ?>   





        <section class="home_clothing_care">
    <div class="home_clothing_icon">
 
      <img src="./images/istriwalla_logo.png" alt="Iron Icon">
      
    </div>
      <h2 class="service_title">Professional</h2>
      <h2 class="service_subtitle">Steam Iron Service</h2>
      <div class="service_features">
        <div class="service_feature"><i class="fas fa-truck"></i> Free pickup & delivery</div>
        <div class="service_feature"><i class="far fa-clock"></i> 24-hour turnaround</div>
        <div class="service_feature"><i class="fas fa-star"></i> Professional quality</div>
        <div class="service_feature"><i class="fas fa-check-circle"></i> 100% satisfaction guaranteed</div>
      </div>      
          <!-- <button class="service_btn">Book Steam Iron Service →</button> -->


                <?php if (isset($_SESSION['user_id'])): ?>
      <button class="btn book_now me-2" onclick="openBookingModal()">Book Steam Iron Service → </button>
<?php else: ?>
  <button class="service_btn"
      onclick="alert('Please login first to book a service.'); window.location.href='login.php';">
     Book Steam Iron Service → 
  </button>
<?php endif; ?>

    </section>




  <!-- <section class="service_section">
    <div class="service_content">
      <div class="service_icon">
        <i class="fas fa-iron"></i> 
      </div>
      <h2 class="service_title">Professional</h2>
      <h2 class="service_subtitle">Steam Iron Service</h2>

      <div class="service_features">
        <div class="service_feature"><i class="fas fa-truck"></i> Free pickup & delivery</div>
        <div class="service_feature"><i class="far fa-clock"></i> 24-hour turnaround</div>
        <div class="service_feature"><i class="fas fa-star"></i> Professional quality</div>
        <div class="service_feature"><i class="fas fa-check-circle"></i> 100% satisfaction guaranteed</div>
      </div>

      <button class="service_btn">Book Steam Iron Service →</button>
    </div>
  </section> -->




  



<!-- ======= Start service_transparent_ Section (Responsive Transparent Pricing Layout) ======= -->


<section class="service_transparent_section">
  <div class="service_transparent_container">
    <h2 class="service_transparent_title">Transparent Pricing</h2>
    <p class="service_transparent_subtitle">Quality service at irresistible prices with no hidden charges</p>

    <div class="service_transparent_grid">
      <div class="service_transparent_card  animate-from-bottom">
        <h4>Business Shirts</h4>
        <p>Crisp, professional finish</p>
        <span class="service_transparent_price">10 Rs</span>
      </div>
      <div class="service_transparent_card  animate-from-bottom">
        <h4>Formal Trousers</h4>
        <p>Perfect creases every time</p>
        <span class="service_transparent_price">10 Rs</span>
      </div>
      <div class="service_transparent_card  animate-from-bottom">
        <h4>Dresses</h4>
        <p>Delicate care for all fabrics</p>
        <span class="service_transparent_price">10 Rs</span>
      </div>
      <div class="service_transparent_card  animate-from-bottom">
        <h4>Uniforms</h4>
        <p>Reliable service for work attire</p>
        <span class="service_transparent_price">10 Rs</span>
      </div>
      <div class="service_transparent_card  animate-from-bottom">
        <h4>Casual Wear</h4>
        <p>Fresh look for everyday clothes</p>
        <span class="service_transparent_price">10 Rs</span>
      </div>
      <div class="service_transparent_card animate-from-bottom">
        <h4>Ethnic Wear</h4>
        <p>Special care for traditional garments</p>
        <span class="service_transparent_price">10 Rs</span>
      </div>
    </div>
  </div>
</section>




<!-- service_our_process_ | Our Process Section -->
<section class="service_our_process_ bg-gradient">
  <div class="service_our_process_ container">
    <h2 class="service_our_process_ title">Our Process</h2>
    <p class="service_our_process_ subtitle">
      Full steam ahead – here’s how we make it happen in just a few simple steps
    </p>

    <div class="service_our_process_ steps">
      <div class="service_our_process_ card">
        <div class="service_our_process_ step-num">1</div>
        <div>
          <h3 class="service_our_process_ step-title">Order Online</h3>
          <p class="service_our_process_ step-desc">
            Select item from service, choose your garment categories, and specify quantities
          </p>
        </div>
        <div class="service_our_process_ tag">2 min</div>
      </div>

      <div class="service_our_process_ card"   id="pickup_drop">
        <div class="service_our_process_ step-num">2</div>
        <div>
          <h3 class="service_our_process_ step-title">Pickup</h3>
          <p class="service_our_process_ step-desc">
            Our associate arrives in a 100% electric van to collect your clothes
          </p>
        </div>
        <div class="service_our_process_ tag">Same Day</div>
      </div>

      <div class="service_our_process_ card"   id="stear_iron">
        <div class="service_our_process_ step-num">3</div>
        <div>
          <h3 class="service_our_process_ step-title">Steam Ironing</h3>
          <p class="service_our_process_ step-desc">
            Expert care at our state-of-the-art facility with precision temperature control
          </p>
        </div>
        <div class="service_our_process_ tag">24 hrs</div>
      </div>

      <div class="service_our_process_ card">
        <div class="service_our_process_ step-num">4</div>
        <div>
          <h3 class="service_our_process_ step-title">Delivery</h3>
          <p class="service_our_process_ step-desc">
            Your perfectly pressed clothes delivered in eco-friendly packaging
          </p>
        </div>
        <div class="service_our_process_ tag">Next Day</div>
      </div>
    </div>

    <div class="service_our_process_ cta">
      <h3>Ready to Get Started?</h3>
      <p>
        Experience the convenience of professional ironing with our 24-hour steam iron service. Book now and let us take care of your clothing while you focus on what matters most.
      </p>
      <!-- <button class="service_our_process_ button">Book Your Service Now →</button> -->
                       <?php if (isset($_SESSION['user_id'])): ?>
      <button class="btn book_now me-2" onclick="openBookingModal()">Book Your Service Now → </button>
<?php else: ?>
  <button  class="service_our_process_ button"
      onclick="alert('Please login first to book a service.'); window.location.href='login.php';">
Book Your Service Now →
  </button>
<?php endif; ?>
    </div>
  </div>
</section>



    <?php include 'footer.php'; ?>



</body>
</html>
