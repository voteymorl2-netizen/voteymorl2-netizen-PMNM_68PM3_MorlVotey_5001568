<?php

session_start();

require_once '../app/core/controller.php';
require_once '../app/core/App.php';
require_once '../app/middleware.php';

$middleware = new Middleware();
$middleware->checkLogin();

$app = new App();

?>