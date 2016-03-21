<?php
require("include/fonctions.php");

//Suppression d'un joueur (?)
	
	if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['filiere']) && $_POST['valider']=='oui')
	{
		//On teste si l'eleve existe
		if(verifieEtudiantExiste($_POST['nom'],$_POST['prenom'], $_POST['filiere']) )
		{
			//On le supprime
			try
			{
			$fileSource = 'depot/' . $_POST['nom'] . '.' . $_POST['prenom'] .'.pdf';
			$fileDestination = 'upload/' . $_POST['filiere'] . '/' . $_POST['nom'] . '.' . $_POST['prenom'] .'.pdf';
			//On le supprime
				include("include/coBDD.php");
				$req = $bdd->prepare('DELETE from liste WHERE Nom = :nom AND Prenom = :prenom AND Filiere = :filiere');
				$req->bindValue(':nom',$_POST['nom']);
				$req->bindValue(':prenom',$_POST['prenom']);
				$req->bindValue(':filiere',$_POST['filiere']);
				$req->execute();
			//On déplace le pdf
				rename ($fileSource, $fileDestination);
			
				
			}
			catch(PDOException $e)
			{
				die('Erreur : ' . $e->getMessage() . '; ');
			}
		}
	}

afficherListeDepot()

?>