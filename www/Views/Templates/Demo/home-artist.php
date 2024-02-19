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

$bytesWritten = file_put_contents($dynamicVariablesPath, $scssContent);
if ($bytesWritten === false) {
    echo "Erreur lors de l'écriture du fichier.";
} else {
    echo "Fichier écrit avec succès, $bytesWritten octets écrits.";
}


?> 
</body>
</html>
