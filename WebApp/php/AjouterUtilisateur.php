<?php

require_once("Connexion.php");

$log=$_POST['login'];
$pass1=$_POST['pwd'];
$email=$_POST['email'];

$pc=md5($pass1);


$sql=mysql_query("SELECT * FROM UTILISATEUR WHERE EMAIL='".$email."' OR IDENTIFIANT='".$log."'") or die(mysql_error());
if(mysql_num_rows($sql)>=1)
{
    echo " vous etes deja inscrit";
    header("location:../index.html");
}
else
{
	$req = "insert into UTILISATEUR (IDENTIFIANT,EMAIL, MOT_DE_PASSE) VALUE ('".$log."','".$email."','".$pc."')";
	mysql_query($req) or die(mysql_error());
	header("location:../index.html");

	$request="select * from UTILISATEUR where IDENTIFIANT='$log' and MOT_DE_PASSE='$pc'";
	$result=mysql_query($request) or die (mysql_error());

	if($u=mysql_fetch_assoc($result))
	{
	    session_start();
	    $_SESSION['Niv'] = $u['ID'];
	    header("location:../liste-projets.html");

	}
	else{

	    header("location:../index.html");
	}
}


?>
