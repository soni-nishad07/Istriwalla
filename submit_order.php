



<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first'); window.location.href='login.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cloth_count = intval($_POST['cloth_count']);
    $address = $_POST['address'];
    $payment_mode = $_POST['payment_mode'];
    $customer_id = $_SESSION['user_id'];

    // Fixed price per cloth
    $amount = $cloth_count * 10;

    $stmt = $conn->prepare("INSERT INTO orders (customer_id, cloth_count, address, amount, payment_mode) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisds", $customer_id, $cloth_count, $address, $amount, $payment_mode);

    if ($stmt->execute()) {
        echo "<script>alert('Order placed successfully'); window.location.href='customer/order_show.php';</script>";
    } else {
        echo "<script>alert('Failed to place order');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
