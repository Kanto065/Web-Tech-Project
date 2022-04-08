<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>driver list</title>
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
        $handle = fopen("../content/driver.json", "r");
        $fr = fread($handle, filesize("../content/driver.json"));
        $arr1 = json_decode($fr);
        $lastIndex = count($arr1);
        $fc = fclose($handle);
        echo "<table border='1'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>First Name</th>";
			echo "<th>Last Name</th>";
			echo "<th>Licence NO</th>";
			echo "<th>Action</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			for ($i = 0; $i < count($arr1); $i++) {
				echo "<tr>";
				echo "<td>" . $arr1[$i]->firstName . "</td>";
				echo "<td>" . $arr1[$i]->lastName . "</td>";
				echo "<td>" . $arr1[$i]->lno . "</td>";
				echo "<td>" . "<a href='approve.php?id=" . $arr1[$i]->lno . "'>Approve</a>" . "|" . "<a href='decline.php?id=" . $arr1[$i]->lno . "'>Decline</a>" . "</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";

			echo 
			'<br>
			<form>	
			<button type="submit" formaction="../view/AdminDashboard.php">Go Back </button>
				</form>';


    ?>

    <?php
        include '../view/common/footer.php';
    ?>
</body>
</html>