<?php
  include("header.php");
?>
  <body>
<?php
  include("menu.php");
?>
    <table border="1" align="center" cellspacing="0" cellpadding="10">
      <tr>
        <th colspan="3">List of Students</th>
      </tr>
      <tr>
        <th> LRN </th>
        <th> Student Complete Name</th>
        <th> Birthdate </th>
      </tr>
      
      <?php
      //Show the list of students

      $sql = "SELECT * FROM students ORDER BY lastname ASC";

      $query = mysqli_query($conn, $sql);

      // if $query is false, then there was an error
      if(!$query) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      // when $query is true, display the data
        while($result = mysqli_fetch_assoc($query)) {
          echo "<tr>";
          echo "<td>" . $result["lrn"] . "</td>";
          echo "<td>" . $result["lastname"] . ", " . $result['firstname'] . " " . $result['middlename'] ."</td>";
          // echo "<td>{$result["lastname"]}, {$result['firstname']} </td>";
          /*
              F - full name of the month (January)
              d - day of the month (1-31)
              Y - year in 4 digits
              strtotime - converts a date string to a timestamp
          */
          echo "<td>" . date("F d, Y", strtotime($result["birthdate"])) . "</td>";
          echo "</tr>";
        }
      ?>
    </table>
  </body>
</html>