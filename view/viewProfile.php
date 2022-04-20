<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- stylesheet -->
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/nav.css">
    <title>view profile</title>
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
        $gender = $data['gender'];
        $phone = $data['phone'];
        $email = $data['email'];
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

    <div style="margin: 40px;">
        <h3>View profile</h3>

        <label for="fname">First Name: </label> <?php echo $fname; ?> <br>
        <label for="lname">Last Name: </label><?php echo $lname; ?><br>
        <label for="gender">Gender: </label><?php echo $gender; ?><br>
        <label for="phone">phone: </label><?php echo $phone; ?><br>
        <label for="email">Email: </label><?php echo $email; ?><br>
        <label for="present-address">Address: </label><?php echo $add; ?><br>
        <br>
    </div>



    <?php
    // echo '<form>	
    // 		<button type="submit" formaction="../view/AdminDashboard.php">Go Back </button>
    // 	</form>';
    include '../view/common/footer.php';
    ?>
</body>

</html>