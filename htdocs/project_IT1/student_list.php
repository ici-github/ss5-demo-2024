<?php
include("header.php");
?>

<body>
  <?php
  include("menu.php");
  ?>
  <table border="1" align="center" cellspacing="0" cellpadding="10">
    <tr>
      <th>Select student to delete</th>
    </tr>
    <tr>
      <td>
        <form method="post">
          <select name="student_lrn">
            <option value="">-- SELECT STUDENT TO DELETE --</option>
            <?php

            $sql = "SELECT * FROM students ORDER BY lastname ASC";

            $query = mysqli_query($conn, $sql);

            // if $query is false, then there was an error
            if (!$query) {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            while ($result = mysqli_fetch_assoc($query)) {
              echo "<option value='{$result['lrn']}'>{$result['lastname']}, {$result['firstname']} </option>";
            }
            ?>
          </select>
          <br>
          <button type="submit" class="button_green" name="update_student">Update Student</button>
          <button type="submit" class="button" name="delete_student">Delete Student</button>
        </form>
      </td>
    </tr>
  </table>
  <table border="1" align="center" cellspacing="0" cellpadding="10">
    <tr>
      <th colspan="5">List of Students</th>
    </tr>
    <tr>
      <th> &nbsp;</th>
      <th> LRN </th>
      <th> Student Complete Name</th>
      <th> Birthdate </th>
      <th> Action </th>
    </tr>

    <?php
    //Show the list of students

    $sql = "SELECT * FROM students ORDER BY lastname ASC";

    $query = mysqli_query($conn, $sql);

    // if $query is false, then there was an error
    if (!$query) {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // when $query is true, display the data
    while ($result = mysqli_fetch_assoc($query)) {
      echo "<tr>";
      echo "<td>";
        if($result['filepath']) {
          echo "<img src='{$result['filepath']}' style='width:30px;'>";
        } else {
          echo "<span style='font-size:10px;'> No image uploaded </span>";
        }
      echo "</td>";
      echo "<td>" . $result["lrn"] . "</td>";
      echo "<td>" . $result["lastname"] . ", " . $result['firstname'] . " " . $result['middlename'] . "</td>";
      // echo "<td>{$result["lastname"]}, {$result['firstname']} </td>";
      /*
              F - full name of the month (January)
              d - day of the month (1-31)
              Y - year in 4 digits
              strtotime - converts a date string to a timestamp
          */
      echo "<td>" . date("F d, Y", strtotime($result["birthdate"])) . "</td>";
      echo "<td>
        <a class='button_green' href='update_student.php?action=edit&lrn={$result["lrn"]}'>Edit</a>
        <a class='button' href='student_list.php?action=delete&lrn={$result["lrn"]}'>Delete</a>
        </td>";
      echo "</tr>";
    }
    ?>
  </table>

  <?php
  if (isset($_GET['action']) && isset($_GET['lrn'])) {
    $action = trim($_GET['action']);
    $lrn = trim($_GET['lrn']);

    if ($action == 'delete') {
      $sql = "DELETE FROM students WHERE lrn = $lrn";
      if (mysqli_query($conn, $sql) === TRUE) {
        echo "<script> alert('Student has been deleted successfully.'); window.location='student_list.php'; </script>";
      } else {
        echo "<script> alert('Failed to delete student, check records if student is already enrolled.'; window.location='student_list.php');</script>";
      }
    }
  }
  ?>

  <?php
    if(isset($_POST['delete_student'])) {
      $lrn = $_POST['student_lrn'];
      $sql = "DELETE FROM students WHERE lrn = $lrn";
      if (mysqli_query($conn, $sql) === TRUE) {
        echo "<script> alert('Student has been deleted successfully.'); window.location='student_list.php'; </script>";
      } else {
        echo "<script> alert('Failed to delete student, check records if student is already enrolled.'; window.location='student_list.php');</script>";
      }
    }
  ?>

  <?php
    if(isset($_POST['update_student'])) {
      $lrn = $_POST['student_lrn'];
      echo "<script> window.location = 'update_student.php?action=edit&lrn=$lrn'; </script>";
    }
  ?>
</body>

</html>
