<?php
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/nav.css">
    <title>Admin Dashboard</title>
</head>

<body>

    <?php

    // if (!isset($_COOKIE['uname'])) {
    // 	header("Location: ../view/logIn.php");
    // 	exit();
    // }
    // include '../view/common/menu.php';

    // echo '<h2 style="text-align: right"> welcome ' . $_COOKIE['uname'] . '</h2>';
    ?>

    <nav class="navigation">
        <h3 class="logo"> <a href="./AdminDashboard.php">RTMS</a></h3>
        <div>
            <a class="nav-link" href="">New Drivers</a>
            <div class="dropdown">
                <button class="dropbtn nav-link">User List</button>
                <div class="dropdown-content">
                    <a href="">Drivers</a>
                    <a href="">Surgeons</a>
                    <a href="">Toll Collector</a>
                </div>
            </div>
            <!-- <a class="nav-link" href="">User List</a> -->
            <a class="nav-link" href="">Issues</a>
            <a class="nav-link" href="">Traffic rules</a>
        </div>
        <div>
            <div class="dropdown">
                <button class="dropbtn nav-link">Profile</button>
                <div class="dropdown-content">
                    <a href="">View Profile</a>
                    <a href="">Edit Profile</a>
                    <a href="">Change Password</a>
                </div>
            </div>
            <a onclick="logout" class="nav-link logout" href="">Log out</a>
        </div>
    </nav>



    <form>
        <button type="submit" formaction="../view/driverList.php">Approve/decline Drivers reg </button>
    </form>

    <?php
    include '../view/common/footer.php';
    ?>
</body>

</html>