<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Image Grid with Captions</title>
    <style>
        .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .image-item {
            text-align: center;
        }

        .image-item img {
            width: 100%;
            height: auto;
        }

        .caption {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="image-grid">
        <?php 
            $sql = "SELECT * FROM uploads";
            $query = mysqli_query($conn, $sql);
            while($result = mysqli_fetch_assoc($query)) {
                echo '<div class="image-item">';
                echo "<img src='{$result['filepath']}' alt='{$result['filename']}'>";
                echo '<p class="caption">' . $result['filename'] . '</p>';
                echo "</div>";
            }
        ?>

    </div>
</body>

</html>