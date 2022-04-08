<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>view profile</title>
</head>
<body>
	<?php

		if(!isset($_COOKIE['uname'])){
			header("Location: ../view/logIn.php");
            exit();
		}
		//echo "cookie" . $_COOKIE['uname'];
		include '../view/common/header.php';
		echo '<h2 style="text-align: right"> welcome '. $_COOKIE['uname'] . '</h2>';
		//include '../view/common/menu.php';

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

	<label for="fname">First Name: </label> <?php echo $arr1[$x]->firstName; ?> <br>
	<label for="lname">Last Name: </label><?php echo $arr1[$x]->lastName; ?><br>
	<label for="gender">Gender: </label><?php echo $arr1[$x]->gender; ?><br>
	<label for="phone">phone: </label><?php echo $arr1[$x]->phone; ?><br>
	<label for="email">Email: </label><?php echo $arr1[$x]->email; ?><br>
	<label for="present-address">Address: </label><?php echo $arr1[$x]->addr; ?><br>
	<br>


	
	<?php
		echo '<form>	
			<button type="submit" formaction="../view/AdminDashboard.php">Go Back </button>
		</form>';
		include '../view/common/footer.php';
	?>
</body>
</html>