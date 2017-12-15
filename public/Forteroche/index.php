<?php
// 2 = 2 folder parent
define('ROOT', dirname(__DIR__, 2));
require ROOT.'/app/App.php';

App::load();

//start the session if it is not started automatically by the server
if (!isset($_SESSION)) {
    session_start();
}

App::router();
