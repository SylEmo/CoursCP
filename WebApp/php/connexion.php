<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$conn=mysql_connect("37.187.120.186","ProjetCP","benzinebemonetgittinger") or die(mysql_error());
mysql_select_db("NewProjetCP",$conn) or die(mysql_error());

?>