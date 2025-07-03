<?php
session_start();
include '../db.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first.'); window.location.href='../login.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $user_id = $_SESSION['user_id'];

    // Fetch current hashed password
    $stmt = $conn->prepare("SELECT password FROM customer WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (!password_verify($current_password, $hashed_password)) {
        echo "<script>alert('❌ Current password is incorrect.');</script>";
    } elseif ($new_password !== $confirm_password) {
        echo "<script>alert('❌ New passwords do not match.');</script>";
    } else {
        $new_hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        $update = $conn->prepare("UPDATE customer SET password = ? WHERE id = ?");
        $update->bind_param("si", $new_hashed_password, $user_id);

        if ($update->execute()) {
            // Logout after password change
            session_unset();
            session_destroy();
            echo "<script>alert('✅ Password changed successfully. Please login again.'); window.location.href='../login.php';</script>";
            exit;
        } else {
            echo "<script>alert('❌ Failed to update password.');</script>";
        }

        $update->close();
    }

    $conn->close();
}
?>




<?php
$pageTitle = "Change Password  | User Dashboard";
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

            <div class="vertical-overlay"></div>

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- End Page-content -->


                      <div class="row ">
                        <div class="col-lg-12">
                            <div class="card py-3 px-5">
                                <div class="card-header">
                                    <h4 class="card-title mb-0 flex-grow-1">Change Password</h4>
                                </div>
                                <div class="card-body">

                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" id="current_password" name="current_password" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="new_password">New Password</label>
                                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="confirm_password">Confirm New Password</label>
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </form>
                                           </div>
                            </div>
                        </div>
                    </div>


                    </div>
                </div>

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