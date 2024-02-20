<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../assets/dist/css/main.css" />
    <title>Portfolio</title>
</head>

<body>
    <?php
    $components = [
        'navbar.php',
        'hero.php',
        'gallery.php',
        'content-layout-portfolio.php',
        'trust-us.php',
        'content-layout-project.php',
        'content-layout-cta.php',
        'testimonials.php',
        'footer.php',
    ];

    // Parcours du tableau et inclusion de chaque fichier de composant
    foreach ($components as $component) {
        include __DIR__ . '/../../_partials/' . $component;
    }
    ?>
</body>

</html>