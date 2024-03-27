<?php
require 'db_connect.php'; // Ensure this points to your database connection script

// Check if 'id' is set in the URL and it is a number
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Get the customer ID
    $customerID = $_GET['id'];

    // Prepare the SQL statement to delete the customer
    $sql = "DELETE FROM Customer WHERE CustomerID = $customerID";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Customer deleted successfully.";
        // Optionally, redirect back to the customer list page or home page
        // header("Location: your_customer_list_page.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
