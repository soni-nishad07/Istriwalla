



<?php
session_start();
include('../db.php');



$email = $_SESSION['admin_email'];
$sql = "SELECT * FROM admin_users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();


// ===============

$pageTitle = "Profile | Admin Panel";
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


                        <!-- end row-->
                     

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0 flex-grow-1"> Admin Profile</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                     <table class="table table-bordered mt-3">
    <tr>
        <th>ID</th>
        <td>#<?php echo $admin['id']; ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?php echo htmlspecialchars($admin['name']); ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo htmlspecialchars($admin['email']); ?></td>
    </tr>
</table>

<!-- Admin Action Buttons -->
<div class="mb-4">
    <a href="admin_edit_profile.php" class="btn btn-warning">Edit Profile</a>
    <a href="admin_change_password.php" class="btn btn-primary">Change Password</a>
</div>
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