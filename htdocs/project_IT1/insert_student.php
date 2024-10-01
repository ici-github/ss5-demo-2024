<?php
  include("header.php");
?>
<body>
<?php
  include("menu.php");
?>
  <h1>Insert Student</h1>
  <form action="insert_student.php" method="post">
    <label for="lrn">LRN:</label>
    <input type="text" id="lrn" name="lrn" required><br><br>
    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname" required><br><br>
    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" name="firstname" required><br><br>
    <label for="middlename">Middle Name:</label>
    <input type="text" id="middlename" name="middlename"><br><br>
    <label for="birthdate">Birthdate:</label>
    <input type="date" id="birthdate" name="birthdate" required><br><br>
    <input type="submit" name="submit" value="Submit">
  </form>

  <?php
    if(isset($_POST['submit'])) {
      $lrn = trim($_POST['lrn']);
      $lastname = trim($_POST['lastname']);
      $firstname = trim($_POST['firstname']);
      $middlename = trim($_POST['middlename']);
      $birthdate = trim($_POST['birthdate']);
  
      // check the students table if naa bay kaparehas sa $lrn
      $sql = "SELECT * FROM students WHERE lrn = '$lrn'";
      $query = mysqli_query($conn, $sql);
      if (mysqli_num_rows($query) > 0) {
        echo "<script>alert('Student with LRN $lrn already exists!');</script>";
      } else {
        // insert the student
        $sql = "INSERT INTO students (lrn, lastname, firstname, middlename, birthdate)";
        $sql .= "VALUES ('$lrn', '$lastname', '$firstname', '$middlename', '$birthdate')";
        if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Student inserted successfully!'); window.location='student_list.php';</script>";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
    }
    
  ?>
</body>
</html>


