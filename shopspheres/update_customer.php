<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerID = $_POST['customerID'];
    $customerName = mysqli_real_escape_string($conn, $_POST['customerName']);
    $emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);
    $shippingAddress = mysqli_real_escape_string($conn, $_POST['shippingAddress']);
    $billingAddress = mysqli_real_escape_string($conn, $_POST['billingAddress']);
    $paymentInformation = mysqli_real_escape_string($conn, $_POST['paymentInformation']);

    $sql = "UPDATE Customer SET 
            CustomerName=?, 
            EmailAddress=?, 
            ShippingAddress=?, 
            BillingAddress=?, 
            PaymentInformation=? 
            WHERE CustomerID=?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssi", $customerName, $emailAddress, $shippingAddress, $billingAddress, $paymentInformation, $customerID);
        if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    $conn->close();
    header("Location: read_customer.php"); // Redirect back to the main customer page
    exit;
} else {
    echo "No data submitted.";
}
?>