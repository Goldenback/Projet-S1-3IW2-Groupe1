<?php

// Définition des configurations de template
$templateLight = [
    'name' => 'Mon Application',
    'colorPrimary' => '#FFF2D8', // main bg-color
    'colorSecondary' => '#113946', // main item-color -> dark
    'fontPrimary' => 'Lato', // main font
    'fontSecondary' => 'Playfair Display', // title font
];

$templateOrange = [
    'name' => 'Mon Application',
    'colorPrimary' => '#F0E3CA', // main bg-color
    'colorSecondary' => '#1B1A17', // main item-color -> dark
    'fontPrimary' => 'Lato', // main font
    'fontSecondary' => 'Playfair Display', // title font
];

// Retourne un tableau contenant les configurations
return [
    'templateLight' => $templateLight,
    'templateOrange' => $templateOrange,
];
?>
