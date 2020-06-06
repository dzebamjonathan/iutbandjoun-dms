<?php
session_start();

require_once '../vendor/autoload.php';
require_once '../classes/database.php';
require_once '../config/functions.php';

// check if user is logged in
if(!is_logged_in()) {
    header("Location: ../login.php?authentication_failed=true");
}

$loader = new \Twig\Loader\FilesystemLoader('../resources/views/account');
$twig = new \Twig\Environment($loader);

$DB = new DB();

$messages = $DB->selectAll('messages');


// show the template for this file
echo $twig->render('inbox.twig', [
    'messages' => $messages
]);
?>

