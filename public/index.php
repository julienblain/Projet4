<?php
define('ROOT', dirname(__DIR__));
require ROOT.'/app/App.php';
App::load();
echo ROOT;
if (isset($_GET['p'])) {
    $page = $_GET['p'];
}
else {
    $page = 'posts.index';
}
echo $page;
//routing en explosant on sait vers qul namespace aller
$page = \explode('.', $page);
//TODO faire le cas admin
if((count($page) > 2) && ($page[0] == 'posts') && ($page[2] == 'comments')) {
    $controller = '\App\Controller\\' . ucfirst($page[0]) .'Controller';
    $action = $page[2];
} else {
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];
}



$controller = new $controller();
$controller->$action();
