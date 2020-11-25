<?php

namespace Chat;

ini_set('session.gc_maxlifetime', 600);
ini_set('session.cookie_lifetime', 0);
session_set_cookie_params(0);
session_start();

require_once("sqlite/db.php");
require_once("constants/consts.php");



$path = $_REQUEST['path'];
$list_of_path = array(
    "login",
    "register",
    "send_message",
    "get_users",
    "get_messages",
    "chat",
    "logout"
);
$list_of_exception = array(
    "_data",
    "get_messages",
    "get_users",
    "send_message"
);

function run_action($path, $list_of_path): string
{
    $action = in_array($path, $list_of_path) ? 'actions/' . $path . '.php' : 'actions/error_404.php';
    return include $action;
}

function render($path, array $vars = []): string
{
    extract($vars);
    ob_start();
    require_once 'views/' . $path . '.php';
    $content = ob_get_contents();
    ob_clean();
    return $content;
}


if (!in_array($path, $list_of_exception)) {
    $content = run_action($path, $list_of_path);
    $template = render('base_template', ['content' => $content]);
    print $template;
} else {
    run_action($path, $list_of_path);
}