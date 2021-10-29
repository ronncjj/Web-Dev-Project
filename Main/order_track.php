<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (isset($_POST['idText'])) {
    $id = $_POST['idText'];
}

?>

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/order_track.css'>
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
            <h1>TRACK YOUR ORDER</h1>
        </div>

        <div class="item order_list">
            <div class="order_list_row1_1">
                <span>Order Number:</span>
            </div>
            <div class="order_list_row1_2">
                <input type="text" name="idText">
            </div>
            <div class="order_list_row1_3">
                <!-- <input type="submit" value="TRACK" class="button"> -->
                <a class="button" id="confirm_order_button">TRACK</a>

            </div>
            <div class="order_list_row2">
                <img src="https://media1.giphy.com/media/3ohze03J8KQbQrVHtC/giphy.gif?cid=790b761116e1f424bf30b9620db09ebc00bbfdc82a1e4891&rid=giphy.gif&ct=s" alt="">
            </div>
        </div>

        <div class="item header2">
            <h1>Need Help ?</h1>
        </div>

        <div class="item order_arrival">
            <div class="order_arrival_content_left">
                <div class="contact_information">
                    <!-- <h2>Customer information</h2> -->
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
                                        <input id='email' type="email" name="email" id="email" required align="center"></input>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <div id="shipping_address" class="contact_div">
                            <table>
                                <tr>
                                    <td>
                                        <label for="address">Message:</label>
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
                        <input type="submit" value="Submit" class="button">
                    </form>
                </div>
            </div>
            <div class="order_arrival_content_right">
                <h2>Happy to serve you!</h2>
                <img src="./media/mxtt7r.jpg" alt="">
            </div>
        </div>
        <script type="text/javascript" src="order_track.js"></script>
    </div>
</body>

</html>