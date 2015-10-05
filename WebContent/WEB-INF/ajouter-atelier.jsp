<%@page import="java.sql.ResultSet"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>

<!doctype html>
<html lang="fr">
<head>
<title>Atelier</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	
	<style type="text/css">
	#i {
		position: absolute;
		top: 20px;
		left: 0;
		width: 130px;
		height: 140px;
	}
	
	#j {
		position: absolute;
		top: 20px;
		right: 0;
		width: 130px;
		height: 140px;
	}
	
	#t1 {
		width: 60%;
		height: 40%;
		margin-left: 300px;
		background-color: #D0D9DE;
	}
	
	#t2 {
		width: 50%;
		height: 20%;
		margin-left: 340px;
	}
	
	body {
		background-color: #b0c4de;
	}
	</style>

</head>
<body>
	<div id="d">
		<br> <br>
		<h3 align="center">Ajouter Un Nouveau Atelier</h3>
		<br>
		<br>
		<br>
		<br>
		<p id="i">
			<img src="img/cnrs.gif" alt="cnrs">
		</p>
		<p id="j">
			<img src="img/fete.jpg" alt="fete">
		</p>
		<center>
			<h4>Veuillez remplir les champs :</h4>
		</center>

		<form id="form" name="form" action="/ajout-atelier" method="POST">

			<table id="t1" align="center">
				<tr>
					<td><b>Titre :</b></td>
					<td><input type="text" id="titre" name="titre" value="" required/>
					<td>
				</tr>
				<tr>
					<td><b>Theme :</b></td>
					<td><input type="text" id="theme" name="theme" value="" required/>
					<td>
				</tr>
				<tr>
					<td><b>Type :</b></td>
					<td><input type="text" id="type" name="type" value="" required/>
					<td>
				</tr>
				<tr>
					<td><b>Durée de l'atelier :</b></td>
					<td><input type="text" id="duree" name="duree" value="" required/>
					<td>
				</tr>

				<tr>
					<td><b>Capacité :</b></td>
					<td><input type="text" name="capacite" value="" required/>
					<td>
				</tr>
				<tr>
					<td><b>Crenaux que vous souhaitez ouvrir a l'inscription :</b></td>
				</tr>
				<tr class="blank_row">
					<td bgcolor="#D0D9DE" colspan="3">&nbsp;</td>
				</tr>

				<tr>
					<td><b>Lundi matin</b></td>
					<td><b>Lundi après-midi</b></td>
				</tr>
				<tr>
					<td><input type="checkbox" id="lundi_m" name="creneaux" value="ch1"></td>
					<td><input type="checkbox" id="lundi_ap" name="creneaux" value="ch2"></td>
				</tr>

				<tr>
					<td><b>Mardi matin</b></td>
					<td><b>Mardi après-midi</b></td>
				</tr>
				<tr>
					<td><input type="checkbox" id="mardi_m" name="creneaux"></td>
					<td><input type="checkbox" id="mardi_ap" name="mardi_ap"></td>
				</tr>

				<tr>
					<td><b>Mercredi matin</b></td>
					<td><b>Mercredi après-midi</b></td>
				</tr>

				<tr>
					<td><input type="checkbox" id="mercredi_m" name="mercredi_m"></td>
					<td><input type="checkbox" id="mercredi_ap" name="mercredi_ap"></td>
				</tr>

				<tr>
					<td><b>Jeudi matin</b></td>
					<td><b>Jeudi après-midi</b></td>
				</tr>

				<tr>
					<td><input type="checkbox" id="jeudi_m" name="jeudi_m"></td>
					<td><input type="checkbox" id="jeudi_ap" name="jeudi_ap"></td>
				</tr>

				<tr>
					<td><b>Vendredi matin</b></td>
					<td><b>Vendredi après-midi</b></td>
				</tr>


				<tr>
					<td><input type="checkbox" id="vendredi_m" name="vendredi_m"></td>
					<td><input type="checkbox" id="vendredi_ap" name="vendredi_ap"></td>
				</tr>
			</table>
			<table align="center" id="t2">
			<tr>
				<td align="left">
					<a class="btn btn-primary" href="/"><b>Retour</b></a>
				</td>
				<td></td>
				<td align="right">
					<button id="save" class="btn btn-primary" type="submit">
						<b>Enregistrer</b>
					</button></td>
			</tr>
		</table>
		</form>
		
	</div>
</body>
</html>
