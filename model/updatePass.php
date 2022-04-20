<?php
session_start();

require_once('database_connection.php');

function updatePass($pass)
{
    $conn = get_connection();
    $email = $_SESSION["email"];

    $sql = "UPDATE admin SET password='$pass' WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
        return 0;
    }

    $conn->close();
    return 1;
}