<?php
require 'db_connect.php'; // Make sure this points correctly to your database connection script

// Check if 'id' is set in the URL
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Get the customer ID from the URL
    $customerID = $_GET['id'];

    // Prepare SQL to fetch the customer's data
    $sql = "SELECT * FROM Customer WHERE CustomerID = $customerID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the customer's data
        $row = $result->fetch_assoc();
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title>Edit Customer</title>
        </head>
        <body>

        <h2>Edit Customer</h2>

        <form action="update_customer.php" method="post">
            <input type="hidden" name="customerID" value="<?php echo $row['CustomerID']; ?>">
            <label for="customerName">Name:</label><br>
            <input type="text" id="customerName" name="customerName" value="<?php echo $row['CustomerName']; ?>" required><br>
            
            <label for="emailAddress">Email:</label><br>
            <input type="email" id="emailAddress" name="emailAddress" value="<?php echo $row['EmailAddress']; ?>" required><br>
            
            <label for="shippingAddress">Shipping Address:</label><br>
            <input type="text" id="shippingAddress" name="shippingAddress" value="<?php echo $row['ShippingAddress']; ?>" required><br>
            
            <label for="billingAddress">Billing Address:</label><br>
            <input type="text" id="billingAddress" name="billingAddress" value="<?php echo $row['BillingAddress']; ?>" required><br>
            
            <label for="paymentInformation">Payment Information:</label><br>
            <input type="text" id="paymentInformation" name="paymentInformation" value="<?php echo $row['PaymentInformation']; ?>" required><br>
            
            <input type="submit" value="Update">
        </form>

        </body>
        </html>

        <?php
    } else {
        echo "No customer found with ID $customerID";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
