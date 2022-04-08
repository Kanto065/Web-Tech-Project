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
        for($i=0; $i<count($arr1); $i++){
            if($arr1[$i]->uname === $userName){
                $x=$i;
                break;
            } 
        }

      	$firstName2 = $lastName2  = $presentAddr2 = $phone2 = $email2  = '';

      	if ($_SERVER["REQUEST_METHOD"] === "POST"){
            function sanitize($data){
                $data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
            }

            $firstName2 = sanitize($_POST['fname']);
			$lastName2 = sanitize($_POST['lname']);
            $presentAddr2 = sanitize($_POST['present-address']);
            $phone2 = sanitize($_POST['phone']);       
            $email2 = sanitize($_POST['email']);
        
        if(empty($firstName2) or empty($lastName2) or empty($phone2) or empty($presentAddr2) or empty($email2)){
                echo "please fill up all field.";
        }

        else{
        	$arr1[$x]->firstName = $firstName2;
			$arr1[$x]->lastName = $lastName2;
			$arr1[$x]->addr = $presentAddr2;
			$arr1[$x]->phone = $phone2;
			$arr1[$x]->email = $email2;
			echo "update success!";
             
        }

      	$newArr1 = json_encode($arr1);
      	$handle = fopen("../content/admin.json", "w");
       	fwrite($handle, $newArr1);
        fclose($handle);
        echo '
        <form>  
            <button type="submit" formaction="../view/viewProfile.php">View Profile </button>
        </form>';
        }
      	
        
      ?>

    <?php
        include '../view/common/footer.php';
    ?>
</body>
</html>