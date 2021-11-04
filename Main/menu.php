<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/menu.css'>
    <title>R&J Pizza Place</title>
</head>

<body>
    <!-- METADATA HANDLING -->
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

            <!-- Session begin -->
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
            // Error handling
            if ($_SESSION["alert"] == 1) {
                echo '<input id="alert" type="hidden" name="alert" value="1">';
                $_SESSION["alert"] = 0;
            } else {
                echo '<input type="hidden" id="alert" name="alert" value="0">';
                $_SESSION["alert"] = 0;
            }
            ?>
            <h1>ORDER MENU</h1>
        </div>

        <div class="item menu_item1 menu_item">
            <table class="our-choice-table">
                <tr class="choice-desc">
                    <th class="choice-title" id="choice_1"><?php echo $name_1 ?></th>
                </tr>
                <tr>
                    <th>
                        <div class="price_tag">
                            <p id="price_1">$<?php echo $price_1 ?></p>
                        </div>
                        <img src="./media/meatzza.jpg" class="choice-img" alt="">
                    </th>
                </tr>
                <tr>
                    <th class="addtocart">
                        <span id="minus_1" class="minus">-</span>
                        <span id="amount_1" class="amount">
                            <?php
                            if ($_SESSION['item_qty_1'] != 0) {
                                echo $_SESSION['item_qty_1'];
                            } else {
                                echo 0;
                            }
                            ?>
                        </span>
                        <span id="plus_1" class="plus">+</span>
                    </th>
                </tr>
            </table>
        </div>

        <div class="item menu_item2 menu_item">
            <table class="our-choice-table">
                <tr class="choice-desc">
                    <th class="choice-title" id="choice_2"><?php echo $name_2 ?></th>
                </tr>
                <tr>
                    <th>
                        <div class="price_tag">
                            <p id="price_2">$<?php echo $price_2 ?></p>
                        </div>
                        <img src="./media/meatzza.jpg" class="choice-img" alt="">
                    </th>
                </tr>
                <tr>
                    <th class="addtocart">
                        <span id="minus_2" class="minus">-</span>
                        <span id="amount_2" class="amount">
                            <?php
                            if ($_SESSION['item_qty_2'] != 0) {
                                echo $_SESSION['item_qty_2'];
                            } else {
                                echo 0;
                            }
                            ?>
                        </span>
                        <span id="plus_2" class="plus">+</span>
                    </th>
                </tr>
            </table>
        </div>

        <div class="item menu_item3 menu_item">
            <table class="our-choice-table">
                <tr class="choice-desc">
                    <th class="choice-title" id="choice_3"><?php echo $name_3 ?></th>
                </tr>
                <tr>
                    <th>
                        <div class="price_tag">
                            <p id="price_3">$<?php echo $price_3 ?></p>
                        </div>
                        <img src="./media/meatzza.jpg" class="choice-img" alt="">
                    </th>
                </tr>
                <tr>
                    <th class="addtocart">
                        <span id="minus_3" class="minus">-</span>
                        <span id="amount_3" class="amount">
                            <?php
                            if ($_SESSION['item_qty_3'] != 0) {
                                echo $_SESSION['item_qty_3'];
                            } else {
                                echo 0;
                            }
                            ?>
                        </span>
                        <span id="plus_3" class="plus">+</span>
                    </th>
                </tr>
            </table>
        </div>

        <div class="item menu_item4 menu_item">
            <table class="our-choice-table">
                <tr class="choice-desc">
                    <th class="choice-title" id="choice_4"><?php echo $name_4 ?></th>
                </tr>
                <tr>
                    <th>
                        <div class="price_tag">
                            <p id="price_4">$<?php echo $price_4 ?></p>
                        </div>
                        <img src="./media/meatzza.jpg" class="choice-img" alt="">
                    </th>
                </tr>
                <tr>
                    <th class="addtocart">
                        <span id="minus_4" class="minus">-</span>
                        <span id="amount_4" class="amount">
                            <?php
                            if ($_SESSION['item_qty_4'] != 0) {
                                echo $_SESSION['item_qty_4'];
                            } else {
                                echo 0;
                            }
                            ?>
                        </span>
                        <span id="plus_4" class="plus">+</span>
                    </th>
                </tr>
            </table>
        </div>

        <div class="item menu_item5 menu_item">
            <table class="our-choice-table">
                <tr class="choice-desc">
                    <th class="choice-title" id="choice_5"><?php echo $name_5 ?></th>
                </tr>
                <tr>
                    <th>
                        <div class="price_tag">
                            <p id="price_5">$<?php echo $price_5 ?></p>
                        </div>
                        <img src="./media/meatzza.jpg" class="choice-img" alt="">
                    </th>
                </tr>
                <tr>
                    <th class="addtocart">
                        <span id="minus_5" class="minus">-</span>
                        <span id="amount_5" class="amount">
                            <?php
                            if ($_SESSION['item_qty_5'] != 0) {
                                echo $_SESSION['item_qty_5'];
                            } else {
                                echo 0;
                            }
                            ?>
                        </span>
                        <span id="plus_5" class="plus">+</span>
                    </th>
                </tr>
            </table>
        </div>

        <div class="item menu_item6 menu_item">
            <table class="our-choice-table">
                <tr class="choice-desc">
                    <th class="choice-title" id="choice_6"><?php echo $name_6 ?></th>
                </tr>
                <tr>
                    <th>
                        <div class="price_tag">
                            <p id="price_6">$<?php echo $price_6 ?></p>
                        </div>
                        <img src="./media/meatzza.jpg" class="choice-img" alt="">
                    </th>
                </tr>
                <tr>
                    <th class="addtocart">
                        <span id="minus_6" class="minus">-</span>
                        <span id="amount_6" class="amount">
                            <?php
                            if ($_SESSION['item_qty_6'] != 0) {
                                echo $_SESSION['item_qty_6'];
                            } else {
                                echo 0;
                            }
                            ?>
                        </span>
                        <span id="plus_6" class="plus">+</span>
                    </th>
                </tr>
            </table>
        </div>

        <div class="dummydiv menu_item7"></div>

        <div class="right_sidebar">
            <table id="tabulated_table" class="tabulated_table">
                <th class="list_header">Item</th>
                <th class="list_header" style="background-color: #4C86A8; box-shadow: none;"></th>
                <th class="list_header">QTY</th>
                <th class="list_header" style="background-color: #4C86A8; box-shadow: none;"></th>
                <th class="list_header">Price</th>

            </table>
            <div id="tabulated_sub_total">
                Sub-Total: $0.00
            </div>
            <div id="tabulated_delivery">
                <?php echo $delivery_fee ?>: $<?php echo $delivery ?>
            </div>
            <div id="tabulated_total">
                <!-- Session to calculate total price -->
                Total: $2.00
            </div>
            <!-- the positioning of the session ? no leh, the weird thing is 
        hor the form action is the one causing it, it is more of "reading" what is submitted-->
            <!-- I changed this  too, I see wiat ah 
        i think ah, because we saw it workign only when we submit into
    I know liao -->
            <form action="confirm_order.php" method="POST" id="hiddenForm">
                <div class="submit_order">
                    <input type="hidden" name="item1" id="hidden_item_1" value='0'>
                    <input type="hidden" name="item2" id="hidden_item_2" value='0'>
                    <input type="hidden" name="item3" id="hidden_item_3" value='0'>
                    <input type="hidden" name="item4" id="hidden_item_4" value='0'>
                    <input type="hidden" name="item5" id="hidden_item_5" value='0'>
                    <input type="hidden" name="item6" id="hidden_item_6" value='0'>
                    <!-- <a class="button" href="confirm_order.php" name="submit" id="">TO PAYMENT ↗</a> -->
                    <input class="button" type="submit" name="submit" value="TO PAYMENT ↗">
                </div>
            </form>
        </div>

        <script type="text/javascript" src="menu.js"></script>
    </div>
</body>

</html>