<?php

function get_connection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rtms_kanto";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}