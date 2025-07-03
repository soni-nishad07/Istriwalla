







<?php
session_start();
include('../db.php');
$pageTitle = "Manage Apartment Names";
include 'admin_head.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $apartment_name = trim($_POST['apartment_name']);
    if (!empty($apartment_name)) {
        $stmt = $conn->prepare("INSERT INTO apartment_names (name) VALUES (?)");
        $stmt->bind_param("s", $apartment_name);
        if ($stmt->execute()) {
            $success = "Apartment added successfully.";
        } else {
            $error = "Error: " . $stmt->error;
        }
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM apartment_names WHERE id = $id");
    header("Location: add_apartment.php");
    exit;
}
?>

<?php
$pageTitle = "Apartment Name | Admin Panel";
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

                <h4 class="mb-3">Add Apartment Name</h4>
                <?php if (isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
                <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form method="POST" class="mb-4">
                    <div class="mb-3">
                        <input type="text" name="apartment_name" class="form-control" placeholder="Apartment Name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>

                <h4 class="mb-3">Apartment List</h4>
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Sr. No.</th>
                            <th>Apartment Name</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM apartment_names ORDER BY id DESC");
                    $sr_no = 1;
                    while ($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <td><?= $sr_no++ ?></td> 
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td>
                                <a href="admin_apartment_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="add_apartment.php?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
                                   onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>

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
