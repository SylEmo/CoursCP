<?php


require_once("Verifier1.php");
require_once("Connexion.php");

$id=$_POST['id'];
$us=$_POST['us'];
$prio=$_POST['prio'];
$diff=$_POST['diff'];


$req="update userstory set DESCRIPTION='$us',PRIORITE='$prio',DIFFICULTE='$diff' where id=$id";
mysql_query($req) or die(mysql_error());

header("location:../backlog.html");//redirection vers la page du backlog

?>