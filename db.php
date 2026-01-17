<?php
$servername = "localhost";
$username = "mark";
$password = "1234";
$dbname = "user_portal";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

