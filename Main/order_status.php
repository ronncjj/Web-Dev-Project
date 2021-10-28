<!DOCTYPE html>
<html lang="en">

<?php
// $_SESSION = array();
// for ($i = 1; $i < 7; $i++) {
//     unset($_SESSION['item_qty_' . $i]);
// }
// for ($i = 1; $i < 7; $i++) {
//     echo "<br>";
//     echo $_SESSION['item_qty_' . $i];
// }
session_start();
$id = session_id();
session_destroy();
$id = session_id();

// session_unset();

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
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="index.html#intro">ABOUT</a></li>
                    <li><a href="index.html#outlet">OULET</a></li>
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
                    <th>Items</th>
                    <th>QTY</th>
                    <th>Final Price</th>
                </tr>
                <tr>
                    <td>&nbsp</td>
                </tr>
                <tr>
                    <td>Ronn's Choice</td>
                    <td>1</td>
                    <td>$5.00</td>
                </tr>
                <tr>
                    <td>Ronn's Choice</td>
                    <td>1</td>
                    <td>$5.00</td>
                </tr>
                <tr>
                    <td>Ronn's Choice</td>
                    <td>1</td>
                    <td>$5.00</td>
                </tr>
                <tr>
                    <td>Ronn's Choice</td>
                    <td>1</td>
                    <td>$5.00</td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                </tr>
                <tr>
                    <td class="strong">Sub Total</td>
                    <td>&nbsp</td>
                    <td class="strong" id="sub_total_cell">$20.00</td>
                </tr>
                <tr>
                    <td class="strong">Delivery fee</td>
                    <td>&nbsp</td>
                    <td class="strong" id="delivery_cell">$2.00</td>
                </tr>
                <tr>
                    <td class="strong" id="coupon_code_title">Coupon Code 'ntunew21'</td>
                    <td>&nbsp</td>
                    <td class="strong" id="coupon_code_cell">
                        - $5.00
                    </td>
                </tr>
                <tr>
                    <td class="strong">Grand Total</td>
                    <td>&nbsp</td>
                    <td class="strong" id="grand_total_cell">$20.00</td>
                </tr>
            </table>
        </div>
        <script type="text/javascript" src="order_status.js"></script>
    </div>
</body>

</html>