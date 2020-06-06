<?php
session_start();
$flash_message ="we wish you find reason to study with us!!";

echo "Session: " . $_SESSION['active_user'];

$success_message= array();

require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../resources/views/account');
$twig = new \Twig\Environment($loader);



if(isset($flash_message) && !empty($flash_message)) {
    // show the template for this file
    echo $twig->render('dashboard.twig', [
        'flash_message' => $flash_message
    ]);
}else {
    // show the template for this file
    echo $twig->render('dashboard.twig');
}



