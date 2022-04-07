<?php
require_once "vendor/autoloader.php";
require_once "vendor/application.php";
require_once "vendor/env.php";
use APP\Application;

use APP\Session;

//Session::start();
Application::getInstance()->run();
//Session::end();

?>