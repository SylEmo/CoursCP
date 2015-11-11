<?php
session_start();
if(!(isset($_SESSION['Niv'])))
{
    header("location:index.html");
    exit;
}

?>
