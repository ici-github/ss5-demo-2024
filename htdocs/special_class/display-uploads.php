<?php 
    include('../project_IT4/database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 10px;
        }

        .image-grid img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="image-grid">
        <?php 
            $sql = "SELECT * FROM uploads";
            $query = mysqli_query($conn, $sql);
            while($result = mysqli_fetch_assoc($query)) {
                echo "<img src='{$result['filepath']}' class='image-grid img'>";
            }

        ?>
    </div>
</body>

</html>