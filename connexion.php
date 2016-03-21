<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>
<?php


	if (isset($_POST['login']) and isset($_POST['password']))
	{
		$passhach = sha1($_POST['password']);														//CODE LE MDP ENVOYER PAR FORMULAIRE
		include("include/coBDD.php");																		//CONNECTE A LA BDD
		$req = $bdd->prepare('SELECT login from connexion where login = ? and password = ?');
		//$req->execute(array($_POST['login'], $passhach));											//CHERCHE UNE PERSONNE DONT LE LOGIN ET MDP CORRESPOND
		$req->execute(array($_POST['login'], $_POST['password']));		
		$res=$req->fetch(PDO::FETCH_ASSOC);
	
		if (!$res)//Si user avec login et password incorrect
		{
			echo '	<div class="login-card">
			<h1>Mot de passe incorrect</h1></br>
			<form action="connexion.php" method="post">
			<input type="text" name="login" placeholder="Identifiant"/>
			<input type="password" name="password" placeholder="Mot de passe"/>
			<input type="submit" class="login login-submit" value="Se connecter"/>
			<a href="mdpOublie.php">Mot de passe oublié ?</a> 
			</form>
			</div>';
		}
		else //Si un user avec login et password correct
		{
			$_SESSION['login']=$res['login'];
			print_r($_SESSION, true);
			echo $_SESSION['login'];
			echo $res['login'];
			header('location: index.php');
		}
	}
	else
	{
		// FORMULAIRE DE BASE QUI DEMANDE LOGIN ET MDP
		echo '<div class="login-card">
		<h1>Connexion</h1></br>
		<form action="connexion.php" method="post">
		<input type="text" name="login" placeholder="identifiant"/>
		<input type="password" name="password" placeholder="mot de passe"/>
		<input type="submit" class="login login-submit" value="Se connecter"/>
		<a href="mdpOublie.php">Mot de passe oublié ?</a> 
		</form>
		</div>';
	}
?>


	
</body>
</html>