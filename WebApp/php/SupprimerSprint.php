<?php
$idsprint = $_GET['idSprint'];
$idprojet = $_GET['idProjet'];

require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
require_once("Connexion.php");


$req= "DELETE FROM SPRINT WHERE ID=".$idsprint;
mysql_query($req) or die(mysql_error());

header("location:../liste-sprints.html?id=".$idprojet);
?>