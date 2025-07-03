
<?php
include("db.php");

$sql = "SELECT * FROM contact ORDER BY created_at DESC";
$result = $conn->query($sql);
?>


