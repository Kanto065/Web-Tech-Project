<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- stylesheet -->
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/nav.css">
    <!-- js -->
    <script src="./js/updateInfo.js"></script>
    <title>Update info</title>
</head>

<body>
    <?php
    if (!isset($_COOKIE['flag'])) {
        header("Location: ../view/logIn.php");
        exit();
    }

    require_once('../model/database_connection.php');

    $conn = get_connection();

    $sql =  "SELECT * FROM admin";

    $result = $conn->query($sql);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        $fname = $data['fname'];
        $lname = $data['lname'];
        $phone = $data['phone'];
        $add = $data['address'];
    }

    ?>

    <!-- common nav -->
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
    <!-- nav end -->



    <div class="form-div">
        <form action="../controller/updateProfileInfoAction.php" method="post" novalidate
            onsubmit="return emptyInputFieldforupdateinfo()">

            <p class="label email">Email</p>
            <input class="input-field input-field-required" type="email" id="email" name="email"
                value="<?php echo $_SESSION["email"] ?>" disabled>

            <p class="label fname">First Name</p>
            <input class="input-field input-field-required" type="text" id="fname" name="fname"
                value="<?php echo $fname ?>">
            <p class="label lname">Last Name</p>
            <input class="input-field input-field-required" type="text" id="lname" name="lname"
                value="<?php echo $lname ?>">

            <br>
            <p class="label present-address">Address</p>
            <input class="input-field" name="present-address" id="present-address" cols="20" rows="3"
                value="<?php echo $add ?>"></input>
            <p class="label phone">phone</p>
            <input class="input-field" type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
                value="<?php echo $phone ?>">

            <input class="login-btn btn" type="submit" value="update">
        </form>

    </div>

    <?php
    include '../view/common/footer.php';
    ?>
</body>

</html>