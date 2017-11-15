<?php

define('ROOT', dirname(__DIR__, 2));
require ROOT.'/app/App.php';

App::load();
if (isset($_GET['p'])) {
    $page = $_GET['p'];
}
else {
    $page = 'logged.connection';
}
$page = \explode('.', $page);
$controller = '\App\Admin\\' . ucfirst($page[0]) .'Controller';
$action = $page[1];

$controller = new $controller;
$controller->$action();
