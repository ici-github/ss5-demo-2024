<?php
include("header.php");
?>

<body>
<?php
  include("menu.php");
?>
  <h1>Insert Student</h1>
  <form action="insert_student.php" method="post" enctype="multipart/form-data">
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
    <label for="profile-photo">Upload Photo: Maximum of 1MB</label><br>
    <input type="file" name="profile-photo" id="profile-photo" placeholder="Upload Image"><br><br>
    <input type="submit" name="submit" value="Submit">
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $lrn = trim($_POST['lrn']);
    $lastname = trim($_POST['lastname']);
    $firstname = trim($_POST['firstname']);
    $middlename = trim($_POST['middlename']);
    $birthdate = trim($_POST['birthdate']);


    //Sample 1
    $filename = $_FILES['profile-photo']['name'];
    $filetype = $_FILES['profile-photo']['type'];
    $filesize = $_FILES['profile-photo']['size'];
    $tmp_name = $_FILES['profile-photo']['tmp_name'];
    
    //Sample 2
    $profile_photo = $_FILES['profile-photo'];
    echo "The filename is <b>" . $profile_photo['name'] . "</b><br>";
    echo "The file type is <b>" . $profile_photo['type'] . "</b><br>";
    echo "The file size is <b>" . ($profile_photo['size'] / 1024). " kb </b><br>";
    echo "The tmp name is <b>" . ($profile_photo['tmp_name'] / 1024). " kb </b><br>";

    echo "<pre>";
      print_r($profile_photo);
    echo "</pre>";

    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    $maxFileSize = 1 * 1024 * 1024; // 1MB

    //check for the file types and compare the uploaded file type in the $allowedTypes array.
    if(!in_array($filetype, $allowedTypes)) {
      echo "<script> alert('Error: Invalid file type'); window.location='insert_student.php'; </script>";
      exit();
    } else {
      //echo 'The file type is acceped in the $allowedTypes array';
    }

    if($filesize > $maxFileSize) {
      echo "<script> alert('Error: File size exceeds the maximum limit of 1MB'); window.location='insert_student.php'; </script>";
      exit();
    }


    //check the students table if naa bay kaparehas sa $lrn
    $sql = "SELECT * FROM students WHERE lrn = '$lrn'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
      echo "<script>alert('Student with LRN $lrn already exists!');</script>";
    } else {
      // insert the student 
      $uploadPath = "uploads/" . basename($filename);
      move_uploaded_file($tmp_name, $uploadPath);


      $sql = "INSERT INTO students (lrn, lastname, firstname, middlename, birthdate, filepath)";
      $sql .= "VALUES ('$lrn', '$lastname', '$firstname', '$middlename', '$birthdate', '$uploadPath')";
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
