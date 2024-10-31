<?php 
    include('../project_IT4/database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Class - PHP File Uploads</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <label for="caption">Caption</label><br>
            <input type="text" name="caption"><br><br>
        <label for="upload">Select file: </label><br>
            <input type="file" name="upload"><br><br>
            <span>Maximum of 1mb only</span><br>
        <button type="submit" name='process-upload'>Upload</button>
    </form>

    <?php
        if(isset($_POST['process-upload'])) {
            echo "<pre>";
                print_r($_FILES['upload']);
            echo "</pre>";

            // Declare variables for processing text-based data.
            $caption = trim($_POST['caption']);


            // Simplifying $_FILES['upload'] into a local variable
            $filename = $_FILES['upload']['name'];
            $filetype = $_FILES['upload']['type'];
            $tmp_name = $_FILES['upload']['tmp_name'];
            $filesize = $_FILES['upload']['size'];

            // File validation and processing
            $allowedFileTypes = ['image/jpeg', 'image/jpg', 'image/png']; // .jpg, .jpeg, .png
            $maxFileSizeLimit = 1 * 1024 * 1024; // 1mb

            if(!in_array($filetype, $allowedFileTypes)) {
                echo "<script> alert('Uploaded file not in allowed list'); </script>";
            }

            if($filesize > $maxFileSizeLimit) {
                echo "<script> alert('Uploaded file exceeds the allowed limit.'); </script>";
            }

            // Move the quarantined file to the folder
            $upload_path = "uploads/" . basename($filename);
            
            $sql = "INSERT INTO uploads (caption, filepath) VALUES ('$caption', '$upload_path')";

            if(mysqli_query($conn, $sql)) {
                move_uploaded_file($tmp_name, $upload_path);
                echo "<script> alert('File is uploaded with caption'); window.location='display-uploads.php'; </script>";
            }
        }
    ?>


</body>

</html>