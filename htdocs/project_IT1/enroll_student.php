<?php
  include("header.php");
  date_default_timezone_set("Asia/Manila");
  $currentdatetime = date("Y-m-d h:i:s", time());
?>
<body>
<?php
  include("menu.php");
?>
  <h1>Enroll Student</h1>
  <form method="post">
    Select Student: 
        <select name="student" required>
            <option value="">-- SELECT STUDENT BELOW -- </option>
            <?php 
                $sql = "SELECT * FROM students ORDER BY lastname ASC";
                $query = mysqli_query($conn, $sql);
                while($result = mysqli_fetch_assoc($query)) {
                    echo "<option value='{$result['lrn']}'> {$result['lastname']}, {$result['firstname']} </option>";
                }
            ?>
        </select><br><br>
    Select Course: 
        <select name="course" required>
            <option value="">-- SELECT COURSE BELOW -- </option>
            <?php 
                $sql = "SELECT * FROM courses ORDER BY `description` ASC";
                $query = mysqli_query($conn, $sql);
                while($result = mysqli_fetch_assoc($query)) {
                    echo "<option value='{$result['course_code']}'> {$result['description']}</option>";
                }
            ?>
        </select>
        <br><br>
        <button class='button_green' type="submit" name='enroll_student'> Enroll Student</button>
  </form>
  <?php
        if(isset($_POST['enroll_student'])) {
            $student = $_POST['student'];
            $course = $_POST['course'];

            $sql = "INSERT INTO students_courses (lrn, course_code, date_enrolled) VALUES ('$student', '$course', '$currentdatetime');";
            if(mysqli_query($conn, $sql)) {
                echo "<script> alert('Student has been enrolled to $course'); window.location='enrolled_students_by_course.php?course_code=$course'; </script>";
            } else {
                echo "<script> alert('Student cannot be enrolled to $course'); </script>";
            }
        }
  ?>
</body>
</html>


