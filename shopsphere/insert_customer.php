<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


require 'db_connect.php'; // Include the database connection



// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $customerName = mysqli_real_escape_string($conn, $_POST['customerName']);
    $emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);
    $shippingAddress = mysqli_real_escape_string($conn, $_POST['shippingAddress']);
    $billingAddress = mysqli_real_escape_string($conn, $_POST['billingAddress']);
    $paymentInformation = mysqli_real_escape_string($conn, $_POST['paymentInformation']);

    // Prepare SQL and bind parameters
    $sql = "INSERT INTO Customer (CustomerName, EmailAddress, ShippingAddress, BillingAddress, PaymentInformation) 
    VALUES (?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $customerName, $emailAddress, $shippingAddress, $billingAddress, $paymentInformation);

    if ($stmt->execute()) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No data submitted.";
}
?>