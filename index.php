<?php
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('resources/views');
$twig = new \Twig\Environment($loader);


// show the template for this file
echo $twig->render('index.html', [
    'name' => 'Bless Darah', 
    'project' => 'IUT Bandjoun'
]);