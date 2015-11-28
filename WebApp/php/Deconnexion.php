<?php
require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
session_destroy();
header("location:../index.html");

?>