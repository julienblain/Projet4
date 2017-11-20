<?php

define('ROOT', dirname(__DIR__, 2));
require ROOT.'/app/App.php';

App::load();

//lancement de la session si par lancé automatiquement par le sever
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET['p']) && ($_GET['p'] != 'logged.connection')) {
    $page = $_GET['p'];
}
else {
    $page = 'logged.connection';
}

$page = \explode('.', $page);

//si on chapitre est selectionné a la lecture
if((count($page) > 2) && ($page[0] == 'posts')) {
    $controller = '\App\Admin\\' . ucfirst($page[0]) .'Controller';

    $action = $page[0]. ucfirst($page[2]);

} else {
    $controller = '\App\Admin\\' . ucfirst($page[0]) .'Controller';
    $action = $page[0].$page[1];
}

$controller = new $controller;
$controller->$action();
