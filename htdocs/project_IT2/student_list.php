<?php
    include("db_connect.php");
?>
<body>
<?php
    include("header.php");
    include("menu.php");
?>
    <h1> Student List </h1>
    <table border="1" align="center" cellspacing="0" cellpadding="10">
        <tr>
            <th> LRN </th>
            <th> Student Complete Name </th>
            <th> Birthdate </th>
        </tr>
    <?php 
        $sql = "SELECT * FROM students";
        $query = mysqli_query($conn, $sql);
        if(!$query) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } else {
            while($result = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $result["lrn"] . "</td>";
                echo "<td>" . $result["lastname"] . ", " . $result['firstname'] . "</td>";
                //echo "<td> {$result["lastname"]}, {$result["firstname"]} </td>";
                // echo "<td>" . $result['birthdate'] . "</td>";
                /*
                    January 01, 2001
                    F - full name of the month (January)
                    d - day of the month (1-31)
                    Y - year in 4 digits
                    strtotime - converts a date string to a timestamp
                */
                echo "<td>" . date("F d, Y", strtotime($result["birthdate"])) . "</td>";
                echo "</tr>";
            }
        }
    ?>
</body>
</html>