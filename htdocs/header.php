<?php
    date_default_timezone_set("Asia/Manila");
    $currentdate = date('Y-m-d', time());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Students</title>
    <style>
        * {
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }

        table {
            margin-top:25px;
        }
        th,td {
            font-size: 13px;
        }
        input[type=date], button {
            line-height: 20px;
        }
        input,input[type=date], button {
            width: 98%;
        }
    </style>
</head>
<body>
    
<center>
        <a href="students.php">Students</a> | 
        <a href="courses.php">Courses</a> | 
        <a href="list_of_enrolled_students.php">List of Enrolled Students</a> | 
        <a href="students_not_enrolled.php">List of Students not Enrolled</a> |
        <a href="enroll_student.php">Enroll Student</a>
    