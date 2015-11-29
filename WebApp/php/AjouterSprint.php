<?php
$idprojet = $_GET['id'];
require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
require_once("Connexion.php");

$req1="SELECT MAX(NUMERO) AS NUM FROM SPRINT, PROJET WHERE IDPROJET=".$idprojet." AND IDUTIL=".$_SESSION['Niv'];
$rs1=mysql_query($req1) or die(mysql_error());

if($res1=mysql_fetch_assoc($rs1)){
	$numerosprint=$res1['NUM']+1;

	$req2= "INSERT INTO SPRINT (IDPROJET,NUMERO) VALUES (".$idprojet.",".$numerosprint.")";
	mysql_query($req2) or die(mysql_error());

	$req3="SELECT ID FROM SPRINT WHERE IDPROJET=".$idprojet." AND NUMERO=(SELECT MAX(NUMERO) FROM SPRINT WHERE IDPROJET=".$idprojet.")";
	$rs3=mysql_query($req3) or die(mysql_error());

	if($res3=mysql_fetch_assoc($rs3)){
		header("location:../details-sprint.html?id=".$res3['ID']);
	}else{
		header("location:../liste-projets.html?id=".$idprojet);
	}

}else{
	header("location:../liste-projets.html?id=".$idprojet);
}
?>