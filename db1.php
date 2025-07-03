





<?php
// MySQL configuration
$servername = "localhost";  // Change to your hosting DB host if not localhost
$username = "u272243666_istri";
$password = "Istri@1234";
$database = "u272243666_istriwala";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: Success message for testing (remove in production)
// echo "Connected successfully!";
?>
