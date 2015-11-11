<?php


require_once("Verifier1.php");
require_once("Connexion.php");

$id=$_POST['ID'];
$nom=$_POST['NOM'];
$dc=$_POST['DATECREATION'];
$dl=$_POST['DEADLINE'];
$git=$_POST['LIENGIT'];


    $req="update PROJET set NOM='$nom',DATE_CREATION='$dc',DEADLINE='$dl',LIEN_GIT='$git' where ID=$id";
    mysql_query($req) or die(mysql_error());

     header("location:ListProjects.php");

?>