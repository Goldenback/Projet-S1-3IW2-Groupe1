<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Charger la configuration du template
$config = require  __DIR__ . '/../Config/Config.php';
$templateConfig = $config['template'];

// Générer le contenu du fichier SCSS avec les variables dynamiques
$scssContent = <<<SCSS

\$primary-color: {$templateConfig['primaryColor']};
\$secondary-color: {$templateConfig['secondaryColor']};

SCSS;

// Chemin vers le fichier SCSS de variables dynamiques
$dynamicVariablesPath = __DIR__ . '/../Front-end/Workspace/src/css/partials/_dynamic-variables.scss';

// Écrire les variables dans le fichier
file_put_contents($dynamicVariablesPath, $scssContent);
echo 'Script exécuté avec succès.';