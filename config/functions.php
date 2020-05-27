<?php
function render($template_name, $params = []) {
    echo $twig->render($template_name, $params);
}