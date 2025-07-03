






<?php
session_start();
// if (!isset($_SESSION['admin_email'])) {
//     echo "<script>alert('Please login first!');window.location.href='index.php';</script>";
//     exit;
// }
?>




<?php
$pageTitle = "Contact details | Admin Panel";
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



           <?php include('admin_topbar.php')?>



        <?php include 'admin_sidebar.php'; ?>

        <!-- Left Sidebar End -->

        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

           
<?php
include("../db.php");

$sql = "SELECT * FROM contact ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<div class="page-content">
  <div class="container-fluid pagination_table">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0 flex-grow-1">Contact Detail</h4>
          </div>

          <div class="card-body">

          

          <table class="table align-middle table-bordered table-hover mb-0">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Area</th>
      <th>Message</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($result && $result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td>#MSG<?php echo str_pad($row['id'], 4, '0', STR_PAD_LEFT); ?></td>
          <td><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></td>
          <td><?php echo htmlspecialchars($row['email']); ?></td>
          <td><?php echo htmlspecialchars($row['phone']); ?></td>
          <td><?php echo htmlspecialchars($row['area']); ?></td>
          <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
          <td><?php echo date('d M, Y h:i A', strtotime($row['created_at'])); ?></td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr>
        <td colspan="7" class="text-center">No contact messages found.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>


            <!-- Optional pagination UI -->
            <div class="d-flex justify-content-between align-items-center mt-3">
              <div>Total Records: <?php echo $result->num_rows; ?></div>
              <nav>
                <ul class="pagination mb-0">
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <!-- You can implement real pagination if needed -->
                </ul>
              </nav>
            </div>
          </div><!-- end card-body -->
        </div><!-- end card -->
      </div><!-- end col -->
    </div><!-- end row -->
  </div>
</div>

<?php $conn->close(); ?>


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



