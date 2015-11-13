<?php

require_once("Connexion.php");

$login=$_POST['login'];
$pwd=$_POST['pwd'];

$pc=md5($pwd);


$request="select * from UTILISATEUR where IDENTIFIANT='$login' and MOT_DE_PASSE='$pc'";
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



   /* $u=mysql_fetch_assoc($rs);  // sans les sessions

        if(($u['login']=="$login") && ($u['password']=="$pc"))
        {
            header("location:ListProjects.php");
        }
        else{
            header("location:index.html");
        }*/





?>