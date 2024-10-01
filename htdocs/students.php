<?php
    include("database.php");
    include("header.php");
?>
    
    <h3> List of Students </h3>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Learners' Reference Number</th>
            <th>Students' Complete Name</th>
            <th>Birthdate</th>
        </tr>
        <?php 
            $sql = "SELECT * FROM students ORDER BY lastname ASC";
            $query = mysqli_query($connection, $sql);
            while($result = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $result['lrn'] . "</td>";
                // echo "<td>" . $result['lastname'] . ", " . $result['firstname'] . "</td>";
                echo "<td>{$result['lastname']}, {$result['firstname']}</td>";
                echo "<td>" . date("F d, Y", strtotime($result['birthdate'])) . "</td>";
                echo "</tr>";
            }
        ?>
    </table>

    </center>
</body>
</html>