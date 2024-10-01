<?php
    include("database.php");
    include("header.php");
?>

    <h3> Enroll Student </h3>
    <form method="post">
        <table border="1" cellspacing="0" cellpadding="8">
            <tr>
                <th>Learners' <br>Reference Number</th>
                <th><input type="number" name="student_lrn" placeholder="Please input LRN" required></th>
            </tr>
            <tr>
                <th>Lastname</th>
                <th><input type="text" name="student_lastname" placeholder="Please input Lastname" required></th>
            </tr>
            <tr>
                <th>Firstname</th>
                <th><input type="text" name="student_firstname" placeholder="Please input Firstname" required></th>
            </tr>
            <tr>
                <th>Birthdate</th>
                <th><input type="date" name="student_birthdate" placeholder="Please input Birthdate" required></th>
            </tr>
            <tr>
                <th>Course</th>
                <th>
                    <select name="student_course" required>
                        <option value="">-- SELECT COURSE BELOW --</option>
                        <?php
                            $sql = "SELECT * FROM courses ORDER BY course_name ASC";
                            $query = mysqli_query($connection, $sql);
                            while($result = mysqli_fetch_assoc($query)) {
                                echo "<option value='{$result['course_id']}'> {$result['course_name']}</option>";
                            }
                        ?>
                    </select>
                </th>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="student_register">Student Register</button>
                </td>
            </tr>
            <?php 
                if(isset($_POST['student_register'])) {
                    $lrn = trim($_POST['student_lrn']);
                    $firstname = trim($_POST['student_firstname']);
                    $lastname = trim($_POST['student_lastname']);
                    $course = trim($_POST['student_course']);
                    $birthdate = trim($_POST['student_birthdate']);

                    $sql = "SELECT COUNT(*) FROM students WHERE lrn = '$lrn'";
                    $query = mysqli_query($connection, $sql);
                    $checkStudentLRN = mysqli_fetch_array($query);

                    if($checkStudentLRN[0] == 1) {
                        echo "<script> alert('LRN already exists, please try again'); </script>";
                    }else {
                        $sql = "INSERT INTO students (lrn, lastname, firstname, birthdate) ";
                        $sql .= " VALUES ('$lrn', '$lastname', '$firstname', '$birthdate');";

                        mysqli_query($connection, $sql);

                        $sql = "INSERT INTO students_courses (lrn, course_id, date_enrolled) ";
                        $sql .= "VALUES ('$lrn', '$course', '$currentdate')";

                        if(mysqli_query($connection, $sql)) {
                            echo "<script> alert('Student has been enrolled');
                            window.location='list_of_enrolled_students.php';</script>";
                        } else {
                            echo "<script> alert('Cannot enroll student, please try again'); </script>";
                        }
                    }
                }
            ?>
        </table>
    </form>
    </center>
</body>
</html>