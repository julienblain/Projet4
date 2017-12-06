<?php

// 2 = nb dossier parent
define('ROOT', dirname(__DIR__, 2));
require ROOT.'/app/App.php';

App::load();

//lancement de la session si par lancé automatiquement par le sever
if (!isset($_SESSION)) {
    session_start();
}

App::router();
