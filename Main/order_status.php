<!DOCTYPE html>
<html lang="en">

<?php
session_start();
// Converting order ID to MD5 format, catches from order_track.php    
if (!isset($_SESSION['orderID'])) {
    $_SESSION['orderID'] = $_POST['tracking_id'];
} // This loop catches refresh on the same page, if coming from Making an order
elseif (isset($_SESSION['errorKey'])) {
    $_SESSION['orderID'] = $_SESSION['orderID'];
} // This loop catches confirm_order.php -> route_confirm_order.php
elseif (isset($_SESSION['orderID']) && !isset($_POST['tracking_id'])) {
    $_SESSION['orderID'] = substr(md5($_SESSION['orderID']), 0, 4);
}
?>

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
        }
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

$arrayName = [$name_1, $name_2, $name_3, $name_4, $name_5, $name_6];
$arrayPrice = [$price_1, $price_2, $price_3, $price_4, $price_5, $price_6];
$arraySum = [];
?>

<?php

$sqlDB = "SELECT orderID, item_1_qty, item_2_qty, item_3_qty, item_4_qty, item_5_qty,
item_6_qty, discount, totalPrice FROM CustInfo";
$resultDB = mysqli_query($conn, $sqlDB);
// mysqli_close($conn);
if (mysqli_num_rows($resultDB) > 0) {
    // Checker key
    $_SESSION['errorKey'] = 1;
    while ($row = mysqli_fetch_assoc($resultDB)) {
        if (substr(md5($row["orderID"]), 0, 4) == $_SESSION['orderID']) {
            $orderID = $_SESSION['orderID'];
            $qty_1 = $row["item_1_qty"];
            $qty_2 = $row["item_2_qty"];
            $qty_3 = $row["item_3_qty"];
            $qty_4 = $row["item_4_qty"];
            $qty_5 = $row["item_5_qty"];
            $qty_6 = $row["item_6_qty"];
            $discount = $row["discount"];
            $totalPrice = $row["totalPrice"];
            $_SESSION['errorKey'] = 0;
        }
    }
    // In the case where no order was found.
    if ($_SESSION['errorKey'] == 1) {
        header("Location: order_track.php");
    }
}
$QtyArray = [$qty_1, $qty_2, $qty_3, $qty_4, $qty_5, $qty_6];
?>



<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/order_status.css'>
    <title>R&J Pizza Place</title>
</head>

<body>
    <div id="grid">
        <div class="item item1" id="scrolling-bar">
            <p>Hand-tossed and Oven Fresh. R&J Pizza Place serves freshly baked pizza!</p>
        </div>

        <div class="item item2 navigation leftNav">
            <nav id="leftNav" class="topnav">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="index.php#intro">ABOUT</a></li>
                    <li><a href="index.php#outlet">OULET</a></li>
                </ul>
            </nav>
        </div>

        <div class="item header">
            <h1>ORDER STATUS</h1>
        </div>

        <div class="item order_arrival">
            <div class="order_arrival_content_left">
                <img src="./media/cooking1.svg" alt="">
            </div>
            <div class="order_arrival_content_right">
                <img src="./media/map2.png" alt="">
            </div>
        </div>

        <div class="item order_list">
            <table>
                <tr>
                    <th style="text-align: center;" colspan="3" class="order-numb">
                        Order Number #: <?php echo $orderID ?>
                    </th>
                </tr>
                <tr class="blank_row">
                    <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                </tr>
                <tr>

                    <th>Items</th>
                    <th>QTY</th>
                    <th>Final Price</th>
                </tr>
                <tr>
                    <td>&nbsp</td>
                </tr>
                <tr>
                    <?php
                    for ($i = 0; $i < count($QtyArray); $i++) {
                        if ($QtyArray[$i] != 0) {
                            echo "<tr>";
                            echo "<td>" . $arrayName[$i] . "</td>";
                            echo "<td>" . $QtyArray[$i] . "</td>";
                            echo "<td>$" . $arraySum[$i] = number_format($arrayPrice[$i] * $QtyArray[$i], 2) . "</td>";
                            echo "<tr>";
                        }
                    }
                    ?>
                </tr>
                <tr class="blank_row">
                    <td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
                </tr>
                <tr>

                    <td class="strong">Sub Total</td>
                    <td>&nbsp</td>
                    <td class="strong" id="sub_total_cell">$
                        <?php
                        // $total_new = 0;

                        for ($i = 0; $i < count($QtyArray); $i++) {
                            // echo $arraySum;
                            $total = number_format($arrayPrice[$i] * $QtyArray[$i], 2);
                            $total_new += $total;
                            // echo number_format($total_new, 2);
                        }
                        echo number_format($total_new, 2);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="strong">Delivery fee</td>
                    <td>&nbsp</td>
                    <td class="strong" id="delivery_cell">$2.00</td>
                </tr>
                <tr>
                    <td class="strong" id="coupon_code_title">Coupon Code </td>
                    <td>&nbsp</td>
                    <td class="strong" id="coupon_code_cell">
                        $<?php echo $discount ?>
                    </td>
                </tr>
                <tr>
                    <td class="strong">Grand Total</td>
                    <td>&nbsp</td>
                    <td class="strong" id="grand_total_cell">$<?php echo $totalPrice ?></td>
                </tr>
            </table>
        </div>
        <script type="text/javascript" src="order_status.js"></script>
    </div>
    <?php
    // // Destroy session if not rerouted
    // if ($key != 0) {
    //     session_destroy();
    // }   
    ?>
</body>

</html>