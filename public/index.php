<?php
define('ROOT', dirname(__DIR__));
require ROOT.'/app/App.php';
if (isset($_SESSION)) {
    echo 'ok';
}

App::load();
//lancement de la session si par lancé automatiquement par le sever
if (!isset($_SESSION)) {
    session_start();
}


if (isset($_GET['p'])) {
    $page = $_GET['p'];
}
else if(isset($_GET['logout'])) {
    
    session_destroy();
    $page = 'posts.index';
}
else {
    $page = 'posts.index';
}

//routing en explosant on sait vers qul namespace aller
$page = \explode('.', $page);
//TODO faire le cas admin
if((count($page) > 2) /*&& ($page[0] == 'posts') && ($page[2] == 'selected')*/) {
    $controller = '\App\Controller\\' . ucfirst($page[0]) .'Controller';

    $action = $page[0]. ucfirst($page[2]);

} else {
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}

$controller = new $controller();
$controller->$action();
