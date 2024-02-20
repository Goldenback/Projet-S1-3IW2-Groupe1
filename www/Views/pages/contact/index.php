<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../assets/dist/css/main.css" />
    <title>Contact</title>
</head>
<body>
<?php
//include __DIR__ . '/../Front-Office/layout/';
$components = [
    'navbar.php',
    'contact-us.php',
    'trust-us.php',
    'testimonials.php',
    'FAQ.php',
    'footer.php',
];

// Parcours du tableau et inclusion de chaque fichier de composant
foreach ($components as $component) {
    include __DIR__ . '/../../_partials/' . $component;
}
?> 
</body>
</html>
