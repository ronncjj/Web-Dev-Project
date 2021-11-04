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
$sql = "SELECT id, item, price FROM PizzaDB";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["id"] == 1) {
            $name_1 = $row["item"];
            $price_1 = $row["price"];
        }
        if ($row["id"] == 2) {
            $name_2 = $row["item"];
            $price_2 = $row["price"];
        }
        if ($row["id"] == 3) {
            $name_3 = $row["item"];
            $price_3 = $row["price"];
        }
        if ($row["id"] == 4) {
            $name_4 = $row["item"];
            $price_4 = $row["price"];
        }
        if ($row["id"] == 5) {
            $name_5 = $row["item"];
            $price_5 = $row["price"];
        }                  // $price_1 = $row["price"];
        if ($row["id"] == 6) {
            $name_6 = $row["item"];
            $price_6 = $row["price"];
        }
        if ($row["id"] == 7) {
            $delivery_fee = $row["item"];
            $delivery = $row["price"];
        }
    }
} else {
    echo "0 results id=", $row["id"];
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
}
?>

<?php
$NameArray = [$name_1, $name_2, $name_3, $name_4, $name_5, $name_6];
$QtyArray = [$item_qty_1, $item_qty_2, $item_qty_3, $item_qty_4, $item_qty_5, $item_qty_6];
$PriceArray = [$price_1, $price_2, $price_3, $price_4, $price_5, $price_6];

$receiptString = "\n" . 'Order Receipt:';
for ($i = 0; $i < count($QtyArray); $i++) {
    if ($QtyArray[$i] != 0) {
        $receiptString = $receiptString . "\n" .
            $NameArray[$i] . ': ' . $QtyArray[$i];
    }
}

$to      = "f32ee@localhost";
$subject = 'Pizza Order Confirmation #' . substr(md5($_SESSION['orderID']), 0, 4);
$message = 'Thank you ' . $custName_1 . ' for ordering from R & J Pizza Place!'
    . "\n"
    . "\n"
    . 'Address:'
    . "\n"
    . $custAddress_1
    . "\n"
    . $receiptString
    . "\n"
    . "\n"
    . 'Grand Total: $' . $grandTotal
    . "\n"
    . "\n"
    . 'You can expect delivery within 18 - 26 minutes.';

$headers = 'From: f32ee@localhost' . "\r\n" .
    'Reply-To: f32ee@localhost' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers, '-ff32ee@localhost');
// echo ("mail sent to : ".$to);
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