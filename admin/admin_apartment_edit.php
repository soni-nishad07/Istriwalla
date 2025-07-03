








<?php
session_start();
include('../db.php');
$pageTitle = "Edit Apartment Name";
include 'admin_head.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM apartment_names WHERE id = $id");
$row = $result->fetch_assoc();

if (!$row) {
    die("Apartment not found");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['apartment_name']);
    if (!empty($name)) {
        $stmt = $conn->prepare("UPDATE apartment_names SET name = ? WHERE id = ?");
        $stmt->bind_param("si", $name, $id);
        if ($stmt->execute()) {
            $success = "Updated successfully.";
            header("Location: add_apartment.php");
            exit;
        } else {
            $error = "Error: " . $stmt->error;
        }
    }
}
?>


<?php
$pageTitle = "Edit Apartment Name | Admin Panel";
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




<body>
<div id="layout-wrapper">
    <?php include('admin_topbar.php') ?>
    <?php include('admin_sidebar.php') ?>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <h4>Edit Apartment Name</h4>
                <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label>Apartment Name</label>
                        <input type="text" name="apartment_name" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="add_apartment.php.php" class="btn btn-secondary">Back</a>
                </form>

            </div>
        </div>
        <?php include('admin_footer.php'); ?>
    </div>
</div>



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
