<?php



if(isset($_POST['date'])&&isset($_POST['title'])&&isset($_POST['description'])){
    if(SYSTEM\Session::get('id')!==null){
        $dte = SYSTEM\Security::filterInput($_POST['date']);
        $ttl = SYSTEM\Security::filterInput($_POST['title']);
        $des = SYSTEM\Security::filterInput($_POST['description']);
        $user_id = SYSTEM\Session::get('id');
        (new Controllers\NoteController)->add([$dte,$ttl,$des,$user_id]);
}   }

var_dump($_POST);
 if(isset($_POST['Noteid'])){
     echo "<script>alert('got request')</script>";
     $id = $_POST['Noteid'];
     $res = (new Controllers\NoteController)->delete($id);
     echo  "<script>alert('got request $res')</script>";
     SYSTEM\Security::Redirect('/?p=home&path=notes');
 }