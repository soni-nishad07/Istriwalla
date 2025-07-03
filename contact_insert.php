


<?php
include("db.php"); // make sure your db connection is correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $area = htmlspecialchars(trim($_POST['area']));
    $message = htmlspecialchars(trim($_POST['message']));

    $stmt = $conn->prepare("INSERT INTO contact (first_name, last_name, email, phone, area, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $first_name, $last_name, $email, $phone, $area, $message);

    if ($stmt->execute()) {
        header("Location: contact.php?success=1");
        exit;
    } else {
        header("Location: contact.php?error=1");
        exit;
    }
} else {
    header("Location: contact.php");
    exit;
}
?>



