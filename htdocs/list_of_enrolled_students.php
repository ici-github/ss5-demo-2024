<?php
    include("database.php");
    include("header.php");
?>

    <h3> List of Enrolled Students </h3>
    <form method="post">
        <select name='student_list'>    
            <option value=""> -- SELECT STUDENT --</option>
            <?php
                $sql = "SELECT * FROM students ORDER BY lastname ASC";
                $query = mysqli_query($connection, $sql);
                while($student = mysqli_fetch_assoc($query)) {
                    echo "<option value='". $student['lrn']. "'> {$student['lastname']}, {$student['firstname']} </option>";
                }
            ?>
        </select>
        <button type="submit" name="edit_student_dropdown" style="width:100px">Edit</button>
    </form>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Learners' Reference Number</th>
            <th>Students' Complete Name</th>
            <th>Course Enrolled</th>
            <th>Date Enrolled</th>
            <th>Action</th>
        </tr>
        <?php 
            $sql = "SELECT * FROM students_courses
                INNER JOIN students ON students_courses.lrn = students.lrn
                INNER JOIN courses ON  students_courses.course_id = courses.course_id
                ORDER BY students.lastname ASC
            ";
            $query = mysqli_query($connection, $sql);
            while($result = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $result['lrn'] . "</td>";
                // echo "<td>" . $result['lastname'] . ", " . $result['firstname'] . "</td>";
                echo "<td>{$result['lastname']}, {$result['firstname']}</td>";
                echo "<td>{$result['course_name']}</td>";
                echo "<td>" . date("F d, Y", strtotime($result['date_enrolled'])) . "</td>";
                echo "<td><a href='edit_enrolled_student.php?lrn={$result['lrn']}' target='_blank'>Edit</a></td>";
                echo "</tr>";
            }
        ?>
    </table>

    </center>
    <?php 
        if(isset($_POST['edit_student_dropdown'])) {
            echo "<script> window.location='edit_enrolled_student.php?lrn={$_POST['student_list']}'; </script>";
        }
    ?>
</body>
</html>