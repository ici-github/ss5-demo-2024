<?php
    $hostname = "localhost";
    $username = "root"; // getenv("db_user")
    $password = ""; // getenv("db_pass")
    $database = "student_enrollment"; // getenv("db_name")


    $connection = mysqli_connect($hostname, $username, $password, $database);

    if(!$connection) {
        echo "Cannot establish connection to the database. " . mysqli_connect_error();
    }
?>