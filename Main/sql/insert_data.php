<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$dbname = "f32ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/* The SQL query must be quoted in PHP
String values inside the SQL query must be quoted
Numeric values must not be quoted
The word NULL must not be quoted*/


$sql = "INSERT INTO PizzaDB (item, price)
VALUES ('Hawaiian', '2.00'),('Pepporini', '2.00'),('Mozzarella', '3.00'),
('Mexican', '4.75'),('Cheesy Chicken','5.75'), ('beef', '7.99'), ('Delivery Fee', '2.00')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
