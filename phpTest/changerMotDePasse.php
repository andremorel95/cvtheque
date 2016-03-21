<?php
session_start();
require('include/fonctions.php'); //Ensemble de fonctions php

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../favicon.ico">

  <title>Changer son mot de passe</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<?php
include("include/fixedNavBar.php");
?>
  
  <div class="container">
      <div class="col-sm-3 col-md-2 sidebar" style="margin-top: 60px; background-color: #eee; border-radius: 6px">
        <ul class="nav nav-sidebar">
          <li class="active"><a href="parametre.php">Vue d'ensemble</a></li>
          <li><a href="#">Confidentialité</a></li>
          <li><a href="#">Changer d'adresse email</a></li>
          <li><a href="changerMotDePasse.php">Changer de mot de passe<span class="sr-only">(current)</span></a></li>
        </ul>
      </div>
      
      <div class="col-lg-9" style="margin-top: 60px; margin-left: 5px; background-color: #eee; border-radius: 6px">
        <div> <?php /*Entête de paramètre*/ ?>
          <h3 style="margin-bottom: 15px; padding-bottom: 7px; border-bottom: solid 1px grey">Présentation</h3> 
        </div>
        
        <div> <?php /*Contenue paramètre*/ ?>
          <span style="font-weight: bold;">Modifier mon mot de passe</span>
        </div>
        
        <div style="margin-top: 10px;">
          <span><form action="" method="post">
		<p>Ancien mot de passe</p><input type="password" name="pastPassword"/>
		<p>Nouveau mot de passe</p><input type="password" name="newPassword"/>
		<p>Confirmer nouveau mot de passe</p><input type="password" name="confirmNewPassword"/>
		<input type="submit" value="Modifier"/>
		</form></span>
        </div>
		<div style="margin-top: 10px;"></div>
		<div style="margin-top: 10px;"><?php 
		modifierMdp();
		?></div>
		
      </div>
  </div>