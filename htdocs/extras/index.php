<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Column Layout</title>
    <link rel="stylesheet" href="extras/style.css">
</head>
<body>

    <nav>
        <ul class="menu">
            <li class="menu-item">
                <a href="#">Students</a>
                <ul class="submenu">
                    <li><a href="#">View Students</a></li>
                    <li><a href="#">Edit Students</a></li>
                    <li><a href="#">Add Students</a></li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="#">Courses</a>
                <ul class="submenu">
                    <li><a href="#">View Courses</a></li>
                    <li><a href="#">Edit Courses</a></li>
                    <li><a href="#">Add Courses</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="column left">
            <h2>Left Column Content</h2>
            <p>This is the left column. You can add any content here, such as text, images, or anything else you'd like to display in this section of the layout.</p>
        </div>
        <div class="column right">
            <h2>Right Column Content</h2>
            <p>This is the right column. It's a perfect place for additional content, widgets, or any other elements you'd like to showcase alongside the left column.</p>
        </div>
    </div>

</body>
</html>
