




<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Redirect if not logged in
// if (!isset($_SESSION['admin_email'])) {
//     echo "<script>alert('Please login first!');window.location.href='index.php';</script>";
//     exit;
// }

include '../db.php';
$pageTitle = "All Orders | Admin Panel";

// Fetch order + customer data (LEFT JOIN in case customer data is missing)
// Fetch admin name

$adminName = "Admin";
$email = $_SESSION['admin_email'];
$stmt = $conn->prepare("SELECT name FROM admin_users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($name);
if ($stmt->fetch()) {
    $adminName = $name;
}
$stmt->close();

// Fetch latest orders (last 2 days)
$recentOrders = [];
$sqlRecent = "
    SELECT o.*, c.full_name 
    FROM orders o 
    JOIN customer c ON o.customer_id = c.id 
    WHERE o.order_date >= NOW() - INTERVAL 2 DAY 
    ORDER BY o.order_date DESC 
    LIMIT 5
";
$resultRecent = $conn->query($sqlRecent);
if ($resultRecent && $resultRecent->num_rows > 0) {
    while ($row = $resultRecent->fetch_assoc()) {
        $recentOrders[] = $row;
    }
}

// Fetch all orders with customer info
$sqlAll = "
    SELECT 
        o.id,
        o.customer_id,
        o.cloth_count,
        o.address AS delivery_address,
        o.amount,
        o.payment_mode,
        o.order_date,
        c.full_name,
        c.apartment_name,
        c.pin_code,
        c.address,
        c.email,
        c.phone
    FROM orders o
    JOIN customer c ON o.customer_id = c.id
    ORDER BY o.order_date DESC
";
$resultAll = $conn->query($sqlAll);


// admin head
include 'admin_head.php';

?>

<!-- CSS -->
<link rel="shortcut icon" href="assets/images/favicon.ico">
<link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" />
<link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" />
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/icons.min.css" rel="stylesheet" />
<link href="assets/css/app.min.css" rel="stylesheet" />
<link href="assets/css/custom.min.css" rel="stylesheet" />
<script src="assets/js/layout.js"></script>

<body>
<div id="layout-wrapper">

    <?php include 'admin_topbar.php'; ?>
    <?php include 'admin_sidebar.php'; ?>


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All User Order Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped align-middle">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer ID</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Apartment</th>
                                            <th>Delivery Address</th>
                                            <th>Cloth Count</th>
                                            <th>Amount</th>
                                            <th>Payment</th>
                                            <th>Order Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($resultAll && $resultAll->num_rows > 0): ?>
                                            <?php while ($row = $resultAll->fetch_assoc()): ?>
                                                <tr>
                                                    <td>#<?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['customer_id']; ?></td>
                                                    <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['apartment_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['delivery_address']); ?></td>
                                                    <td><?php echo $row['cloth_count']; ?></td>
                                                    <td>₹<?php echo number_format($row['amount'], 2); ?></td>
                                                    <td><?php echo $row['payment_mode']; ?></td>
                                                    <td><?php echo date("d M Y, h:i A", strtotime($row['order_date'])); ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr><td colspan="11" class="text-center">No orders found</td></tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'admin_footer.php'; ?>
</div>
 <!-- main-content -->
</div> <!-- layout-wrapper -->

<!-- Back to Top Button -->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>

<!-- Preloader -->
<div id="preloader">
    <div id="status">
        <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

<?php include 'admin_footerlink.php'; ?>

</body>
</html>
