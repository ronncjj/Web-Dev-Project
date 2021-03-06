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

// sql to create table
$sql = "CREATE TABLE PizzaDB (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
item VARCHAR(30) NOT NULL,
price DECIMAL(30,2) NOT NULL
)";

$sql1 = "CREATE TABLE PizzaQty (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_1 INT(20) NOT NULL,
    item_2 INT(20) NOT NULL,
    item_3 INT(20) NOT NULL,
    item_4 INT(20) NOT NULL,
    item_5 INT(20) NOT NULL,
    item_6 INT(20) NOT NULL
)";

$sql2 = "CREATE TABLE CustInfo (
    orderID  INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    custName VARCHAR(80) NOT NULL,
    custEmail VARCHAR (80) NOT NULL,
    custAddress VARCHAR (150) NOT NULL,
    item_1_qty INT(6) NOT NULL,
    item_2_qty INT(6) NOT NULL,
    item_3_qty INT(6) NOT NULL,
    item_4_qty INT(6) NOT NULL,
    item_5_qty INT(6) NOT NULL,
    item_6_qty INT(6) NOT NULL,
    discount DECIMAL(6) NOT NULL,
    totalPrice DECIMAL(6) NOT NULL
)";

/* NOT NULL - Each row must contain a value for that column, null values are not allowed
DEFAULT value - Set a default value that is added when no other value is passed
UNSIGNED - Used for number types, limits the stored data to positive numbers and zero
AUTO INCREMENT - MySQL automatically increases the value of the field by 1 each time a new record is added
PRIMARY KEY - Used to uniquely identify the rows in a table. The column with PRIMARY KEY setting is often an ID number, and is often used with AUTO_INCREMENT
*/


if (mysqli_query($conn, $sql)) {
    echo "Table PizzaDB created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
if (mysqli_query($conn, $sql1)) {
    echo "Table PizzaQty created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
if (mysqli_query($conn, $sql2)) {
    echo "Table CustInfo created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
