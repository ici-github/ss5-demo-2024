<?php
    include("db_connect.php");
?>
<body>
<?php
    include("header.php");
    include("menu.php");
?>
    <h1> Insert Students </h1>
    <form method="post">
        <table border=1 align="center" cellspacing="0" cellpadding="10">
            <tr>
                <td> LRN </td>
                <td> <input type="text" name="lrn" required> </td>
            </tr>
            <tr>
                <td> Last Name </td>
                <td> <input type="text" name="lastname" required> </td>
            </tr>
            <tr>
                <td> First Name </td>
                <td> <input type="text" name="firstname" required> </td>
            </tr>
            <tr>
                <td> Birthdate </td>
                <td> <input type="date" name="birthdate" required> </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="insert_student"> Insert Student </button>
                </td>
            </tr>
    </form>
    <?php
        if(isset($_POST['insert_student'])) {
            $lrn = $_POST['lrn'];
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $birthdate = $_POST['birthdate'];

            $sql = "SELECT * FROM students WHERE lrn = '$lrn'";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0) {
                echo "<script> alert('Student already exists'); </script>";
            } else {
                $sql = "INSERT INTO students (lrn, lastname, firstname, birthdate) VALUES ('$lrn', '$lastname', '$firstname', '$birthdate')";
                $query = mysqli_query($conn, $sql);
                if($query) {
                    echo "<script> alert('Student inserted successfully'); window.location='student_list.php';</script>";
                } else {
                    echo "<script> alert('Error: " . $sql . "<br>" . mysqli_error($conn) . "'); </script>";
                }
            }
                
        }
    ?>
</body>
</html>