<?php

require_once("connexion.php");

$login=$_POST['login'];
$pwd=$_POST['pwd'];

$pc=md5($pwd);


$req="select * from users where login='$login' and password='$pc'";
$rs=mysql_query($req) or die (mysql_error());

if($u=mysql_fetch_assoc($rs))
{
    session_start();
    $_SESSION['Niv'] = $u['level'];
    header("location:ListProjects.php");

}
else{

    header("location: index.html");
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