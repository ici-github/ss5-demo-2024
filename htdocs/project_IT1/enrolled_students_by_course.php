<?php
    include("header.php");

    $course_code = $_GET['course_code'];

    $courses = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM courses WHERE course_code = '$course_code'"));
?>

<body>
  <?php
  include("menu.php");
  ?>
  <table border="1" align="center" cellspacing="0" cellpadding="10">
    <tr>
      <th colspan="4">List of Students enrolled in <?php echo $courses['description'] ?></th>
    </tr>
    <tr>
      <th> LRN </th>
      <th> Student Complete Name</th>
      <th> Date Enrolled</th>
    </tr>

    <?php
    //Show the list of students

    $sql = "SELECT * FROM students INNER JOIN students_courses ON students.lrn = students_courses.lrn WHERE students_courses.course_code = '$course_code' ";

    $query = mysqli_query($conn, $sql);

    // if $query is false, then there was an error
    if (!$query) {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // when $query is true, display the data
    while ($result = mysqli_fetch_assoc($query)) {
      echo "<tr>";
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
     
    }
    ?>
  </table>

</body>

</html>