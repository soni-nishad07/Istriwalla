<?php
session_start();
include('../db.php');

// ---first login-------

if (!isset($_SESSION['admin_email'])) {
    echo "<script>alert('Please login first!');window.location.href='index.php';</script>";
    exit;
}



// Total Orders
$totalOrders = 0;
$resultOrders = $conn->query("SELECT COUNT(*) AS total FROM orders");
if ($resultOrders && $row = $resultOrders->fetch_assoc()) {
    $totalOrders = $row['total'];
}

// Total Customers
$totalCustomers = 0;
$resultCustomers = $conn->query("SELECT COUNT(*) AS total FROM customer");
if ($resultCustomers && $row = $resultCustomers->fetch_assoc()) {
    $totalCustomers = $row['total'];
}

// Total Admins
$totalAdmins = 0;
$resultAdmins = $conn->query("SELECT COUNT(*) AS total FROM admin_users");
if ($resultAdmins && $row = $resultAdmins->fetch_assoc()) {
    $totalAdmins = $row['total'];
}


$pageTitle = "Home  | Admin Panel";
include 'admin_head.php';

?>



<link rel="shortcut icon" href="assets/images/favicon.ico">

<!-- jsvectormap css -->
<link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

<!--Swiper slider css-->
<link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

<!-- Layout config Js -->
<script src="assets/js/layout.js"></script>
<!-- Bootstrap Css -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />

<!-- </head> -->

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- Begin page -->
        <div id="layout-wrapper">



            <?php include('admin_topbar.php') ?>



            <?php include 'admin_sidebar.php'; ?>

            <!-- Left Sidebar End -->

            <!-- Vertical Overlay-->
            <div class="vertical-overlay"></div>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col">

                                <div class="h-100">
                                    <div class="row mb-3 pb-1">
                                        <div class="col-12">
                                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                                <div class="flex-grow-1">
                                                    <h4 class="fs-16 mb-1">Admin Panel</h4>

                                                </div>
                                            </div><!-- end card header -->
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->

                                    <div class="row">
                                        <!-- Orders Card -->
                                        <div class="col-xl-6 col-md-6">
                                            <div class="card card-animate">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total Orders</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                                <span class="counter-value" data-target="<?php echo $totalOrders; ?>"><?php echo $totalOrders; ?></span>
                                                            </h4>
                                                            <a href="orders.php" class="text-decoration-underline">View all orders</a>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                                                <i class="bx bx-shopping-bag text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Total Customers Card -->
                                        <div class="col-xl-6 col-md-6">
                                            <div class="card card-animate">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total Customers</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                                <span class="counter-value" data-target="<?php echo $totalCustomers; ?>"><?php echo $totalCustomers; ?></span>
                                                            </h4>
                                                            <a href="user_show.php" class="text-decoration-underline">View all customers</a>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                                <i class="bx bx-user text-warning"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <!-- Total Admin Users -->
                                        <div class="col-xl-6 col-md-6">
                                            <div class="card card-animate">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Admin Registered</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                                <span class="counter-value" data-target="<?php echo $totalAdmins; ?>"><?php echo $totalAdmins; ?></span>
                                                            </h4>
                                                            <a href="admin_profile.php" class="text-decoration-underline">View admins</a>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-success-subtle rounded fs-3">
                                                                <i class="bx bx-shield-quarter text-success"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end .rightbar-->

                    </div> <!-- end col -->
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include('admin_footer.php'); ?>


    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->





    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>





    <?php include('admin_footerlink.php'); ?>


</body>


</html>