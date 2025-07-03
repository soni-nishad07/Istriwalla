


<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

  $stmt = $conn->prepare("SELECT id FROM customer WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    $update = $conn->prepare("UPDATE customer SET password = ? WHERE email = ?");
    $update->bind_param("ss", $new_password, $email);
    if ($update->execute()) {
      echo "<script>alert('Password reset successful! Please login.'); window.location.href='login.php';</script>";
    } else {
      echo "<script>alert('Error while updating password.'); window.location.href='forgot_password.php';</script>";
    }
    $update->close();
  } else {
    echo "<script>alert('No account found with this email.'); window.location.href='forgot_password.php';</script>";
  }

  $stmt->close();
  $conn->close();
}
?>



