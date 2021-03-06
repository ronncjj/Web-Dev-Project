<!DOCTYPE html>
<html lang="en">

<?php
session_start();
session_destroy() ?>

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' type='text/css' media='screen' href='css/styles.css'>
    <title>R&J Pizza Place</title>
</head>

<body>
    <div id="grid">

        <div class="item item1" id="scrolling-bar">
            <p>Hand-tossed and Oven Fresh. R&J Pizza Place serves freshly baked pizza!</p>
        </div>
        <div class="navigation leftNav">
            <nav id="leftNav" class="topnav">
                <ul>
                    <li><a href="#scrolling-bar">HOME</a></li>
                    <li><a href="#intro">ABOUT</a></li>
                    <li><a href="#outlet">OULET</a></li>
                </ul>
            </nav>
        </div>

        <div class="navigation rightNav">
            <nav id="rightNav" class="topnav">
                <ul>
                    <li><a href="menu.php">ORDER</a></li>
                    <li><a href="order_track.php">TRACK</a></li>
                    <li><a href="#contact">CONTACT</a></li>
                </ul>
            </nav>
        </div>

        <div class="item item4 content">
            <div class="orderButton">
                <ul>
                    <li><a href="menu.php">ORDER</a></li>
                </ul>
            </div>
            <div class="arrowdown">
                <a href="#intro">
                    <img height="80px" src="https://media4.giphy.com/media/FyXa91L4IhKRGRddJN/giphy.gif?cid=790b7611cbfd443645d44791b7c07c303de67abcbd824082&rid=giphy.gif&ct=s" alt="arrowDown">
                </a>
            </div>
            <div class="logo">
                <img style="filter: invert(42%) sepia(93%) saturate(1352%) hue-rotate(87deg) brightness(119%) contrast(119%);" height="400px" src="./media/ronnJustin.svg" alt="">
            </div>
        </div>

        <div class="item item5 content" id="intro">
            <!-- <h2 id="ourStory">Our Story</h2> -->
            <p class="contentText">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur sit quibusdam impedit voluptatum fugit, hic excepturi face
                re quo perspiciatis debitis commodi placeat eveniet velit
                , molestias fuga explicabo neque, incidunt laboriosam?

                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente assumenda nulla doloribus
                atque odio praesentium quibusdam sed? Magni dolore ullam te
                mpore voluptatum ratione quis quidem ad, sequi doloribus corrupti ipsum.
            </p>
            <img class="contentImage" src="./media/wallhaven-lmzdjq.jpg" class="story-pizza-img" alt="">
        </div>

        <div class="item item6">

            <h1 id="recommendations">Owner's recommendations</h1>

            <table class="our-choice-table">
                <tr>
                    <th class="choice-desc" rowspan="2">
                        <img src="./media/classified_chicken.jpg" class="choice-img" alt="">
                        <a class="button" href="menu.php">Order now</a>
                    </th>
                    <th class="choice-title">Ronn's Choice</th>
                </tr>
                <tr>
                    <td class="choice-desc">
                        <p class="contentText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora libero
                            saepe
                            quis eius sint hic nostrum corrupti nesciunt pe
                            rferendis, nisi repellendus odit et excepturi inventore! Veniam earum quis neque beatae?
                        </p>
                    </td>
                </tr>
            </table>
        </div>

        <div class="item item7">
            <table class="our-choice-table">
                <tr>
                    <th class="choice-title">Justin's Choice</th>
                    <th class="choice-desc" rowspan="2">
                        <img src="./media/meatzza.jpg" class="choice-img" alt="">
                        <a class="button" href="menu.php">Order now</a>
                    </th>
                </tr>
                <tr>
                    <td class="choice-desc">
                        <p class="contentText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora libero
                            saepe
                            quis eius sint hic nostrum corrupti nesciunt pe
                            rferendis, nisi repellendus odit et excepturi inventore! Veniam earum quis neque beatae?
                        </p>
                    </td>

                </tr>
            </table>
        </div>

        <div class="our-outlet item item8">
            <table class="our-outlet-table">
                <h1 id="outlet">Our Outlets</h1>
                <tr>
                    <td class="our-outlet-img-td"><img src="media/shop-1.jpeg" class="outlet-img-top" alt=""></td>
                    <td class="our-outlet-top-td">
                        <h4>Opening Hours: 11am to 10pm</h4>
                        <h4>67 Haji Lane</h4>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure ipsum ex autem
                            iste atque vero enim accusantium libero nisi quod necessitatibus hic, veniam
                            quo assumenda porro tempore harum at repudiandae!</p>
                    </td>
                </tr>

                <tr>
                    <td class="our-outlet-img-td"><img src="media/shop-2.jpg" class="outlet-img-bot" alt=""></td>
                    <td class="our-outlet-bot-td">
                        <h4>Opening Hours: 11am to 12am</h4>
                        <h4>48 Tanjong Pagar Rd</h4>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure ipsum ex autem
                            iste atque vero enim accusantium libero nisi quod necessitatibus hic, veniam
                            quo assumenda porro tempore harum at repudiandae!</p>
                    </td>
                </tr>
            </table>
        </div>

        <div class="contact-us item9" id="contact_grid">
            <div class="contact-header">
                <h1 id="contact">Contact Us</h1>
            </div>
            <div class="contact-details">
                <table>
                    <tr>
                        <td>
                            <img src="./media/facebook-circle-logo-24.png" alt="">
                            <br>
                        </td>
                        <td class="padding_bot_10">
                            <h3 class="margin_0 margin_bot_5">Facebook</h3>
                            <p class="margin_0">@R&JPizzaCo</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="./media/phone-solid-24.png" alt="">
                            <br>
                        </td>
                        <td class="padding_bot_10">
                            <h3 class="margin_0 margin_bot_5">Enquires</h3>
                            <p class="margin_0">+65 8888 4444</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="./media/pizza-solid-24.png" alt="">
                            <br>
                        </td>
                        <td class="padding_bot_10">
                            <h3 class="margin_0 margin_bot_5">Delivery</h3>
                            <p class="margin_0">+65 8888 3333</p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="contact-region">
                <form action="route_contact.php" method="post" id="contact_form" onsubmit="alert('Form submitted successfully.')">
                    <div id="contact_name" class="contact_div">
                        <table>
                            <tr>
                                <td>
                                    <label for="name">Name:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="name" type="text" name="name" required align="center"></input>
                                </td>
                            </tr>
                        </table>
                    </div>
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
                    <div id="contact_message" class="contact_div">
                        <table>
                            <tr>
                                <td>
                                    <label for="message">Message:</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="message" required align="center"></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- Element to catch parent flow, to route_contact.php -->
                    <input type="hidden" name="fromIndex">
                    <br>
                    <input class="button" type="reset" value="Clear">
                    <input class="button" type="submit" value="Submit">
                </form>
            </div>
        </div>

        <!-- <div class="item item4"></div> -->
        <!-- <div class="item item5">5</div>
                <div class="item item6">6</div>
                <div class="item item7">7</div>
                <div class="item item8">8</div>
                <div class="item item9">9</div> -->
    </div>
    <div id="bottom"></div>
    <!-- <script type="text/javascript" src="index.js"></script> -->
    <script src='index.js'></script>
</body>

</html>