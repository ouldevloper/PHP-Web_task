<?php
namespace Controllers;
use Models\UserModel;
use SYSTEM\Security;
use SYSTEM\Connection;
use SYSTEM\Session;
class UserController{
    private $tablename = "Models\User";
    public function register($params){
        try{
            $sql = "insert into users(username,fullname,password,email,phone,last_access) values(?,?,?,?,?,?)";
            if(Connection::exec($sql,$params)){
                sleep(5);
                Security::Redirect("/?p=login");
            }
        }catch(Exception $er ){
            echo $er;
            die();
        } 
    }
    public function login($user,$pass){
        $sql = "select * from users where (username=? or email=?)";
        $res = Connection::fetch($sql,[$user,$user],$this->tablename)[0];    
        if(isset($res) && Security::check_pwd($pass,$res->password)){
                Session::set("id",$res->id);
                Session::set("fullname",$res->fullname);
                Session::set("username",$res->username);
                Session::set("email",$res->email);
                Session::set("phone",$res->phone);
                Session::set("status","logged_in");
                Security::Redirect("/?p=home");
        }else{
            echo "Not Found";
        }
    }
    public static function logout(){
        if("" === session_id()){
            Session::end();
            Security::Redirect("/?p=login");
        }
    }
    public function updateProfile($fullname,$username,$email,$phone,$password=""){
        $sql = "update users set fullname=?,username=?,email=?,phone=?";
        if($password!==""){ 
            $sql .= ", password=? where id=?";
            $password = Security::crypt_pwd($password);
            $params = [$fullname,$username,$email,$phone,$password,Session::get('id')];
            if(Connection::exec($sql,$params)){
                Session::set("fullname",$fullname);
                Session::set("username",$username);
                Session::set("email",$email);
                Session::set("phone",$phone);
            }
        }else{
            $sql.=" where id=?";
            $params = [$fullname,$username,$email,$phone,Session::get('id')];
            if(Connection::exec($sql,$params)){
                Session::set("fullname",$fullname);
                Session::set("username",$username);
                Session::set("email",$email);
                Session::set("phone",$phone);
            }
        }
        header("location:/?p=home");
    }
}