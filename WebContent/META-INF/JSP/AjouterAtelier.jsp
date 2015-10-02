<%@page import="java.sql.ResultSet"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
pageEncoding="ISO-8859-1"%>

<html>
  <head>
      <title>Atelier</title>
      <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript" src="js/bootstrap.js"></script>
     <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

     <style type="text/css">
      
       #i{
        position:absolute;
        top: 20px;
        left: 0;
        width : 130px;
        height : 140px;
      }
      #j{
        position:absolute;
        top: 20px;
        right: 0;
        width : 130px;
        height : 140px;
      }

      #t1{
          width: 60%;
          height: 40%;
          margin-left:300px;
          background-color: #D0D9DE;
        
      }
     

      #t2{
          width: 50%;
          height: 20%;
          margin-left:340px;
      }
     body {
           background-color: #b0c4de;
          }

     </style>

     </head>
  <body>
    <div id="d">
      <br>
      <br>
    <h3 align="center">Ajouter Un Nouveau Atelier</h3><br><br><br><br>
    <p id="i"><img src="img/cnrs.gif" alt="cnrs"></p>
    <p id="j"><img src="img/fete.jpg" alt="fete"></p>
     <center><h4>Veuillez remplir les champs : </h4></center>
    
    <form name="form" action="/ajout-atelier" >
    
      <table   id="t1" align="center" >
        <tr>
          <td><b>Titre definitif :  </b></td><td><input type="text" name="titre" value="" /><td>
        </tr>
        <tr>
          <td><b>Theme :  </b></td><td><input type="text" name="theme" value="" /><td>
        </tr>
        <tr>
          <td><b> Type : </b></td><td><input type="text" name="type" value="" /><td>
        </tr>
        <tr>
          <td><b>Duree de l'atelier :</b></td><td><input type="text" name="duree"  value="" /><td>
        </tr>
         
        <tr>
          <td><b> Capacite :</b></td><td><input type="text" name="capacite" value="" /><td>
        </tr>
        </table>

        <table align="center" id="t2">
         <tr>
           <td align="left"><button  class="btn btn-primary" type=""><b>Retour</b></button></td>
           <td></td> 
           <td align="right"><button  class="btn btn-primary" type=""><b>Enregistrer</b></button></td>
         </tr>
     </table>
        
     </form>
   </div>
  </body>
  </html>