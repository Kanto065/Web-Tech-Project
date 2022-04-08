<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update info</title>
</head>
<body>
    <?php
        include '../view/common/header.php';
        if(!isset($_COOKIE['uname'])){
            header("Location: ../view/logIn.php");
            exit();
        }
        $userName = $_COOKIE['uname'];
        $x = '';
        $handle = fopen("../content/admin.json", "r");
        $fr = fread($handle, filesize("../content/admin.json"));
        $arr1 = json_decode($fr);
        $lastIndex = count($arr1);
        $fc = fclose($handle);
        error_reporting(E_ERROR | E_PARSE);
        for($i=0; $i<count($arr1); $i++){
            if($arr1[$i]->uname === $userName){
                $x=$i;
                break;
            } 
        }
    ?>

	<form action="../controller/updateProfileInfoAction.php" method="post" novalidate>
        <fieldset>
          <legend>Basic Information:</legend>
          	<label for="uname">User Name: </label><br>
          	<input type="text" id="uname" name="uname" value="<?php echo $arr1[$x]->uname;?>" disabled><br>
            <label for="fname">First Name: </label><br>
            <input type="text" id="fname" name="fname" value="<?php echo $arr1[$x]->firstName;?>"><br>
            <label for="lname">Last Name:  </label><br>
            <input type="text" id="lname" name="lname" value="<?php echo $arr1[$x]->lastName;?>"><br>
            <br>          
        </fieldset>
        <br>
        <fieldset>
          <legend>Contact Information:</legend>
          <label for="present-address">Address: </label><br>
          <textarea name="present-address" id="present-address" cols="30" rows="4" value="<?php echo $arr1[$x]->addr;?>"></textarea><br>
          <label for="phone">phone:</label><br>
          <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="<?php echo $arr1[$x]->phone;?>"> <br>
          <label for="email">Email: </label><br>
          <input type="email" id="email" name="email" value="<?php echo $arr1[$x]->email;?>"><br>
        </fieldset>
        <br>
        <input type="submit" value="Submit"><br><br>
        <button type="submit" formaction="../view/AdminDashboard.php"> Go Back </button>
      </form>

      <?php
        include '../view/common/footer.php';
    ?>
</body>
</html>