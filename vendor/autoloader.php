<?php
namespace APP;
spl_autoload_register(function($className){

    if(strpos($className,'APP')){
        $class = str_replace('APP','',$className);
        $class = str_replace('\\','/',$class);
        $class = trim($class,'/');
        $filepath = "vendor/".strtolower($class).".php";
        if(file_exists($filepath)){
            print $filepath;
            require_once $filepath;
        }
    }
    //else if(strpos($className,'CONTROLLERS')){
    //    $class = str_replace('CONTROLLERS','',$className);
    //    $class = str_replace('\\','/',$class);
    //    $class = trim($class,'/');
    //    $filepath = "conttroller/".strtolower($class).".php";
    //    if(file_exists($filepath))
    //        require_once $filepath;
    //}else if(strpos($className,'MODELS')){
    //    $class = str_replace('MODELS','',$className);
    //    $class = str_replace('\\','/',$class);
    //    $class = trim($class,'/');
    //    $filepath = "model/".strtolower($class).".php";
    //    if(file_exists($filepath))
    //        require_once $filepath;
    //} 
});