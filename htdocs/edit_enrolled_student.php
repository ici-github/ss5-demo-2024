<?php
    include("database.php");
    include("header.php");

    $lrn = $_GET['lrn'];

    $sql = "SELECT * FROM students_courses
        INNER JOIN students ON students.lrn = students_courses.lrn 
        INNER JOIN courses ON courses.course_code = students_courses.course_code
        WHERE students.lrn = '$lrn';
    ";

    $query = mysqli_query($connection, $sql);

    if(mysqli_num_rows($query) != 1) {
        echo "<script> alert('Student not found in enrollment records.'); window.location='list_of_enrolled_students.php';</script>";
        die();
    } else {
        $result = mysqli_fetch_assoc($query);
    }
?>

    <h3> Edit Student Enrollment Form</h3>
    
    <form method="post">
        <table border="1" cellspacing="0" cellpadding="8">
            <tr>
                <th>Learners' <br>Reference Number</th>
                <th><input type="number" name="edit_student_lrn" placeholder="Please input LRN" required value="<?php echo $result['lrn'];?>"></th>
            </tr>
            <tr>
                <th>Lastname</th>
                <th><input type="text" name="edit_student_lastname" placeholder="Please input Lastname" required value="<?php echo $result['lastname'];?>"></th>
            </tr>
            <tr>
                <th>Firstname</th>
                <th><input type="text" name="edit_student_firstname" placeholder="Please input Firstname" required value="<?php echo $result['firstname'];?>"></th>
            </tr>
            <tr>
                <th>Birthdate</th>
                <th><input type="date" name="edit_student_birthdate" placeholder="Please input Birthdate" required value="<?php echo $result['birthdate'];?>"></th>
            </tr>
            <tr>
                <th>Course</th>
                <th>
                    <select name="edit_student_course" required>
                        <option value="">-- SELECT COURSE BELOW --</option>
                        <?php
                            $sql = "SELECT * FROM courses ORDER BY course_name ASC";
                            $query = mysqli_query($connection, $sql);
                            while($c = mysqli_fetch_assoc($query)) {
                                echo "<option value='{$c['course_code']}'";
                                if($c['course_code'] == $result['course_code']) {
                                    echo ' selected ';
                                }
                                echo "> {$c['course_name']}</option>";
                            }
                        ?>
                    </select>
                </th>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="edit_submit_button">Save Student Enrollment</button>
                </td>
            </tr>
            <?php 
                if(isset($_POST['edit_submit_button'])) {
                    $e_lrn = trim($_POST['edit_student_lrn']);
                    $e_firstname = trim($_POST['edit_student_firstname']);
                    $e_lastname = trim($_POST['edit_student_lastname']);
                    $e_course = trim($_POST['edit_student_course']);
                    $e_birthdate = date('Y-m-d', strtotime($_POST['edit_student_birthdate']));

                    mysqli_query($connection,"DELETE FROM students_courses WHERE lrn = '$lrn'");

                    $sql_update = "UPDATE students SET lrn = '$e_lrn', firstname ='$e_firstname', lastname='$e_lastname', birthdate = '$e_birthdate' WHERE lrn = '$lrn';";

                    $sql_update .= "INSERT INTO students_courses (lrn, course_code, date_enrolled) ";
                    $sql_update .= "VALUES ('$e_lrn', '$e_course', '$currentdate');";
                    
                    if(mysqli_multi_query($connection, $sql_update)) {
                        echo "<script> alert('Student modified in enrollment records.'); window.location='list_of_enrolled_students.php';</script>";
                    } else {
                        echo mysqli_error($connection);
                    }

                }
            ?>
        </table>
    </form>
    </center>
</body>
</html>