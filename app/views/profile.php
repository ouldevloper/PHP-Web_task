<?php

if(isset($_POST['editprofilebtn'])){

    $fullname = SYSTEM\Security::filterInput($_POST['fullname']);
    $username = SYSTEM\Security::filterInput($_POST['username']);
    $email = SYSTEM\Security::filterInput($_POST['email']);
    $phone = SYSTEM\Security::filterInput($_POST['phone']);
    $password = SYSTEM\Security::filterInput($_POST['password']);
    //updateProfile($fullname,$username,$email,$phone,$password="")
    (new Controllers\UserController)->updateProfile($fullname,$username,$email,$phone,$password);
    
    
}
