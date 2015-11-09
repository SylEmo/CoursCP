<?php


require_once("verifier1.php");
require_once("connexion.php");

$id=$_POST['ID'];
$nom=$_POST['NOM'];
$dc=$_POST['DATECREATION'];
$dl=$_POST['DEADLINE'];
$git=$_POST['GIT'];


    $req="update PROJET set NOM='$nom',DATE_CREATION='$dc',DEADLINE='$dl',LIEN_GIT='$git' where ID=$id";
    mysql_query($req) or die(mysql_error());

     header("location:ListProjects.php");

?>