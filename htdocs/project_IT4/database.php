<?php

  $servername = "127.0.0.1";
  $username = getenv("db_user");
  $password = getenv("db_pass");
  $dbname = getenv("db_name");

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  } else {
    echo "Connected successfully";
  }