

<?php session_start(); ?>



<?php
$pageTitle = "Edit Profile | User Dashboard";
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

                 
                
                    <?php
                include '../db.php';

                if (!isset($_SESSION['user_id'])) {
                    echo "<script>alert('Please login first.'); window.location.href='../login.php';</script>";
                    exit;
                }

                $user_id = $_SESSION['user_id'];

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $full_name = $_POST['full_name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $apartment_name = $_POST['apartment_name'];
                    $pin_code = $_POST['pin_code'];
                    $address = $_POST['address'];

                    $stmt = $conn->prepare("UPDATE customer SET full_name=?, apartment_name=?, pin_code=?, address=?, email=?, phone=? WHERE id=?");
                    $stmt->bind_param("ssssssi", $full_name, $apartment_name, $pin_code, $address, $email, $phone, $user_id);

                    if ($stmt->execute()) {
                        echo "<script>alert('Profile updated successfully'); window.location.href = 'profile.php';</script>";
                    } else {
                        echo "<script>alert('Update failed'); window.location.href = 'profile.php';</script>";
                    }

                    $stmt->close();
                }

                $stmt = $conn->prepare("SELECT * FROM customer WHERE id = ?");
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();
                ?>


                      <div class="row ">
                        <div class="col-lg-12">
                            <div class="card py-3 px-5">
                                <div class="card-header">
                                    <h4 class="card-title mb-0 flex-grow-1">Update User Profile</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input type="text" name="full_name" class="form-control"
                                                value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Apartment Name</label>
                                            <input type="text" name="apartment_name" class="form-control"
                                                value="<?php echo htmlspecialchars($user['apartment_name']); ?>"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Pin Code</label>
                                            <input type="text" name="pin_code" class="form-control"
                                                value="<?php echo htmlspecialchars($user['pin_code']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control"
                                                required><?php echo htmlspecialchars($user['address']); ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Phone</label>
                                            <input type="text" name="phone" class="form-control"
                                                value="<?php echo htmlspecialchars($user['phone']); ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                                <!-- end row-->

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