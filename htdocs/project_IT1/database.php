<?php
    $host = "127.0.0.1";
    $user = "mariadb";
    $pass = "mariadb";
    $db = "mariadb";
    
    $conn = mysqli_connect($host, $user, $pass, $db);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        //echo "Connected successfully";
    }
?>