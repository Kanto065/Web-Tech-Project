<?php
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- stylesheet -->
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/nav.css">
    <title>Admin Dashboard</title>
</head>

<body>

    <?php

    if (!isset($_COOKIE['flag'])) {
        header("Location: ../view/logIn.php");
        exit();
    }
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
                    <a href="../view/viewProfile.php">View Profile</a>
                    <a href="../view/updateProfileInfo.php">Edit Profile</a>
                    <a href="../view/changePassword.php">Change Password</a>
                </div>
            </div>
            <a class="nav-link logout" href="../controller/logOut.php">Log out</a>
        </div>
    </nav>



    

    <?php
    include '../view/common/footer.php';
    ?>
</body>

</html>