<?php
  include("header.php");
?>
<body>
<?php
  include("menu.php");

  if (isset($_GET['action']) && isset($_GET['lrn'])) {
    $action = trim($_GET['action']);
    $lrn = trim($_GET['lrn']);

    if($action == 'edit') {
      $sql = mysqli_query($conn,"SELECT * FROM students WHERE lrn = $lrn");
      $student = mysqli_fetch_assoc($sql);
    }
  }
?>
  <h1>Edit Student</h1>
  <form action="update_student.php" method="post">
    <label for="lrn">LRN:</label>
    <input type="text" id="lrn" name="lrn" value="<?php echo $student['lrn']; ?>" required><br><br>
    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname"  value="<?php echo $student['lastname']; ?>" required><br><br>
    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" name="firstname"  value="<?php echo $student['firstname']; ?>" required><br><br>
    <label for="middlename">Middle Name:</label>
    <input type="text" id="middlename" name="middlename"  value="<?php echo $student['middlename']; ?>"><br><br>
    <label for="birthdate">Birthdate:</label>
    <input type="date" id="birthdate" name="birthdate" value="<?php echo $student['birthdate']; ?>" required><br><br>
    <input type="hidden" name="oldlrn"  value="<?php echo $student['lrn']; ?>">
    <input type="submit" name="submit" value="Submit">
  </form>

  <?php
    if(isset($_POST['submit'])) {
      $lrn = trim($_POST['lrn']);
      $lastname = trim($_POST['lastname']);
      $firstname = trim($_POST['firstname']);
      $middlename = trim($_POST['middlename']);
      $birthdate = trim($_POST['birthdate']);
      $oldlrn = trim($_POST['oldlrn']);
  
      // check the students table if naa bay kaparehas sa $lrn
      $sql = "SELECT * FROM students WHERE lrn = '$lrn'";
      $query = mysqli_query($conn, $sql);
      if (mysqli_num_rows($query) > 0) {
        echo "<script>alert('Student with LRN $lrn already exists!');</script>";
      } else {
        // update the student
        $sql = "UPDATE students SET lrn = '$lrn', lastname = '$lastname', firstname = '$firstname', middlename = '$middlename', birthdate = '$birthdate' WHERE lrn = $oldlrn";
        if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Student updated successfully!'); window.location='student_list.php'; </script>";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
    }
    
  ?>
</body>
</html>


