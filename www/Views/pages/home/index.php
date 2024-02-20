<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../assets/dist/css/main.css" />
    <title>Home</title>

    <style>
        body {
            background-color: <?php echo $config['colorPrimary']; ?>;
            color: <?php echo $config['colorSecondary']; ?>;
            font-family: '<?php echo $config['fontPrimary']; ?>', sans-serif;
        }

        h1, h2, h3 {
            font-family: '<?php echo $config['fontSecondary']; ?>', sans-serif;
        }
    </style>

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
    include __DIR__ . '/../../_partials/' . $component;
}
?> 
</body>
</html>
