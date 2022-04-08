<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>forget pass</title>
</head>
<body>
	<?php
        include '../view/common/header.php';
        
    ?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
		<fieldset>
			<legend>Change Password</legend>
				<label for="uname">User Name: </label><br>
	          	<input type="text" id="uname" name="uname"><br>
		</fieldset>
		<input type="submit" value="Submit">
	</form>
	<?php

		if ($_SERVER["REQUEST_METHOD"] === "POST"){
			

        function sanitize($data){
                $data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
            }
        $uname = sanitize($_POST['uname']);


		}

		$x = '';
		$flag = true;
        $handle = fopen("../content/admin.json", "r");
        $fr = fread($handle, filesize("../content/admin.json"));
        $arr1 = json_decode($fr);
        $lastIndex = count($arr1);
        $fc = fclose($handle);
        for($i=0; $i<count($arr1); $i++){
            if($arr1[$i]->uname === $uname){
                $x = rand(1000,9999);
                $flag = false;
                break;
            }
            else{
            	$flag = true;
            } 
        }
        if($flag){
        	echo "Please give valid user name";
        }
        else{
        	$handle = fopen("../content/code.json", "w");
	        $data = json_encode($x);
	        fwrite($handle, $data); 
	        fclose($handle);
        }	
	?>

	<form>
		
	</form>
<?php
        include '../view/common/footer.php';
    ?>
</body>
</html>