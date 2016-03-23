<?php
session_start();
require_once('../header.php');
require_once("../include/coBDD.php");	
?>
<body>
	<?php 
		//Verifier si les champs login et Mdp sont pas vide
	if(isset($_POST['idEntreprise']) and isset($_POST['password'])){

		$passhach = sha1($_POST['password']); //cripter le Mdp envoyer par le formulaire
		$req = $bdd->prepare('SELECT idEntreprise from entreprise where  idEntreprise = ? and passeword = ?');
		$req->execute()
	}


	?>
	}
</body>