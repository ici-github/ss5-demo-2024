<?php
    include("db_connect.php");
?>
<body>
<?php
    include("header.php");
    include("menu.php");
?>
<?php 
    if (isset($_GET['action']) && isset($_GET['lrn'])) {
        $action = trim($_GET['action']);
        $lrn = trim($_GET['lrn']);

        if($action == 'edit') {
            $sql = mysqli_query($conn,"SELECT * FROM students WHERE lrn = $lrn");
            $student = mysqli_fetch_assoc($sql);
        }
    }
    
?>
    <h1> Edit Students </h1>
    <form method="post">
        <table border=1 align="center" cellspacing="0" cellpadding="10">
            <tr>
                <td> LRN </td>
                <td> <input type="text" name="lrn" value="<?php echo $student['lrn']; ?>" required> </td>
            </tr>
            <tr>
                <td> Last Name </td>
                <td> <input type="text" name="lastname" value="<?php echo $student['lastname']; ?>" required> </td>
            </tr>
            <tr>
                <td> First Name </td>
                <td> <input type="text" name="firstname" value="<?php echo $student['firstname']; ?>" required> </td>
            </tr>
            <tr>
                <td> Birthdate </td>
                <td> <input type="date" name="birthdate" value="<?php echo $student['birthdate']; ?>" required> </td>
            </tr>
            <tr>
                <input type="hidden" name="oldlrn" value="<?php echo $student['lrn']; ?>">
                <td colspan="2">
                    <button type="submit" name="edit_student"> Save Changes to Student </button>
                </td>
            </tr>
    </form>
    <?php
        if(isset($_POST['edit_student'])) {
            $lrn = $_POST['lrn'];
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $birthdate = $_POST['birthdate'];
            $oldlrn = $_POST['oldlrn'];

            $sql = "SELECT * FROM students WHERE lrn = '$lrn'";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0) {
                echo "<script> alert('Student already exists'); </script>";
            } else {
                $sql = "UPDATE students SET lrn = '$lrn', lastname = '$lastname', firstname = '$firstname', birthdate = '$birthdate' WHERE lrn = $oldlrn";
                $query = mysqli_query($conn, $sql);
                if($query) {
                    echo "<script> alert('Student updated successfully'); window.location='student_list.php';</script>";
                } else {
                    echo "<script> alert('Error: " . $sql . "<br>" . mysqli_error($conn) . "'); </script>";
                }
            }
                
        }
    ?>
</body>
</html>