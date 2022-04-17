<?php
require_once('database_connection.php');
function inserRegisterData($fname, $lname, $gender, $address, $phone, $email, $pass)
{
    $conn = get_connection();

    $stmt = $conn->prepare("INSERT INTO admin (fname, lname, gender, address, phone, email, password)
    VALUES (?,?,?,?,?,?,?)");

    $stmt->bind_param("sssssss", $firstname, $lastname, $gend, $add, $phn, $mail, $passs);

    $firstname = $fname;
    $lastname = $lname;
    $gend = $gender;
    $add = $address;
    $phn = $phone;
    $mail = $email;
    $passs = $pass;
    $stmt->execute();
    $stmt->close();
    $conn->close();

    return 1;
}

function login($email, $pass)
{
    $conn = get_connection();

    $sql =  "SELECT * FROM admin WHERE email = '$email' and password ='$pass'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);

    if ($data != null) {
        return true;
    } else {
        return false;
    }
}