<?php
if('logged_in' !== SYSTEM\Session::get('status')) SYSTEM\Security::Redirect("/?p=login");
else {
    include "header.php";
    $page = $_GET['path'].".php";
    if(in_array($page,scandir("app/views"))){
        include $page;
    }else{
        include "notes.php";
    }
    include "footer.php";
}


