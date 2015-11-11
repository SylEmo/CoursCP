<?php
//require_once("Verifier1.php");
session_start();
echo "Variable de session : " . $_SESSION['Niv'];
require_once("Connexion.php");
$req= "select * from PROJET WHERE IDUTIL=".$_SESSION['Niv'];
$rs=mysql_query($req) or die(mysql_error());
?>

<html>
<head>
    <title>
      Listes de vos projets
    </title>


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


    <style type="text/css">
        body{
            background-color: #f1f1c1;
            margin-left: 2em;
            margin-top: 2em;
        }
        #b1{
            text-align: center;
            margin-left: 1em;
        }

    </style>
</head>
<body>
<center>
<table border="1" width="50%" height="50%">
    <tr>
        <th>Nom du projet </th><th>date de creation</th><th>date de fin</th><th>lien du depot git</th>
    </tr>

    <?php  while($pr=mysql_fetch_assoc($rs)) { ?>

        <tr>
            <td><?php  echo ($pr['NOM']) ?></td>
            <td><?php  echo ($pr['DATE_CREATION']) ?></td>
            <td><?php  echo ($pr['DEADLINE']) ?></td>
            <td><?php  echo ($pr['LIEN_GIT']) ?></td>
            <td><a href="SupprimerProjet.php?id=<?php  echo ($pr['ID']) ?>">Supprimer</a></td>
            <td><a href="EditerProjet.php?id=<?php  echo ($pr['ID']) ?>">Editer</a></td>

        </tr>
   <?php } ?>
</table>
</center>
<br>
<p id="b1">
<button  type="button"  class="btn btn-primary" onclick="window.location.href='../index.html';">Retour</button>
</p>
</body>
</html>