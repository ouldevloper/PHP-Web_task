<?php

require_once "app/system/autoloader.php";
require_once "app/system/env.php";


use SYSTEM\Session;
use Controllers\UserController;

Session::start();

if(isset($_GET['p'])){
    $files = scandir('app/views/');
    $page = $_GET['p'].".php";
    if(in_array($page,$files)){
        include "app/views/$page";
    }else{
        include "app/views/404.php";
    }
}else{
    include "app/views/404.php";
}


