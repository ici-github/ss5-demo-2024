<?php include ('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Upload Form</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label for="upload_file">Choose a file to upload:</label><br>
        <input type="file" name="file_upload" id="upload_file"> <br>
        Maximum of 1mb per file<br>

        <button type="submit" name='process-upload'>Submit</button>
    </form>

    <?php 
        if(isset($_POST['process-upload'])) {
            echo "<pre>";
            print_r($_FILES);
            echo "</pre>";

            /*
                Traditional Version:
                $_FILES['file_upload']['name']
                $_FILES['file_upload']['type']
                $_FILES['file_upload']['tmp_name']
                $_FILES['file_upload']['size']

                Simplified Version:
                $filename = $_FILES['file_upload']['name'];
                $filetype = $_FILES['file_upload']['type'];
                $tmpname = $_FILES['file_upload']['tmp_name'];
                $filesize = $_FILES['file_upload']['size'];

                Standard Version:
                $file_upload = $_FILES['file_upload'];
                $file_upload['name'];
                $file_upload['type'];
                $file_upload['tmp_name'];
                $file_upload['size'];
            */

            $filename = $_FILES['file_upload']['name'];
            $filetype = $_FILES['file_upload']['type'];
            $tmpname = $_FILES['file_upload']['tmp_name'];
            $filesize = $_FILES['file_upload']['size'];
            
            //Allowed File Types to be processed.
            $allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/tiff'];
            if(!in_array($filetype, $allowedFileTypes)) {
                echo "<script> alert('File type does not match to the allowed types'); window.location='upload_form.php'; </script>";
                exit();
            }

            $maximumFileSize = 1 * 1024 * 1024; //impose a 1mb limit on every file upload
            if($filesize > $maximumFileSize) {
                echo "<script> alert('File only accepts 1mb only.'); window.location='upload_form.php'; </script>";
                exit();
            }
            $modifiedFilename = uniqid()."_".time()."_".uniqid()."_".$filename;
            $uploadPath = "uploads/" . basename($modifiedFilename);
            move_uploaded_file($tmpname, $uploadPath);

            $sql = "INSERT INTO uploads (filename, filepath) VALUES ('$filename', '$uploadPath')";
            if(mysqli_query($conn, $sql)) {
                echo "<script> alert('Image file uploaded'); window.location='gallery.php'; </script>";
            }
        }
    ?>
</body>
</html>