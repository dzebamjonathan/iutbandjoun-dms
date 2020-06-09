<?php


// check is user is logged in
function is_logged_in() {
    return isset($_SESSION['active_user']) && !empty($_SESSION['active_user']);
}

function is_admin() {
    return isset($_SESSION['admin']) && !empty($_SESSION['admin']);
}

// handle get
function get($value) {
    return $_GET[$value];
}


// handle post
function post($value) {
    return $_POST[$value];
}