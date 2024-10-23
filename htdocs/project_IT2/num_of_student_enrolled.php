<?php
    include("db_connect.php");
?>

<body>
    <?php
        include("header.php");
        include("menu.php");

        $course_code = $_GET['course_code'];

        $course = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM courses WHERE course_code = '$course_code'"));
    ?>
    <h1> Student List who enrolled in <?php echo $course['description']; ?> </h1>
    
    <br>
    <table class='center-table' border="1" align="center" cellspacing="0" cellpadding="10">
        <tr>
            <th> LRN </th>
            <th> Student Complete Name </th>
            <th> Date Enrolled </th>
        </tr>
        <?php
        $sql = "SELECT * FROM students INNER JOIN students_courses ON students.lrn = students_courses.lrn WHERE students_courses.course_code = '$course_code'";
        $query = mysqli_query($conn, $sql);
        if (!$query) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } else {
            while ($result = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $result["lrn"] . "</td>";
                echo "<td>" . $result["lastname"] . ", " . $result['firstname'] . "</td>";
                //echo "<td> {$result["lastname"]}, {$result["firstname"]} </td>";
                // echo "<td>" . $result['birthdate'] . "</td>";
                /*
                    January 01, 2001
                    F - full name of the month (January)
                    d - day of the month (1-31)
                    Y - year in 4 digits
                    strtotime - converts a date string to a timestamp
                */
                echo "<td>" . date("F d Y, h:iA", strtotime($result['date_enrolled'])) . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
   
</body>

</html>