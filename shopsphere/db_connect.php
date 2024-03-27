<?php
$servername = "localhost";
$username = "root"; // Your MySQL username, 'root' is the default for XAMPP
$password = "3541"; // Your MySQL password, default is no password in XAMPP
$dbname = "shopsphere"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>