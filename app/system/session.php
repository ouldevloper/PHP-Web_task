<?php
namespace SYSTEM;
class Session{
    public static function start(){
        if(''===session_id())
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
        $_SESSION = [];
        session_unset();
        session_destroy();
    }
}