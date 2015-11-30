<?php
$idprojet = $_POST['id'];

require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
require_once("Connexion.php");

echo utf8_encode($result);
?>