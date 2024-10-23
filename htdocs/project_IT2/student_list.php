<?php
include("db_connect.php");
?>

<body>
    <?php
    include("header.php");
    include("menu.php");
    ?>
    <h1> Student List </h1>
    
    <table border="1" align="center" cellspacing="0" cellpadding="5">
        <form method="post">
            <tr>
                <th>
                    <select name="student_lrn">
                        <option value=""> -- SELECT A STUDENT --</option>
                        <?php
                            $sql = "SELECT * FROM students ORDER BY lastname";
                            $query = mysqli_query($conn, $sql);
                            if (!$query) {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            } else {
                                while ($result = mysqli_fetch_assoc($query)) {
                                    echo "<option value='{$result['lrn']}'>{$result['lastname']}, {$result['firstname']}</option>";
                                }
                            }
                        ?>
                    </select>
                </th>
            </tr>
            <tr>
                <th>
                    <button type="submit" class="button green" name='process_edit'>Edit</button>
                    <button type="submit" class="button red" name='process_delete'>Delete</button>
                </th>
            </tr>
        </form>
    </table>
    <br>
    <table border="1" align="center" cellspacing="0" cellpadding="10">
        <tr>
            <th> No. </th>
            <th> LRN </th>
            <th> Student Complete Name </th>
            <th> Birthdate </th>
            <th> Course </th>
            <th> Date Enrolled </th>
            <th> Action </th>
        </tr>
        <?php
        $sql = "SELECT students.lrn, students.lastname, students.firstname, students.birthdate, courses.description AS course_description, students_courses.date_enrolled AS date_enrolled FROM students_courses
INNER JOIN students ON students_courses.lrn = students.lrn
INNER JOIN courses ON students_courses.course_code = courses.course_code;";
        $query = mysqli_query($conn, $sql);
        if (!$query) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } else {
            $i = 1;
            while ($result = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>$i</td>";
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
                echo "<td>" . date("F d, Y", strtotime($result["birthdate"])) . "</td>";
                echo "<td>" . $result['course_description'] . "</td>";
                echo "<td>" . date("F d Y, h:iA", strtotime($result['date_enrolled'])) . "</td>";
                echo "<td>";
                echo "<a href='edit_students.php?action=edit&lrn={$result['lrn']}' class='button green'>Edit</a> ";
                echo "<a href='student_list.php?action=delete&lrn={$result['lrn']}' class='button red'>Delete</a>";
                echo "</td>";
                echo "</tr>";
                $i++;
            }
        }
        ?>
    </table>
    <?php
    if (isset($_GET['action']) && isset($_GET['lrn'])) {
        $action = trim($_GET['action']);
        $lrn = trim($_GET['lrn']);

        if ($action == 'delete') {
            $sql = "DELETE FROM students WHERE lrn = $lrn";
            if (mysqli_query($conn, $sql)) {
                echo "<script> alert('Student has been removed'); window.location='student_list.php'; </script>";
            }
        }
    }
    ?>
    <?php
    if (isset($_POST['process_delete'])) {
        $lrn = trim($_POST['student_lrn']);
        $sql = "DELETE FROM students WHERE lrn = $lrn";
        if (mysqli_query($conn, $sql)) {
            echo "<script> alert('Student has been removed'); window.location='student_list.php'; </script>";
        }
    }
    ?>
    <?php
        if(isset($_POST['process_edit'])) {
            $lrn = trim($_POST['student_lrn']);
            echo "<script> window.location='edit_students.php?action=edit&lrn=$lrn'; </script>";
        }
    ?>
</body>

</html>