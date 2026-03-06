<?php
$conn = mysqli_connect("localhost", "root", "", "smart_health");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>
