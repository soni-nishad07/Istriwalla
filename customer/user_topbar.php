



<?php
// session_start();

// If user not logged in, redirect to login page
if (!isset($_SESSION['user_id']) || !isset($_SESSION['full_name'])) {
    header("Location: ../login.php");
    exit;
}
?>






<header id="page-topbar">
  <div class="layout-width">
    <div class="navbar-header">
      <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box horizontal-logo">
          <a href="user_dashboard.php" class="logo logo-dark">
            <span class="logo-sm">
              <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
              <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
          </a>

          <a href="user_dashboard.php" class="logo logo-light">
            <span class="logo-sm">
              <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
              <img src="assets/images/logo-light.png" alt="" height="17">
            </span>
          </a>
        </div>

        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none" id="topnav-hamburger-icon">
          <span class="hamburger-icon">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </button>
      </div>

      <div class="d-flex align-items-center">

        <div class="ms-1 header-item d-none d-sm-flex">
          <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
            <i class='bx bx-fullscreen fs-22'></i>
          </button>
        </div>

        <div class="ms-1 header-item d-none d-sm-flex">
          <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle light-dark-mode">
            <i class='bx bx-moon fs-22'></i>
          </button>
        </div>

        <!-- ---------------------PROFILE NAMES------------------ -->
        <div class="dropdown ms-sm-3 header-item topbar-user">
          <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center">
                  <?php echo htmlspecialchars(string: $_SESSION['full_name']); ?>
              <span class="text-start ms-xl-2">
                <!-- <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"> -->
                <!-- </span> -->
              </span>
            </span>
          </button>

          <!-- Profile Dropdown -->
          <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">Welcome  <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</h6>
            <a class="dropdown-item" href="profile.php">
              <i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> Profile
            </a>
            <a class="dropdown-item" href="change-password.php">
              <i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> Change Password
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../logout.php">
              <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> Logout
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</header>
