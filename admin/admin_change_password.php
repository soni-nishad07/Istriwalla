








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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_pass = $_POST['current_password'];
    $new_pass     = $_POST['new_password'];
    $confirm_pass = $_POST['confirm_password'];

    if (!password_verify($current_pass, $admin['password'])) {
        $error = "Current password is incorrect!";
    } elseif ($new_pass !== $confirm_pass) {
        $error = "New passwords do not match!";
    } else {
        $hashed = password_hash($new_pass, PASSWORD_DEFAULT);
        $update_sql = "UPDATE admin_users SET password = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("si", $hashed, $admin['id']);
        if ($update_stmt->execute()) {
            echo "<script>alert('Password changed successfully!'); window.location.href='admin_profile.php';</script>";
            exit;
        } else {
            $error = "Failed to update password.";
        }
    }
}
?>

<?php
$pageTitle = "Change Password | Admin Panel";
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0 flex-grow-1"> Change Password</h4>
                                    </div>

                                    <div class="card-body">
                                    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                                    <form method="POST">
                                        <div class="mb-3">
                                            <label>Current Password</label>
                                            <input type="password" name="current_password" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>New Password</label>
                                            <input type="password" name="new_password" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Confirm New Password</label>
                                            <input type="password" name="confirm_password" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                        <a href="admin_profile.php" class="btn btn-secondary">Cancel</a>
                                    </form>
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