<?php

$cnx = null;
try{
    $cnx = new PDO("mysql:host=127.0.0.1:3306;dbname=sn;","root","user");
}catch(PDOException $er){
    echo "error";
}

$params = ["username","fullname","password",'asdfasdf'];
$sql = "update users set fullname=?,username=?,email=?,phone=?";
$password = "helloworld";
$id=1;
if(!empty($password)){
    $sql.=",password=? where id=?";
    $params[]=$password;
    $params[]= $id;
}else{
    $sql.="  where id=?";
    $params[]=[$id];
}
echo $sql;
echo "<pre>";
print_r($params);
echo "</pre>";
$stmnt = $cnx->prepare($sql);
$stmnt->execute($params);
