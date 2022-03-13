<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration PHP</title>
</head>
<body>
    <?php

        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            function sanitize($data){
                $data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
            }

            $firstName = sanitize($_POST['fname']);
			$lastName = sanitize($_POST['lname']);
            $gender = $_POST['gender'];
            $dob = sanitize($_POST['birthday']);
            $religion = $_POST['religion'];
            $presentAddr = sanitize($_POST['present-address']);
            $premanentAddr = sanitize($_POST['premanent-address']);
            $phone = sanitize($_POST['phone']);       
            $email = sanitize($_POST['email']);
            $website = sanitize($_POST['personal-website']);
            $userName = sanitize($_POST['uname']);
            $pass = sanitize($_POST['pass']);
            $cpass = sanitize($_POST['cpass']);

            
            //echo $gender . '\n'. $dob . '\n'. $religion . '\n';
            //echo $religion;

            
            if(strlen($pass) > 6){
                echo "password should max 5 characters";
            }
            else{
                if($pass == $cpass){
                    if(empty($firstName) or empty($lastName) or empty($gender) or empty($dob) or empty($religion) or empty($presentAddr) or empty($email) or empty($userName) or empty($pass) or empty($cpass) ){
                        echo "please fill up all requires field.";
                    }
                    else{                      
                        echo "Oparation successful";

                        //echo $userName. " ". $pass. "\n";
                        //define(FILENAME, "users.json")
                        $handle = fopen("../users.json", "r");

                        $fr = fread($handle, filesize("../users.json"));
                        $decode = json_decode($fr);

                        fclose($handle);

                        $handle = fopen("../users.json", "w");

                        if($decode == NULL){
                            $data = array(array('uname' => $userName, 'pass' => $pass, 'firstName' => $firstName, 'lastName' => $lastName, 'email' => $email, 'phone' => $phone, 'gender' => $gender, 'dob' => $dob, 'religion' => $religion, 'presentAddr' => $presentAddr, 'premanentAddr' => $premanentAddr, 'website' => $website));
                            $data =json_encode($data);
                            fwrite($handle, $data);
                        }
                        else{
                            $decode[] = array('uname' => $userName, 'pass' => $pass, 'firstName' => $firstName, 'lastName' => $lastName, 'email' => $email, 'phone' => $phone, 'gender' => $gender, 'dob' => $dob, 'religion' => $religion, 'presentAddr' => $presentAddr, 'premanentAddr' => $premanentAddr, 'website' => $website);
                            $data = json_encode($decode);
                            fwrite($handle, $data);                       
                        }

                        fclose($handle);                       
                    }
                }
            }
        }
        else{
            echo "can not process get request";
        }
    ?>
    

    <?php
        
    ?>

    <br><br>
    <a href="registration.html">Go Back</a>
    <br><br>
    <a href="login.php">Log in</a>

    <?php
        include 'footer.php';
    ?>
    
</body>
</html>