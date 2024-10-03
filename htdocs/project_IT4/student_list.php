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
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th> LRN </th>
        <th> Student Complete Name</th>
        <th> Birthdate </th>
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
          echo "</tr>";
        }
        mysqli_close($conn);
      ?>
    </table>
  </div>
</div>

</body>
</html>