<?php
  include("header.php");
  include("database.php");
?>
<div class="container">
<?php
  include("menu.php");
?>
  <div class="content">
    <h1> Student List </h1>
    <form method="post">
      <select name="lrn">
        <option value="">--- SELECT STUDENT BELOW ---</option>
        <?php
          $sql = "SELECT * FROM students ORDER BY lastname";
          $query = mysqli_query($conn, $sql);
          while($result = mysqli_fetch_assoc($query)) {
            echo "<option value='{$result['lrn']}'> {$result['lastname']}, {$result['firstname']} </option>";
          }
        ?>
      </select><br>
      <button type="submit" name="delete_student" class="button"> Delete </button>
    </form>
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th> LRN </th>
        <th> Student Complete Name</th>
        <th> Birthdate </th>
        <th> Action </th>
      </tr>
      <?php
        $sql = "SELECT * FROM students ORDER BY lastname";
        $query = mysqli_query($conn, $sql);
        while($result = mysqli_fetch_assoc($query)) {
          echo "<tr>";
          echo "<td>" . $result["lrn"] . "</td>";
          echo "<td>" . $result["lastname"] . ", " . $result['firstname'] . " " . $result['middlename'] . "</td>";
          // echo "<td> {$result["lastname"]}, {$result["firstname"]}";
          // echo "<td>" . $result['birthdate'] . "</td>";
          /*
              F - full name of the month (January)
              d - day of the month (1-31)  
              Y - year in 4 digits
              strtotime - convert the date in number of seconds since January 1, 1970
          */
          echo "<td>" . date("F d, Y", strtotime($result["birthdate"])) . "</td>";
          echo "<td>";
          echo "<a class='button' href='student_list.php?action=delete&lrn={$result["lrn"]}'>Delete</a>";
          echo "</td>";
          echo "</tr>";
        }
      ?>
    </table>
    <?php
      if(isset($_GET['action']) && isset($_GET['lrn'])){
        $action = $_GET['action'];
        $lrn = $_GET['lrn'];

        if($action == 'delete') {
          $sql = "DELETE FROM students WHERE lrn = $lrn";
          if(mysqli_query($conn, $sql)) {
            echo "<script> alert('Student has been deleted'); window.location='student_list.php'; </script>";
          }
        }
      }
    ?>
    <?php
      if(isset($_POST['delete_student'])) {
        $lrn = $_POST['lrn'];
        $sql = "DELETE FROM students WHERE lrn = $lrn";
        if(mysqli_query($conn, $sql)) {
          echo "<script> alert('Student has been deleted'); window.location='student_list.php'; </script>";
        }
      }
    ?>
  </div>
</div>

</body>
</html>