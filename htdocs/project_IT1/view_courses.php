<?php
    include("database.php");
?>
<body>
<?php
    include("header.php");
    include("menu.php");
?>
    <h1 style="text-align: center;"> Course List </h1>
    <table border="1" align="center" cellspacing="0" cellpadding="10">
        <tr>
            <th> Course Code </th>
            <th> Course Description </th>
            <th> Number of Students </th>
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
                echo "<td align='center'>";
                    $count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS num_of_students FROM students_courses WHERE course_code = '{$result["course_code"]}'"));

                    echo "<a href='enrolled_students_by_course.php?course_code={$result["course_code"]}'>{$count['num_of_students']}</a>";
                echo "</tr>";
            }
        }
    ?>
</body>
</html>