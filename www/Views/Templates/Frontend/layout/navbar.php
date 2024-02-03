<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/main.css" />
</head>

<body>

<nav class="navbar" style="background-color: <?= $backgroundColor ?? 'white' ?> ">
    <div class="container">
        <h2 class="navbar-title">
            <?= $urlLogo ?? 'Logo'?>
        </h2>
        <ul class="navbar-links">
            <li>
                <a href="/about">About Us</a>
            </li>
            <li>
                <a href="/service">Projects</a>
            </li>
            <li>
                <a href="/home">Services</a>
            </li>
        </ul>
        <a href="/contact" class="btn">Contact</a>
    </div>
    <hr>
</nav>

</body>
</html>
