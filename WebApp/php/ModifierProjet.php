<?php


require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
require_once("Connexion.php");

$id=$_POST['IDPROJET'];
$nom=$_POST['NOM'];
$dl=$_POST['DEADLINE'];
$gitutil=$_POST['GITUTIL'];
$gitdepot=$_POST['GITDEPOT'];


    $req="update PROJET set NOM=\"".$nom."\",DEADLINE=\"".$dl."\",GITUTIL=\"".$gitutil."\",GITDEPOT=\"".$gitdepot."\" where ID=".$id." AND IDUTIL=".$_SESSION['Niv'];
    mysql_query($req) or die(mysql_error());

     header("location:../liste-projets.html");
?>