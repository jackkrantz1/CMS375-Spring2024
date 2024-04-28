<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'db_connect.php'; // Ensure this points to the correct file where you establish a database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check and sanitize input before insertion
    $customerName = isset($_POST['customerName']) ? mysqli_real_escape_string($conn, $_POST['customerName']) : '';
    $emailAddress = isset($_POST['emailAddress']) ? mysqli_real_escape_string($conn, $_POST['emailAddress']) : '';
    $shippingAddress = isset($_POST['shippingAddress']) ? mysqli_real_escape_string($conn, $_POST['shippingAddress']) : '';
    $billingAddress = isset($_POST['billingAddress']) ? mysqli_real_escape_string($conn, $_POST['billingAddress']) : '';
    $paymentInformation = isset($_POST['paymentInformation']) ? mysqli_real_escape_string($conn, $_POST['paymentInformation']) : '';

    // Prepare SQL and bind parameters
    $sql = "INSERT INTO Customer (CustomerName, EmailAddress, ShippingAddress, BillingAddress, PaymentInformation) 
    VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssss", $customerName, $emailAddress, $shippingAddress, $billingAddress, $paymentInformation);
        if ($stmt->execute()) {
            echo "New record created successfully.";
            header("Location: read_customer.php"); // Redirect back to the main customer page
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    $conn->close();
} else {
    echo "No data submitted.";
}
?>
