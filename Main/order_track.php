<!DOCTYPE html>
<html lang="en">

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
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="index.php#intro">ABOUT</a></li>
                    <li><a href="index.php#outlet">OULET</a></li>
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
                <input type="text" name="idText" id="order_number_input">
            </div>
            <div class="order_list_row1_3">
                <!-- <input type="submit" value="TRACK" class="button"> -->
                <a class="button" id="order_number_button">TRACK</a>
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
                    <form action="route_contact.php" method="post" onsubmit="alert('Form submitted successfully.')">
                        <div id="contact_name" class="contact_div">
                            <table>
                                <tr>
                                    <td>
                                        <label for="name">Name:</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input required id="contact_name_input" type="text" name="name" required align="center"></input>
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
                                        <input required id='email' type="email" name="email" id="email" required align="center"></input>
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
                                        <textarea required id="message_textarea" name="message" required align="center"></textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- Element to catch parent flow, to route_contact.php -->
                        <input type="hidden" name="fromTrack">
                        <br>
                        <input type="submit" value="Submit" class="button">
                    </form>
                </div>
            </div>
            <div class="order_arrival_content_right">
                <h2>Happy to serve you!</h2>
                <img src="./media/concept-customer-operator-online-technical-260nw-1136122934.jpg" alt="">
            </div>
        </div>

        <form action="order_status.php" method="POST" id="confirm_order_form">
            <input type="hidden" id="hidden_input" name="tracking_id">
        </form>

        <?php
        session_start();
        // ALERT HANDLING
        if ($_SESSION['alert'] == 1) {
            echo '<input type="hidden" id="alert" value="1">';
            $_SESSION['alert'] = 0;
        } else {
            echo '<input type="hidden" id="alert" value="0">';
            $_SESSION['alert'] = 0;
        }
        // session_destroy();
        ?>
    </div>
</body>
<script type="text/javascript" src="order_track.js"></script>

</html>