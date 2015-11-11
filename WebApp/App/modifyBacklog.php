<?php


require_once("verifier1.php");
require_once("connexion.php");

$id=$_POST['id'];
$us=$_POST['us'];
$prio=$_POST['prio'];
$diff=$_POST['diff'];


$req="update userstory set DESCRIPTION='$us',PRIORITE='$prio',DIFFICULTE='$diff' where id=$id";
mysql_query($req) or die(mysql_error());

header("location:.php");//redirection vers la page du backlog

?>