<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Front-end/Workspace/dist/css/main.css" />
    <title>Document</title>
</head>
<body>
<?php
//include __DIR__ . '/../Front-Office/layout/';
$components = [
    'navbar.php',
    'hero.php',
    'content-layout.php',
    'content-layout-project.php',
    'gallery.php',
    'trust-us.php',
    'testimonials.php',
    'FAQ.php',
    'contact-us.php',
    'footer.php',
];

// Parcours du tableau et inclusion de chaque fichier de composant
foreach ($components as $component) {
    include __DIR__ . '/../Front-Office/layout/' . $component;
}


?> 
</body>
</html>
