<?php

if(!isset($_SESSION)) {
    session_start();
}
require_once("Connexion.php");

$id=$_SESSION['Niv'];
$nom=$_POST['NOM'];
$dc=$_POST['DATECREATION'];
$dl=$_POST['DEADLINE'];
$gitutil=$_POST['GITUTIL'];
$gitdepot=$_POST['GITDEPOT'];


$req="INSERT INTO PROJET (IDUTIL, NOM, DATE_CREATION, DEADLINE, GITUTIL, GITDEPOT) VALUE (".$id.",\"".$nom."\",".$dc.",".$dl.",\"".$gitutil."\",\"".$gitdepot."\")";
mysql_query($req) or die(mysql_error());
header("location:../liste-projets.html");
?>
