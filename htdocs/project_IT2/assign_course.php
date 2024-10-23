<?php
include("db_connect.php");

date_default_timezone_set("Asia/Manila");
$currentdatetime = date("Y-m-d H:i:s", time());
?>

<body>
    <?php
    include("header.php");
    include("menu.php");
    ?>
    <h1> Assign Course to Student </h1>
    <form method="post">
        <table border=1 align="center" cellspacing="0" cellpadding="10">
            <tr>
                <td>Student</td>
                <td>
                    <select name="student_lrn">
                        <option value=""> -- SELECT A STUDENT --</option>
                        <?php
                        $sql = "SELECT *, students.lrn AS THESTUDENTLRN FROM students LEFT JOIN students_courses ON students.lrn = students_courses.lrn WHERE students_courses.lrn IS NULL ORDER BY students.lastname";
                        $query = mysqli_query($conn, $sql);
                        if (!$query) {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        } else {
                            while ($result = mysqli_fetch_assoc($query)) {
                                echo "<option value='{$result['THESTUDENTLRN']}'>{$result['lastname']}, {$result['firstname']}</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Course</td>
                <td>
                    <select name="course">
                        <option value=""> -- SELECT A COURSE --</option>
                        <?php
                        $sql = "SELECT * FROM courses ORDER BY description";
                        $query = mysqli_query($conn, $sql);
                        if (!$query) {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        } else {
                            while ($result = mysqli_fetch_assoc($query)) {
                                echo "<option value='{$result['course_code']}'>{$result['course_code']}, {$result['description']}</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="assign_course" class="button green">Assign</button>
                </td>
            </tr>
    </form>
    <?php
        if(isset($_POST['assign_course'])) {
            $student = $_POST['student_lrn'];
            $course = $_POST['course'];

            $sql = "INSERT INTO students_courses (students_courses_id, lrn, course_code, date_enrolled) VALUES (NULL, '$student', '$course', '$currentdatetime')";

            if(mysqli_query($conn, $sql)) {
                echo "<script> alert('Students has been assigned to a course'); window.location='num_of_student_enrolled.php?course_code={$course}'; </script>";
            }

        }
    ?>
</body>

</html>