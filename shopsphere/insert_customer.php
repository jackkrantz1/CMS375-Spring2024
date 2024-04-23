<?php
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerName = mysqli_real_escape_string($conn, $_POST['customerName']);
    $emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);
    $shippingAddress = mysqli_real_escape_string($conn, $_POST['shippingAddress']);
    $billingAddress = mysqli_real_escape_string($conn, $_POST['billingAddress']);
    $paymentInformation = mysqli_real_escape_string($conn, $_POST['paymentInformation']);

    $sql = "INSERT INTO Customer (CustomerName, EmailAddress, ShippingAddress, BillingAddress, PaymentInformation) 
    VALUES (?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $customerName, $emailAddress, $shippingAddress, $billingAddress, $paymentInformation);

    if ($stmt->execute()) {
        echo "New record created successfully.";
        // Redirect back to the main customer page
        header("Location: read_customer.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No data submitted.";
}
?>
