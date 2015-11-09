<?php

require_once("connexion.php");

$log=$_POST['login'];
$pass1=$_POST['pwd'];
$pass2=$_POST['pwd2'];


if($pass1==$pass2) {
    $pc=md5($pass1);
    $req = "insert into users (login,password) VALUE ('$log','$pc')";
    mysql_query($req) or die(mysql_error());
    header("location:index.html");
}
else{

    header("location:AjouterUser.html");
}
?>
