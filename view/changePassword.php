<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>change password</title>
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
        for($i=0; $i<count($arr1); $i++){
            if($arr1[$i]->uname === $userName){
                $x=$i;
                break;
            } 
        }
    ?>

	<form action="../controller/changePasswordAction.php" method="post" novalidate>
		<fieldset>
			<legend>Change Password</legend>
				<label for="uname">User Name: </label><br>
	          	<input type="text" id="uname" name="uname" value="<?php echo $arr1[$x]->uname;?>" disabled><br>
	          	<label for="pass">Current Password: </label><br>
	          	<input type="password" id="pass" name="pass" minlength="8"> <br>
	          	<label for="newPass">New Password: </label><br>
	          	<input type="password" id="newPass" name="newPass" minlength="8"> <br>
		</fieldset><br>
		<input type="submit" value="Submit"><br><br>
		<button type="submit" formaction="../view/AdminDashboard.php"> Go Back </button>
	</form>
<?php
        include '../view/common/footer.php';
    ?>
	
</body>
</html>