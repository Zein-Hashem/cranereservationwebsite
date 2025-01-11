<?php
include('config/connect.php');

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABO habib.com</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="https://www.google.com/maps/place/%D9%88%D9%86%D8%B4+%D8%A7%D8%A8%D9%88+%D8%AD%D8%A8%D9%8A%D8%A8+%D9%87%D8%A7%D8%B4%D9%85,+Toul%E2%80%AD/data=!4m2!3m1!1s0x151e93bb827ec2c9:0xcde2265f3ef08676?utm_source=mstt_1&entry=gps" title="Logo">
                    <img src="images/abo-habib-high-resolution-logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php SITEURL; ?>index.php">Home</a>
                    </li>
                    <li>
                        <a href="<?php SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php SITEURL; ?>cranes.php">cranes</a>
                    </li>
                    <li>
                        <a href="admin/login.php">Admin</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->