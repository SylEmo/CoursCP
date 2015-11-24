<?php


require_once("Verifier1.php");
session_start();
require_once("Connexion.php");

$id=$_POST['id-projet'];
$nom=$_POST['nom-projet'];
$dl=$_POST['deadline-projet'];
$git=$_POST['git-projet'];


    $req="update PROJET set NOM=\"".$nom."\",DEADLINE=\"".$dl."\",LIEN_GIT=\"".$git."\" where ID=".$id." AND IDUTIL=".$_SESSION['Niv'];
    mysql_query($req) or die(mysql_error());

     header("location:../liste-projets.html");
?>