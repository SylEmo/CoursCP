<?php

require_once("Connexion.php");

$log=$_POST['login'];
$pass1=$_POST['pwd'];
$pass2=$_POST['pwd2'];
$email=$_POST['email'];

    $pc=md5($pass1);
    $req = "insert into UTILISATEUR (IDENTIFIANT,EMAIL, MOT_DE_PASSE) VALUE ('$log','$email','$pc')";
    mysql_query($req) or die(mysql_error());
    header("location:../index.html");

?>
