<!DOCTYPE html>
<html lang="en">

<?php session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (isset($_GET['empty'])) {
    unset($_SESSION['cart']);
    header('location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>

<?php
if (isset($_POST['submit'])) {
    $_SESSION["item_qty_1"] = $_POST['item1'];
    $_SESSION["item_qty_2"] = $_POST['item2'];
    $_SESSION["item_qty_3"] = $_POST['item3'];
    $_SESSION["item_qty_4"] = $_POST['item4'];
    $_SESSION["item_qty_5"] = $_POST['item5'];
    $_SESSION["item_qty_6"] = $_POST['item6'];

    if ($_POST['item6'] == 0 and $_POST['item5'] == 0 and $_POST['item4'] == 0 and $_POST['item3'] == 0 and $_POST['item2'] == 0 and $_POST['item1'] == 0) {
        // Pass alert to menu.php for javascript to parse
        // 1 : alert, 1 : no
        $_SESSION["alert"] = 1;
        header("Location: menu.php");
    } else {
        $_SESSION["alert"] = 0;
    }
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
// echo $price_1;

$arrayName = [$name_1, $name_2, $name_3, $name_4, $name_5, $name_6];
$arrayPrice = [$price_1, $price_2, $price_3, $price_4, $price_5, $price_6];
$arraySum = [];
?>

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/confirm_order.css'>
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
            <h1>ORDER CONFIRMATION</h1>
        </div>

        <div class="item order_list">
            <table>
                <tr>
                    <th>Items</th>
                    <th>Qty</th>
                    <th>Final Price</th>
                </tr>
                <tr>
                    <td>&nbsp</td>
                </tr>

                <?php
                for ($i = 1; $i < 7; $i++) {
                    if ($_SESSION['item_qty_' . $i] != 0) {
                        echo "<tr>";
                        echo "<td>" . $arrayName[$i - 1] . "</td>";
                        echo "<td>" . $_SESSION['item_qty_' . $i] . "</td>";
                        echo "<td>$" . $arraySum[$i - 1] = number_format($arrayPrice[$i - 1] * $_SESSION['item_qty_' . $i], 2) . "</td>";
                        echo "<tr>";
                    } else {
                        // $_SESSION['item_qty_' . $i] = 0;
                        $arraySum[$i - 1] = 0;
                    }
                }
                ?>
                <tr>
                    <td>&nbsp</td>
                </tr>
                <tr>
                    <td class="strong">Sub Total</td>
                    <td>&nbsp</td>
                    <td class="strong" id="sub_total_cell">$
                        <?php
                        // $total_new = 0;

                        for ($i = 1; $i < 7; $i++) {
                            // echo $arraySum;
                            $total = number_format($arrayPrice[$i - 1] * $_SESSION['item_qty_' . $i], 2);
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
                    <td class="strong" id="delivery_cell">$<?php echo $delivery ?></td>
                </tr>
                <tr>
                    <td class="strong" id="coupon_code_title">Coupon Code</td>
                    <td>&nbsp</td>
                    <td class="strong" id="coupon_code_cell">
                        <input type="text" id="coupon_code_input">
                    </td>
                </tr>
                <tr>
                    <!-- Addition of coupon code + delivery fee + $total_new -->
                    <td class="strong">Grand Total</td>
                    <td>&nbsp</td>
                    <td class="strong" id="grand_total_cell">$20.00</td>
                </tr>
            </table>
        </div>

        <div class="item info_grid">
            <div class="contact_information">
                <h2>Customer information</h2>
                <form action="show_post.php" method="post">
                    <div id="contact_name" class="contact_div">
                        <table>
                            <tr>
                                <td>
                                    <label for="name">Name:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="contact_name_input" type="text" name="name" required align="center"></input>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div id="contact_email" class="contact_div">
                        <table>
                            <tr>
                                <td>
                                    <label for="email">Email:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id='contact_email_input' type="email" name="email" required align="center"></input>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div id="shipping_address" class="contact_div">
                        <table>
                            <tr>
                                <td>
                                    <label for="address">Address:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea id="shipping_address_textarea" name="address" required align="center"></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div class="checkbox_contact">
                        <table>
                            <tr>
                                <td>
                                    <label for="name_same">Payment Name same as Customer Name</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="name_same" name="name_same" checked='true'>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="checkbox_contact">
                        <table>
                            <tr>
                                <td>
                                    <label for="address_same">Payment Address same as Customer Address</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="address_same" name="address_same" checked='true'>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                </form>
            </div>

            <div class="payment_info">
                <h2>Payment details</h2>
                <form action="show_post.php" method="post">
                    <div id="payment_name" class="contact_div">
                        <table>
                            <tr>
                                <td>
                                    <label for="payment_name_input">Name on card:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="payment_name_input" type="text" name="name" required align="center"></input>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div id="payment_cardNumber" class="contact_div">
                        <table>
                            <tr>
                                <td>
                                    <label for="cardNumber">Card Number:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id='cardNumber' type="text" name="cardNumber" maxlength="16" required align="center"></input>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div id="payment_cardCV2" class="contact_div">
                        <table>
                            <tr>
                                <td>
                                    <label for="cardCV2">CV2:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id='cardCV2' type="text" name="cardCV2" maxlength="3" required align="center"></input>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div id="payment_cardMonth" class="contact_div">
                        <table>
                            <tr>
                                <td>
                                    <label for="cardMonth">Card Expiry (Month):</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- <input placeholder="MTH" id='cardMonth' type="text" name="cardMonth" required
                                        align="center"> -->
                                    <select id="cardMonth" name="cardMonth" required align="center">
                                        <option value="january">January</option>
                                        <option value="february">February</option>
                                        <option value="march">March</option>
                                        <option value="april">April</option>
                                        <option value="may">May</option>
                                        <option value="june">June</option>
                                        <option value="july">July</option>
                                        <option value="august">August</option>
                                        <option value="september">September</option>
                                        <option value="october">October</option>
                                        <option value="november">November</option>
                                        <option value="december">December</option>
                                    </select>
                                    <!-- </input> -->
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="payment_cardYear" class="contact_div">
                        <table>
                            <tr>
                                <td>
                                    <label for="cardYear">Card Expiry</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input placeholder="YEAR" id='cardYear' type="text" name="cardYear" required maxlength="4" align="center"></input>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div id="billing_address" class="contact_div">
                        <table>
                            <tr>
                                <td>
                                    <label for="payment_address">Billing Address:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea id="billing_address_textarea" name="payment_address" required align="center"></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
    <div class="bottom_left_button">
        <div class="submit_order">
            <a class="button" href="menu.php">Back to menu ↗</a>
        </div>
    </div>
    <div class="bottom_right_button">
        <div class="submit_order">
            <a class="button" id="confirm_order_button">Confirm Order ↗</a>
        </div>
    </div>
    <form action="route_confirm_order.php" method="POST" id="confirm_order_form">
        <div class="submit_order">
            <input type="hidden" name="custName_1" id="custName_1">
            <input type="hidden" name="custEmail_1" id="custEmail_1">
            <input type="hidden" name="custAddress_1" id="custAddress_1">
            <!-- Voucher discount $$ -->
            <input type="hidden" name="discount" id="discount" value='0'> <!-- Voucher discount $$ -->
            <!-- Total Price = Grand Total -->
            <input type="hidden" name="grandTotal" id="grandTotal" value='0'>
        </div>
    </form>


    <script type="text/javascript" src="confirm_order.js"></script>

</body>

</html>