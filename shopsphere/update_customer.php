<?php
require 'db_connect.php'; // Make sure this points correctly to your database connection script

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $customerID = $_POST['customerID'];
    $customerName = $conn->real_escape_string($_POST['customerName']);
    $emailAddress = $conn->real_escape_string($_POST['emailAddress']);
    $shippingAddress = $conn->real_escape_string($_POST['shippingAddress']);
    $billingAddress = $conn->real_escape_string($_POST['billingAddress']);
    $paymentInformation = $conn->real_escape_string($_POST['paymentInformation']);

    // Prepare an update statement
    $sql = "UPDATE Customer SET 
            CustomerName='$customerName', 
            EmailAddress='$emailAddress', 
            ShippingAddress='$shippingAddress', 
            BillingAddress='$billingAddress', 
            PaymentInformation='$paymentInformation' 
            WHERE CustomerID=$customerID";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "No data submitted.";
}

$conn->close();
?>
