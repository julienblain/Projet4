<?php

define('ROOT', dirname(__DIR__));
require ROOT.'/app/App.php';

App::load();
//lancement de la session si par lancé automatiquement par le sever
if (!isset($_SESSION)) {
    session_start();
}

App::router();
