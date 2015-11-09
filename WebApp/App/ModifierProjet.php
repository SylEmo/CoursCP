<?php


require_once("verifier1.php");
require_once("connexion.php");

$id=$_POST['id'];
$nom=$_POST['nom'];
$dc=$_POST['dated'];
$df=$_POST['datef'];


    $req="update projets set nom='$nom',dated='$dc',datef='$df' where id=$id";
    mysql_query($req) or die(mysql_error());

     header("location:ListProjects.php");

?>