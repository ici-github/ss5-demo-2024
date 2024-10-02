<?php
    include("db_connect.php");
?>
<body>
<?php
    include("header.php");
    include("menu.php");
?>
    <h1> Course List </h1>
    <table border="1" align="center" cellspacing="0" cellpadding="10">
        <tr>
            <th> Course Code </th>
            <th> Course Description </th>
        </tr>
    <?php 
        $sql = "SELECT * FROM courses";
        $query = mysqli_query($conn, $sql);
        if(!$query) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } else {
            while($result = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $result["course_code"] . "</td>";
                echo "<td>" . $result["description"] . "</td>";
                echo "</tr>";
            }
        }
    ?>
</body>
</html>