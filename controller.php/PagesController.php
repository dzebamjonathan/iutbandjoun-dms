<?php
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($loader);

class PagesController {
    public function index() {
        $template = 'index.html';
        
    }
}