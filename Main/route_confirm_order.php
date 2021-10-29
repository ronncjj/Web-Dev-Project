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
?>

<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (isset($_GET['buy'])) {
    $_SESSION['cart'][] = $_GET['buy'];
    header('location: ' . $_SERVER['PHP_SELF'] . '?' . SID);
    exit();
}
?>

<?php
if (isset($_POST['custName_1'])) {
    $custName_1 = $_POST['custName_1'];
    $custEmail_1 = $_POST['custEmail_1'];
    $custAddress_1 = $_POST['custAddress_1'];
    $item_qty_1 = $_SESSION['item_qty_1'];
    $item_qty_2 = $_SESSION['item_qty_2'];
    $item_qty_3 = $_SESSION['item_qty_3'];
    $item_qty_4 = $_SESSION['item_qty_4'];
    $item_qty_5 = $_SESSION['item_qty_5'];
    $item_qty_6 = $_SESSION['item_qty_6'];
    $discount = $_POST['discount'];
    $grandTotal = $_POST['grandTotal'];

    $sql2 = "INSERT INTO CustInfo SET 
                    custName = '$custName_1', 
                    custEmail = '$custEmail_1', 
                    custAddress = '$custAddress_1',
                    item_1_qty = '$item_qty_1',
                    item_2_qty = '$item_qty_2',
                    item_3_qty = '$item_qty_3',
                    item_4_qty = '$item_qty_4',
                    item_5_qty = '$item_qty_5',
                    item_6_qty = '$item_qty_6',
                    discount = '$discount',
                    totalPrice = '$grandTotal'
                    ";
    if (mysqli_query($conn, $sql2)) {
        $last_id2 = mysqli_insert_id($conn);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $orderID = $last_id2;
    $_SESSION['orderID'] = $orderID;
    // $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
    <script src='main.js'></script>
    <title>R&J Pizza Place</title>

    <title>Document</title>
</head>

<body>
    <?php
    echo "TEST TEST TEST TEST TEST TEST ";
    echo $custName_1;
    echo "<br>";
    echo $custEmail_1;
    echo "<br>";
    echo $custAddress_1;
    echo "<br>";
    echo $item_qty_1;
    echo "<br>";
    echo $item_qty_2;
    echo "<br>";
    echo $item_qty_3;
    echo "<br>";
    echo $item_qty_4;
    echo "<br>";
    echo $item_qty_5;
    echo "<br>";
    echo $item_qty_6;
    echo "<br>";
    echo $discount;
    echo "<br>";
    echo $grandTotal;
    header("Location: order_status.php");
    die();
    ?>
</body>

</html>