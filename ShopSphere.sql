drop database if exists shopsphere;
create database shopsphere;
use shopsphere;

CREATE TABLE Customer (
    CustomerID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerName VARCHAR(255) NOT NULL,
    EmailAddress VARCHAR(255) NOT NULL,
    ShippingAddress VARCHAR(255),
    BillingAddress VARCHAR(255),
    PaymentInformation VARCHAR(255)
);

INSERT INTO Customer (CustomerName, EmailAddress, ShippingAddress, BillingAddress, PaymentInformation) VALUES
('John Doe', 'johndoe@example.com', '1234 North Ave, Anytown, USA', '1234 North Ave, Anytown, USA', 'Visa **** **** **** 1234'),
('Jane Smith', 'janesmith@example.com', '5678 South St, Othertown, USA', '5678 South St, Othertown, USA', 'MasterCard **** **** **** 5678'),
('Alice Johnson', 'alicej@example.com', '4321 West Lane, Westcity, USA', '4321 West Lane, Westcity, USA', 'Visa **** **** **** 4321'),
('Bob Brown', 'bobbrown@example.com', '8765 East Road, Eastville, USA', '8765 East Road, Eastville, USA', 'MasterCard **** **** **** 8765'),
('Carol Taylor', 'carolt@example.com', '1111 Maple Street, Centertown, USA', '1111 Maple Street, Centertown, USA', 'Visa **** **** **** 1111'),
('David Wilson', 'davidw@example.com', '2222 Oak Avenue, Northtown, USA', '2222 Oak Avenue, Northtown, USA', 'MasterCard **** **** **** 2222'),
('Eva Green', 'evagreen@example.com', '3333 Pine Road, Southcity, USA', '3333 Pine Road, Southcity, USA', 'Visa **** **** **** 3333'),
('Frank Wright', 'frankw@example.com', '4444 Cedar Blvd, Easttown, USA', '4444 Cedar Blvd, Easttown, USA', 'MasterCard **** **** **** 4444'),
('Gina Harris', 'ginah@example.com', '5555 Spruce Lane, Westville, USA', '5555 Spruce Lane, Westville, USA', 'Visa **** **** **** 5555'),
('Henry Ford', 'henryf@example.com', '6666 Birch Street, Centerville, USA', '6666 Birch Street, Centerville, USA', 'MasterCard **** **** **** 6666');



CREATE TABLE Category (
    CategoryID INT AUTO_INCREMENT PRIMARY KEY,
    CategoryName VARCHAR(255) NOT NULL
);

INSERT INTO Category (CategoryName) VALUES
('Electronics'),
('Books'),
('Kitchenware'),
('Fitness Equipment'),
('Apparel'),
('Beauty Products'),
('Gaming'),
('Outdoor'),
('Home Office'),
('Toys & Games');



CREATE TABLE Product (
    ProductID INT AUTO_INCREMENT PRIMARY KEY,
    ProductName VARCHAR(255) NOT NULL,
    Price DECIMAL(10,2) NOT NULL,
    StockQuantity INT NOT NULL,
    Description TEXT,
    CategoryID INT,
    FOREIGN KEY (CategoryID) REFERENCES Category(CategoryID)
);

INSERT INTO Product (ProductName, Price, StockQuantity, Description, CategoryID) VALUES
('4K LED Smart TV', 1200.00, 30, '55-inch high-definition smart TV with HDR', 1),
('Bluetooth Speaker', 150.00, 75, 'Portable Bluetooth speaker with 360-degree sound', 1),
('Laptop', 950.00, 45, '15-inch laptop with 8GB RAM and 256GB SSD', 1),
('Smartphone', 800.00, 50, 'Latest model with 5G connectivity', 1),
('E-Reader', 130.00, 80, 'E-ink display for reading books', 2),
('Fantasy Novel', 25.00, 100, 'Bestselling fantasy novel by renowned author', 2),
('Cookware Set', 100.00, 40, 'Stainless steel cookware set with non-stick coating', 3),
('Coffee Maker', 90.00, 60, 'Programmable coffee maker with 12-cup capacity', 3),
('Yoga Mat', 20.00, 85, 'Eco-friendly yoga mat with non-slip surface', 4),
('Running Shoes', 120.00, 90, 'Lightweight running shoes with cushioned soles', 4);


CREATE TABLE OrderTable (
    OrderID INT AUTO_INCREMENT PRIMARY KEY,
    ProductID INT,
    Quantity INT NOT NULL,
    Price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (ProductID) REFERENCES Product(ProductID)
);

INSERT INTO OrderTable (ProductID, Quantity, Price) VALUES
(1, 2, 2400.00),
(2, 1, 150.00),
(3, 1, 950.00),
(4, 1, 800.00),
(5, 2, 260.00),
(6, 3, 75.00),
(7, 1, 100.00),
(8, 2, 180.00),
(9, 1, 20.00),
(10, 1, 120.00);



CREATE TABLE Shipping (
    ShippingID INT AUTO_INCREMENT PRIMARY KEY,
    OrderID INT,
    Carrier VARCHAR(255),
    TrackingNumber VARCHAR(255),
    EstimatedDeliveryDate DATE,
    FOREIGN KEY (OrderID) REFERENCES OrderTable(OrderID)
);

INSERT INTO Shipping (OrderID, Carrier, TrackingNumber, EstimatedDeliveryDate) VALUES
(1, 'FedEx', 'FDX123456', '2023-04-15'),
(2, 'UPS', 'UPS654321', '2023-04-16'),
(3, 'USPS', 'USPS00001', '2023-04-17'),
(4, 'DHL', 'DHL890123', '2023-04-18'),
(5, 'FedEx', 'FDX123457', '2023-04-19'),
(6, 'UPS', 'UPS654322', '2023-04-20'),
(7, 'USPS', 'USPS00002', '2023-04-21'),
(8, 'DHL', 'DHL890124', '2023-04-22'),
(9, 'FedEx', 'FDX123458', '2023-04-23'),
(10, 'UPS', 'UPS654323', '2023-04-24');



CREATE TABLE PaymentTransactions (
    TransactionID INT AUTO_INCREMENT PRIMARY KEY,
    OrderID INT,
    PaymentAmount DECIMAL(10,2) NOT NULL,
    Date DATE NOT NULL,
    Method VARCHAR(255),
    Status VARCHAR(255),
    FOREIGN KEY (OrderID) REFERENCES OrderTable(OrderID)
);

INSERT INTO PaymentTransactions (OrderID, PaymentAmount, Date, Method, Status) VALUES
(1, 2400.00, '2023-04-01', 'Credit Card', 'Completed'),
(2, 150.00, '2023-04-02', 'PayPal', 'Completed'),
(3, 950.00, '2023-04-03', 'Credit Card', 'Completed'),
(4, 800.00, '2023-04-04', 'Debit Card', 'Completed'),
(5, 260.00, '2023-04-05', 'Credit Card', 'Completed'),
(6, 75.00, '2023-04-06', 'Bank Transfer', 'Completed'),
(7, 100.00, '2023-04-07', 'PayPal', 'Completed'),
(8, 180.00, '2023-04-08', 'Credit Card', 'Completed'),
(9, 20.00, '2023-04-09', 'Debit Card', 'Completed'),
(10, 120.00, '2023-04-10', 'Credit Card', 'Completed');


SELECT * FROM Customer;
