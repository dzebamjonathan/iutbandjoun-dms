<?php
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../resources/views/account');
$twig = new \Twig\Environment($loader);


// show the template for this file
echo $twig->render('dashboard.twig');
