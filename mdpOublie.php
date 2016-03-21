
<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>
<?php
	//SI ENVOI DU FORMULAIRE, EXISTE $_POST
	if (isset($_POST['login']) and isset($_POST['mail']))
	{
		//PREG_MATCH MAIL VALIDE
		$atom = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]';
		$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)';
		$regexmail = '/^' . $atom . '+' . '(\.' . $atom . '+)*' . '@' . '(' . $domain . '{1,63}\.)+' .$domain . '{2,63}$/i';
		//SI MAIL VALIDE
		if(isset($_POST['mail']) && preg_match($regexmail, $_POST['mail']))
		{
			include("include/coBDD.php");
			$req = $bdd->prepare('SELECT password from connexion where login = ? and mail = ?');
			$req->execute(array($_POST['login'], $_POST['mail']));
			$res=$req->fetch(PDO::FETCH_ASSOC);
			//SI IL N'EXISTE PAS UNE PERSONNE AVEC LE LOGIN ET MAIL DEMANDE
			if (!$res)
			{
				echo '<div class="login-card">
				<h1>Login et/ou mail incorrect(s)</h1></br>
				<a href="connexion.php"><p>Retour</p></a>
				</div>';
			}
			//SI EXISTE UNE PERSONNE AVEC LE LOGIN ET MAIL DEMANDE
			else
			{
				//ENVOI DE MAIL
				echo $_POST['mail'] . ' ' . $res['password'];
				mail($_POST['mail'], "Oublie de mot de passe", $res['password']);
				echo '<div class="login-card">
				<h1>Un mail a été envoyé</h1></br>
				<a href="connexion.php"><p>Retour</p></a>
				</div>';
			}
		}
		//MAIL NON VALIDE
		else
		{
		echo '<div class="login-card">
				<h1>Mail non valide</h1></br>
				<a href="connexion.php"><p>Retour</p></a>
				</div>';
		}
			
		
	}
	//FORMULAIRE D'ENVOI
	else
	{
		echo '<div class="login-card">
		<h1>Récupération de mot de passe</h1></br>
		<form action="" method="post">
		Login<input type="text" name="login"/>
		E-mail<input type="password" name="mail"/>
		<input type="submit" class="login login-submit" value="Envoyer"/>		
		</form>
		</div>';
	}





?>


	
</body>
</html>