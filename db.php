


<!-- 
 



admin pswd  --  admin@gmail.com,   admin123'));

userbane - abc@gmail.com  , 1234

-->



<?php
$servername = "localhost"; 
$username = "root";
$password = "";  
$database = "istriwala";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully!";
?>
