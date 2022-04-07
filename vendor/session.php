<?php
namespace APP;
class Session{
    public static function start(){
        echo "starting session";
        session_start();
    }
    public static function get($key){
        if(isset($_SESSION[$key]))
        return $_SESSION[$key];
        else return false;
    }
    public static function set($key,$value){
        $_SESSION[$key]=$value;
    }
    public static function end(){
        session_unset();
        session_destroy();
    }
}