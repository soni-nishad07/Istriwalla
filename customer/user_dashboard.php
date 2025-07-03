

<?php session_start(); ?>



<?php
include('../db.php');

// Check login
if (!isset($_SESSION['user_id']) || !isset($_SESSION['full_name'])) {
    header("Location: ../login.php");
    exit;
}



include('../db.php');


$customer_id = $_SESSION['user_id'];
$full_name = $_SESSION['full_name'];

// ✅ Logged-in user's order count
$stmt_user_orders = $conn->prepare("SELECT COUNT(*) AS user_order_count FROM orders WHERE customer_id = ?");
$stmt_user_orders->bind_param("i", $customer_id);
$stmt_user_orders->execute();
$user_order_result = $stmt_user_orders->get_result()->fetch_assoc();
$user_order_count = $user_order_result['user_order_count'];
$stmt_user_orders->close();

// ✅ All orders count
$total_orders_result = $conn->query("SELECT COUNT(*) AS total_orders FROM orders");
$total_orders = $total_orders_result->fetch_assoc()['total_orders'];

// ✅ All users count
$total_users_result = $conn->query("SELECT COUNT(*) AS total_users FROM customer");
$total_users = $total_users_result->fetch_assoc()['total_users'];

$pageTitle = "Home | User Dashboard";
include 'user_head.php';
?>



<?php
$pageTitle = "Home | User Dashboard";
include 'user_head.php';
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



           <?php include('user_topbar.php')?>



        <?php include 'user_sidebar.php'; ?>

        <!-- Left Sidebar End -->

        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
<div class="container-fluid">
    <div class="row">
        <!-- Logged-in User's Orders -->
        <div class="col-xl-6 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Your Orders</p>
                    <h4 class="fs-22 fw-semibold ff-secondary mb-3"><?php echo $user_order_count; ?></h4>
                    <a href="order_show.php" class="text-decoration-underline">View Your Orders</a>
                </div>
            </div>
        </div>

        <!-- Total Orders (All Users) -->
        <div class="col-xl-6 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total Orders</p>
                    <h4 class="fs-22 fw-semibold ff-secondary mb-3"><?php echo $total_orders; ?></h4>
                    <a href="#" class="text-decoration-underline">All Orders</a>
                </div>
            </div>
        </div>

        <!-- Total Registered Users -->
        <!-- <div class="col-xl-4 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total Users</p>
                    <h4 class="fs-22 fw-semibold ff-secondary mb-3"><?php echo $total_users; ?></h4>
                    <a href="#" class="text-decoration-underline">Registered Users</a>
                </div>
            </div>
        </div> -->
    </div>
</div>


                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

             <?php include('user_footer.php'); ?>


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

   



    <?php include('user_footerlink.php'); ?>


</body>


</html>