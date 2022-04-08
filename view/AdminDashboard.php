<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
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
		include '../view/common/menu.php';
	?>

	<form>	
		<button type="submit" formaction="../view/driverList.php">Approve/decline Drivers reg </button>
	</form>
	
	<?php
		include '../view/common/footer.php';
	?>
</body>
</html>