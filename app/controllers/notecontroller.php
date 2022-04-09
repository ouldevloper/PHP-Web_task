<?php

namespace Controllers;
use SYSTEM\Connection;
use SYSTEM\Security;
class NoteController{
    private $tablename = "Models\Note";
    public function add($params){
       // if(SYSTEM\Session::get('status')=='logged_in'){

        $sql = "insert into notes(date,title,description,user_id) values (?,?,?,?)";
        if(Connection::exec($sql,$params)){
            return "Successful";
        }else{
            return "Error";
        }
       //}
    }
    public function delete($id){   
        //if(SYSTEM\Session::get('status')=='logged_in'){
        $sql = "delete from notes where id = ?";
        if(Connection::exec($sql,[$id])){
            return "Successful";
        }else{
            return "Error";
        }
        //}
    }
    public function fetch($id){
        //if(SYSTEM\Session::get('status')=='logged_in') {
            $sql = "select * from notes where  user_id=?"; 
            $res = Connection::fetch($sql,[$id],$this->tablename);
            return $res;
        //}
    }

}