<?php

define('ROOT', dirname(__DIR__, 2));
require ROOT.'/app/App.php';

App::load();
if (isset($_GET['p']) && ($_GET['p'] != 'logged.connection')) {
    $page = $_GET['p'];
    
}
// elseif ((isset($_POST['login'])) && (isset($_POST['password']))) {
//     $page = 'logged.login';
// }
else {
    $page = 'logged.connection';
}
$page = \explode('.', $page);
$controller = '\App\Admin\\' . ucfirst($page[0]) .'Controller';
$action = $page[1];

$controller = new $controller;
$controller->$action();
