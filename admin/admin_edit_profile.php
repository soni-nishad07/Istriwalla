






<?php
session_start();
include('../db.php');

// if (!isset($_SESSION['admin_email'])) {
//     header("Location: index.php");
//     exit;
// }

$email = $_SESSION['admin_email'];
$sql = "SELECT * FROM admin_users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $new_name = $_POST['name'];
    $new_email = $_POST['email'];

    $update_sql = "UPDATE admin_users SET name = ?, email = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssi", $new_name, $new_email, $admin['id']);
    if ($update_stmt->execute()) {
        $_SESSION['admin_email'] = $new_email; // Update session
        echo "<script>alert('Profile updated successfully!'); window.location.href='admin_profile.php';</script>";
        exit;
    } else {
        $error = "Failed to update profile.";
    }
}
?>


<?php
$pageTitle = "Edit Profile | Admin Panel";
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
                                        <h4 class="card-title mb-0 flex-grow-1"> Edit Profile</h4>
                                    </div>

                                    <div class="card-body">
            
                                        <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                                            <form method="POST">
                                                <div class="mb-3">
                                                    <label>Name</label>
                                                    <input type="text" name="name" class="form-control" required value="<?php echo htmlspecialchars($admin['name']); ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" required value="<?php echo htmlspecialchars($admin['email']); ?>">
                                                </div>
                                                <button type="submit" class="btn btn-success">Update</button>
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