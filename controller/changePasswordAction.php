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

	<?php
		if ($_SERVER["REQUEST_METHOD"] === "POST"){
			function sanitize($data){
                $data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
            }

            //$userName = sanitize($_POST['uname']);
            $pass = sanitize($_POST['pass']);
            $newPass = sanitize($_POST['newPass']);

            if (empty($pass) or empty($newPass)){
            	echo "Please fill up the form properly";
            }
            else{
            	
            	if($arr1[$x]->pass === $pass){
            		$arr1[$x]->pass = $newPass;
            		echo "password updated successfully.";
            		echo '
				        <form>  
				            <button type="submit" formaction="../view/AdminDashboard.php">Admin Dashboard </button>
				        </form>';
            	}
            	else{
    				echo "current password incorrect";
    				echo '
				        <form>  
				            <button type="submit" formaction="../view/changePassword.php">go back</button>
				        </form>';
    			}
            	
            	$newArr1 = json_encode($arr1);
            	$handle = fopen("../content/admin.json", "w");
            	fwrite($handle, $newArr1);
            	fclose($handle);
            }
		}
	?>

	<?php
        include '../view/common/footer.php';
    ?>
</body>
</html>