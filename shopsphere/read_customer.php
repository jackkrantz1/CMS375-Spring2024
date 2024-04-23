<?php
require 'db_connect.php'; // Ensure this points to the correct file where you establish a database connection

// Start HTML output
echo "<!DOCTYPE html>
<html>
<head>
    <title>List of Customers</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .add-button {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h2>List of Customers</h2>
<a href='add_customer.html'><button class='add-button'>Add New Customer</button></a>";

// SQL to fetch all customer records
$sql = "SELECT CustomerID, CustomerName, EmailAddress, ShippingAddress, BillingAddress, PaymentInformation FROM Customer";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Table headers
    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Shipping Address</th><th>Billing Address</th><th>Payment Information</th><th>Actions</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["CustomerID"]."</td><td>".$row["CustomerName"]."</td><td>".$row["EmailAddress"]."</td><td>".$row["ShippingAddress"]."</td><td>".$row["BillingAddress"]."</td><td>".$row["PaymentInformation"]."</td><td><a href='update_customer_form.php?id=".$row["CustomerID"]."'>Edit</a> | <a href='delete_customer.php?id=".$row["CustomerID"]."' onclick='return confirm(\"Are you sure you want to delete this customer?\")'>Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "No customers found.";
}

// End HTML output
echo "</body></html>";

$conn->close();
?>
