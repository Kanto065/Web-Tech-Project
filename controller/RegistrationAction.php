<?php 
    session_start();
?>
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
        include '../view/common/header.php';
    ?>
    <?php

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            $firstName = $firstNameErr = $lastName = $lastNameErr = $gender = $genderErr = $addr = $phone = $email = $emailErr = $uname = $unameErr = $pass = $passErr = $cpass = $cpassErr = "";


            function sanitize($data){
                $data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
            }

            if(empty($_POST['fname'])){
                $firstNameErr = "* First Name is required.";
            }
            else{
                $firstName = sanitize($_POST['fname']);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName)) {
                    $firstNameErr = "Only letters and white space allowed";
                }
            }

            if(empty($_POST['lname'])){
                $lastNameErr = "* Last Name is required.";
            }
            else{
                $lastName = sanitize($_POST['lname']);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) {
                    $lastNameErr = "Only letters and white space allowed";
                }
            }

            if(empty($_POST['gender'])){
                $genderErr = "* gender required.";
            }
            else{
                $gender = ($_POST['gender']);
            }

            
            $addr = sanitize($_POST['present-address']);
            $phone = sanitize($_POST['phone']);
          
            if (empty($_POST["email"])) {
                $emailErr = "* Email is required";
            } 
            else {
                $email = sanitize($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format";
                }
            }

            if(empty($_POST['uname'])){
                $unameErr = "* User name required.";
            }
            else{
                $uname = sanitize($_POST['uname']);
            }

            if(empty($_POST['pass'])){
                $passErr = "* password required.";
            }
            else{
                $pass = sanitize($_POST['pass']);
                if(strlen($pass) < 4){
                $passErr = "password should 4 characters minimum";
                }  
            } 

            if(empty($_POST['cpass'])){
                $cpassErr = "*confirm password required.";
            }
            else{
                $cpass = sanitize($_POST['cpass']);
                if($pass !== $cpass){
                    $cpassErr = "*confirm password doesn't match.";
                }
            }

            //echo $pass . "\n" . $cpass . "\n";

            /*$_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            $_SESSION['gender'] = $gender;
            $_SESSION['email'] = $email;
            $_SESSION['uname'] = $uname;
            $_SESSION['pass'] = $pass;
            $_SESSION['cpass'] = $cpass;
            $_SESSION['addr'] = $addr;
            $_SESSION['phone'] = $phone;
            */

            if($firstNameErr || $lastNameErr || $genderErr || $emailErr || $unameErr || $passErr || $cpassErr){
                $_SESSION['firstNameErr'] = $firstNameErr;
                $_SESSION['lastNameErr'] = $lastNameErr;
                $_SESSION['genderErr'] = $genderErr;
                $_SESSION['emailErr'] = $emailErr;
                $_SESSION['unameErr'] = $unameErr;
                $_SESSION['passErr'] = $passErr;
                $_SESSION['cpassErr'] = $cpassErr;

                header("Location: ../view/registration.php");
                exit(); 
            }

            else{

                $handle = fopen("../content/admin.json", "r");

                $fr = fread($handle, filesize("../content/admin.json"));
                $decode = json_decode($fr);

                fclose($handle);

                $handle = fopen("../content/admin.json", "w");

                if($decode == NULL){
                    $data = array(array('uname' => $uname, 'pass' => $pass, 'firstName' => $firstName, 'lastName' => $lastName, 'email' => $email, 'phone' => $phone, 'gender' => $gender, 'Addr' => $Addr));
                    $data =json_encode($data);
                    fwrite($handle, $data);
                }
                else{
                    $decode[] = array('uname' => $uname, 'pass' => $pass, 'firstName' => $firstName, 'lastName' => $lastName, 'email' => $email, 'phone' => $phone, 'gender' => $gender, 'addr' => $addr);
                    $data = json_encode($decode);
                    fwrite($handle, $data);                       
                }

                fclose($handle);

                echo "Registration successful";

                session_destroy();   
            }
        }
        else{
            echo "can not process get request";
        }
    ?>
    

    <?php
        
    ?>

    <br><br>
    <form style="text-align: center">   
        <button type="submit" formaction="../view/registration.php"> Go Back </button>
        <br><br>
        <button type="submit" formaction="../view/logIn.php"> Log in </button>
    </form>

    <?php
        include '../view/common/footer.php';
    ?>
    
</body>
</html>