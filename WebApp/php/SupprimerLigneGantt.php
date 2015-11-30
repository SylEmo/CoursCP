<?php

require_once("Verifier1.php");
require_once("Connexion.php");

$id=$_GET['id'];
$req="delete from GANTT WHERE (id=$id)";
mysql_query($req) or die(mysql_error());
header("location:../gantt.html");

?>