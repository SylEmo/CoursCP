<?php
require_once("Verifier1.php");
session_start();
session_destroy();
header("location:../index.html");

?>