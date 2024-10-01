<?php
    include("database.php");
    include("header.php");
?>

    <h3> List of Enrolled Students </h3>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>Learners' Reference Number</th>
            <th>Students' Complete Name</th>
            <th>Enrollment Status</th>
        </tr>
        <?php 
           $sql = "SELECT students.lrn AS lrn, students.lastname AS lastname, students.firstname AS firstname, students_courses.date_enrolled FROM students
                LEFT JOIN students_courses ON students_courses.lrn = students.lrn
                WHERE students_courses.date_enrolled IS NULL
                ORDER BY students.lastname ASC
            ";
            $query = mysqli_query($connection, $sql);
            while($result = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $result['lrn'] . "</td>";
                // echo "<td>" . $result['lastname'] . ", " . $result['firstname'] . "</td>";
                echo "<td>{$result['lastname']}, {$result['firstname']}</td>";
                echo "<td>";  
                    if($result['date_enrolled'] == NULL) {
                        echo "<div style='background-color:red; color:white; line-height:2em;padding-left:5px;padding-right:5px;'>Student Not Enrolled</div>";
                    }
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </table>

    </center>
</body>
</html>