<?php

spl_autoload_register(function($className){
    $class = str_replace('\\','/',$className);
    $class = trim($class,'/');
    $filepath = "app/".strtolower($class).".php";
    if(file_exists($filepath)){
        require_once $filepath;
    }
});