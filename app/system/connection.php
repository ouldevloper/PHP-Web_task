<?php
namespace SYSTEM;
use PDO;
class Connection{
    private static $cnx=null;
    private function __construct(){}
    private static function Instanse(){
        if(self::$cnx === null){ 
            $host   = env("MYSQL_HOST");
            $port   = env("MYSQL_POSRT");
            $db     = env("MYSQL_DB");
            $user   = env("MYSQL_USER");
            $pass   = env("MYSQL_PASS");
            try{
                self::$cnx = new \PDO("mysql:host=$host:$port;dbname=$db","$user","$pass");
                //self::$cnx = new \PDO("mysql:host=127.0.0.1:3306;dbname=sn","root","user");
            }catch(PDOException $er){
                self::$cnx = null;
            }
        }
    }

    public static function exec($sql,$params=[]){
        try{
            static::Instanse();
            $stmnt = self::$cnx->prepare($sql);
            $stmnt->execute($params);
            return true;
        }catch(PDOException $er){
            return false;
        }
    } 

    public static function fetch($sql,$params=[],$cls){
        try{
            static::Instanse();
            $stmnt = self::$cnx->prepare($sql);
            $stmnt->execute($params);
            $stmnt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $cls);
            $res = $stmnt->fetchAll();
            return $res;
        }catch(PDOException $er){
            echo $er;
            return false;
        }
    }

}