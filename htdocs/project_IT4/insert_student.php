<?php
  include("header.php");
  include("database.php");
?>
<div class="container">
<?php
  include("menu.php");
?>
  <div class="content">
    <h1> Insert Student </h1>
    <form method="post">
        <table border="1" align="center" cellpadding="10" cellspacing="0" style="width: 350px;">
            <tr>
                <td> LRN </td>
                <td> <input type="text" name="lrn" required> </td>
            </tr>
            <tr>
                <td> First Name </td>
                <td> <input type="text" name="firstname" required> </td>
            </tr>
            <tr>
                <td> Middle Name </td>
                <td> <input type="text" name="middlename"> </td>
            </tr>
            <tr>
                <td> Last Name </td>
                <td> <input type="text" name="lastname" required> </td>
            </tr>
            <tr>
                <td> Birthdate </td>
                <td> <input type="date" name="birthdate" required> </td>
            </tr>
            <tr>
                <td colspan="2">
                  <button type="submit" style="width:100%" name="insert_student"> Insert Student </button>
                </td>
            </tr>
        </table>
    </form>
    <?php
      if(isset($_POST['insert_student'])) {
        $lrn = $_POST['lrn'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $birthdate = $_POST['birthdate'];

        $sql = "SELECT * FROM students WHERE lrn = '$lrn'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
          echo "<script>alert('LRN already exists!')</script>";
        } else {
          $sql = "INSERT INTO students (lrn, firstname, middlename, lastname, birthdate) ";
          $sql .= "VALUES ('$lrn', '$firstname', '$middlename', '$lastname', '$birthdate')";
          $query = mysqli_query($conn, $sql);
          if($query) {
            echo "<script>alert('Student inserted successfully!'); window.location='student_list.php';</script>";
          } else {
            echo "<script>alert('Error: " . $sql . "<br>" . mysqli_error($conn) . "')</script>";
          }
        }
      }
    ?>
  </div>
</div>

</body>
</html>