<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/main.css" />
    <title>Home</title>
</head>
<body>
<?php

$components = [
    'loader.php',
    'navbar.php',
    'hero.php',
    'content-layout.php',
    'content-layout-project.php',
    'gallery.php',
    'trust-us.php',
    'testimonial.php',
    'FAQ.php',
    'contact-us.php',
    'footer.php',
];

foreach ($components as $component) {
    include __DIR__ . '/../Front-Office/layout/' . $component;
}
?> 
</body>
</html>
