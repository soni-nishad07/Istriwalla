




<?php
// session_start();
include('../db.php');

// Ensure admin is logged in
// if (!isset($_SESSION['admin_email'])) {
//     header("Location: index.php");
//     exit;
// }

$adminName = "Admin";
if (isset($_SESSION['admin_email'])) {
    $email = $_SESSION['admin_email'];
    $stmt = $conn->prepare("SELECT name FROM admin_users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($name);
    if ($stmt->fetch()) {
        $adminName = $name;
    }
    $stmt->close();
}




// Fetch latest orders from last 2 days
$recentOrders = [];
$sql = "
    SELECT o.*, c.full_name 
    FROM orders o 
    JOIN customer c ON o.customer_id = c.id 
    WHERE o.order_date >= NOW() - INTERVAL 2 DAY 
    ORDER BY o.order_date DESC 
    LIMIT 5
";

$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $recentOrders[] = $row;
    }
}

?>



 <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                         

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm mt-3">
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

                        <!-- App Search-->
                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


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

                        <!-- notification -->
                   <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
    <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle"
        id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside"
        aria-haspopup="true" aria-expanded="false">
        <i class='bx bx-bell fs-22'></i>
        <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">
            <?php echo count($recentOrders); ?><span class="visually-hidden">unread orders</span>
        </span>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
        <div class="dropdown-head bg-primary bg-pattern rounded-top">
            <div class="p-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-0 fs-16 fw-semibold text-white">Latest Orders</h6>
                    </div>
                    <div class="col-auto">
                        <span class="badge bg-light text-body fs-13"><?php echo count($recentOrders); ?> New</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content position-relative">
            <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                <div data-simplebar style="max-height: 300px;" class="pe-2">
                    <?php if (!empty($recentOrders)): ?>
                        <?php foreach ($recentOrders as $order): ?>
                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                <div class="d-flex">
                                    <div class="avatar-xs me-3 flex-shrink-0">
                                        <span class="avatar-title bg-success-subtle text-success rounded-circle fs-16">
                                            <i class="bx bx-cart"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <a href="#!" class="stretched-link">
                                            <h6 class="mt-0 mb-1 lh-base">
                                                <?php echo htmlspecialchars($order['full_name']); ?> placed an order
                                            </h6>
                                            <div class="text-muted fs-12">
                                                <?php echo $order['cloth_count']; ?> clothes - ₹<?php echo $order['amount']; ?> (<?php echo $order['payment_mode']; ?>)
                                            </div>
                                        </a>
                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                            <i class="mdi mdi-clock-outline"></i>
                                            <?php echo date("M d, Y h:i A", strtotime($order['order_date'])); ?>
                                        </p>
                                    </div>
                               
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="dropdown-item text-muted text-center">No recent orders</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>




                        <!-- ---------------------PROFILE NAMES------------------ -->

                                        
                    <!-- ✅ Admin Header Dropdown (HTML + PHP) -->
                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <span class="text-start ms-xl-2">
                                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo htmlspecialchars($adminName); ?></span>
                                    <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">Administrator</span>
                                </span>
                            </span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end">
                            <h6 class="dropdown-header">Welcome <?php echo htmlspecialchars($adminName); ?>!</h6>

                            <a class="dropdown-item" href="admin_profile.php">
                                <i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i>
                                <span class="align-middle">Profile</span>
                            </a>

                            <a class="dropdown-item" href="admin_change_password.php">
                                <i class="mdi mdi-lock-reset text-muted fs-16 align-middle me-1"></i>
                                <span class="align-middle">Change Password</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="logout.php">
                                <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                <span class="align-middle">Logout</span>
                            </a>
                        </div>
                    </div>


                    </div>
                </div>
            </div>
        </header>






        <!-- ------------------------ -->









