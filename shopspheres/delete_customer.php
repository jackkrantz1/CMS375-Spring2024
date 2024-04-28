<?php
require 'db_connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $customerID = $_GET['id'];

    $sql = "DELETE FROM Customer WHERE CustomerID=?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $customerID);
        if ($stmt->execute()) {
            echo "Customer deleted successfully.";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    $conn->close();
    header("Location: read_customer.php"); // Redirect back to the main customer page
    exit;
} else {
    echo "Invalid request.";
}
?>