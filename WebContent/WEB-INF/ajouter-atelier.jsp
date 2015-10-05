<%@page import="java.sql.ResultSet"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
	pageEncoding="ISO-8859-1"%>

<html>
<<<<<<< HEAD
<head>
<title>Atelier</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

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
					<td><b>Titre definitif : </b></td>
					<td><input type="text" name="titre" value="" required/>
					<td>
				</tr>
				<tr>
					<td><b>Theme : </b></td>
					<td><input type="text" name="theme" value="" required/>
					<td>
				</tr>
				<tr>
					<td><b> Type : </b></td>
					<td><input type="text" name="type" value="" required/>
					<td>
				</tr>
				<tr>
					<td><b>Duree de l'atelier :</b></td>
					<td><input type="text" name="duree" value="" required/>
					<td>
				</tr>

				<tr>
					<td><b> Capacite :</b></td>
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
					<td><b>Lundi Matin</b></td>
					<td><b>Lundi Apres Midi</b></td>
				</tr>
				<tr>
					<td><input type="checkbox" name="lm" value="ch1"></td>
					<td><input type="checkbox" name="la" value="ch2"></td>
				</tr>

				<tr>
					<td><b>Mardi Matin</b></td>
					<td><b>Mardi Apres Midi</b></td>
				</tr>
				<tr>
					<td><input type="checkbox" name="mm" value="ch3"></td>
					<td><input type="checkbox" name="ma" value="ch4"></td>
				</tr>

				<tr>
					<td><b>Mercredi Matin</b></td>
					<td><b>Mercredi Apres Midi</b></td>
				</tr>

				<tr>
					<td><input type="checkbox" name="mercm" value="ch5"></td>
					<td><input type="checkbox" name="merca" value="ch6"></td>
				</tr>

				<tr>
					<td><b>Jeudi Matin</b></td>
					<td><b>Jeudi Apres Midi</b></td>
				</tr>

				<tr>
					<td><input type="checkbox" name="jm" value="ch7"></td>
					<td><input type="checkbox" name="merca" value="ch8"></td>
				</tr>

				<tr>
					<td><b>Vendredi Matin</b></td>
					<td><b>Vendredi Apres Midi</b></td>
				</tr>


				<tr>
					<td><input type="checkbox" name="vm" value="ch9"></td>
					<td><input type="checkbox" name="va" value="ch10"></td>
				</tr>
			</table>
		</form>
		<table align="center" id="t2">
			<tr>
				<td align="left">
					<button id="back" class="btn btn-primary" type="">
						<a href="/"><b>Retour</b></a>
					</button></td>
				<td></td>
				<td align="right">
					<button id="save" class="btn btn-primary" type="" onClick="sendForm()">
						<b>Enregistrer</b>
					</button></td>
			</tr>
		</table>
	</div>
	<script>
		function sendForm(){
			var form = document.getElementsByName("form").submit();
			form.submit();
		}
	</script>
</body>
</html>
