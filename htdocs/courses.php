<?php
    include("database.php");
    include("header.php");
?>

    <h3> List of Courses </h3>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Course ID</th>
            <th>Course Name</th>
        </tr>
        <?php 
            $sql = "SELECT * FROM courses ORDER BY course_name ASC";
            $query = mysqli_query($connection, $sql);
            while($result = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $result['course_id'] . "</td>";
                echo "<td>{$result['description']}</td>";
                echo "</tr>";
            }
        ?>
    </table>

    </center>
</body>
</html>