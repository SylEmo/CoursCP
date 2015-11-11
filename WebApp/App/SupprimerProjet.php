

<?php

require_once("verifier1.php");
require_once("connexion.php");
$id=$_GET['id'];
$req="delete from projets WHERE (id=$id)";
mysql_query($req) or die(mysql_error());

header("location:ListProjects.php"); // Redirection
//require_once("AfficherJoueur.php"); //Forward

?>