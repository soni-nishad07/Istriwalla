<?php
session_start();
include '../db.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first'); window.location.href='../login.php';</script>";
    exit;
}

$customer_id = $_SESSION['user_id'];

$result = $conn->prepare("SELECT * FROM orders WHERE customer_id = ? ORDER BY order_date DESC");
$result->bind_param("i", $customer_id);
$result->execute();
$data = $result->get_result();
?>



<?php
$pageTitle = "Order | User Dashboard";
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



            <?php include('user_topbar.php') ?>



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

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0 flex-grow-1"> Your Order History</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Customer ID</th>
                                                        <th>Cloth Count</th>
                                                        <th>Address</th>
                                                        <th>Amount</th>
                                                        <th>Payment</th>
                                                        <th>Order Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($row = $data->fetch_assoc()): ?>
                                                        <tr>
                                                            <td><?php echo $row['id']; ?></td>
                                                            <td><?php echo $row['customer_id']; ?></td>
                                                            <td><?php echo $row['cloth_count']; ?></td>
                                                            <td><?php echo $row['address']; ?></td>
                                                            <td>₹<?php echo $row['amount']; ?></td>
                                                            <td><?php echo $row['payment_mode']; ?></td>
                                                            <td><?php echo $row['order_date']; ?></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div> <!-- end .h-100-->

                </div> <!-- end col -->

                <!-- end col -->
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