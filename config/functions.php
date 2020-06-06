<?php


// check is user is logged in
function is_logged_in() {
    return isset($_SESSION['active_user']) && !empty($_SESSION['active_user']);
}