


<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email    = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT id, full_name, password FROM customer WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows === 1) {
    $stmt->bind_result($id, $full_name, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
      $_SESSION['user_id'] = $id;
      $_SESSION['full_name'] = $full_name;

      echo "<script>alert('Login successful! Welcome, $full_name'); window.location.href='index.php';</script>";
    } else {
      echo "<script>alert('Incorrect password. Please try again.'); window.location.href='login.php';</script>";
    }
  } else {
    echo "<script>alert('No account found. Please register first.'); window.location.href='login.php';</script>";
  }

  $stmt->close();
  $conn->close();
}
?>
