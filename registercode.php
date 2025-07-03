

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $full_name      = trim($_POST['full_name']);
    $apartment_name = trim($_POST['apartment_name']);
    $pin_code       = trim($_POST['pin_code']);
    $address        = trim($_POST['address']);
    $email          = trim($_POST['email']);
    $phone          = trim($_POST['phone']);
    $password_input = $_POST['password'];

    // Validate phone number (10 digits)
    if (!preg_match('/^\d{10}$/', $phone)) {
        echo "<script>alert('Invalid phone number. Enter 10 digits.'); window.location.href='login.php';</script>";
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.'); window.location.href='login.php';</script>";
        exit();
    }

    // Validate password length
    if (empty($password_input) || strlen($password_input) < 6) {
        echo "<script>alert('Password must be at least 6 characters long.'); window.location.href='login.php';</script>";
        exit();
    }

    // Hash the password
    $password = password_hash($password_input, PASSWORD_BCRYPT);

    // Check if email already exists
    $check = $conn->prepare("SELECT id FROM customer WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "<script>alert('Email already registered. Please login.'); window.location.href='login.php';</script>";
        $check->close();
        exit();
    }

    $check->close();

    // Insert into customer table
    $stmt = $conn->prepare("INSERT INTO customer (full_name, apartment_name, pin_code, address, email, phone, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $full_name, $apartment_name, $pin_code, $address, $email, $phone, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! Please login now.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Error during registration. Try again.'); window.location.href='login.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
