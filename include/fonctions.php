<?php


function ajout($bdd, $dossier)
{
	$fichier = basename($_FILES['cv']['name']);
	
	if (preg_match("#^([a-zA-Z]+\.[a-zA-Z]+)(\.pdf)$#", $fichier))
	{
		$taille_maxi = 10000000;
		$taille = filesize($_FILES['cv']['tmp_name']);
		$extensions = array('.pdf');
		$extension = strrchr($_FILES['cv']['name'], '.'); 
		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
			$erreur = 'Vous devez uploader un fichier de type pdf';
		}
		if($taille>$taille_maxi)
		{
			$erreur = 'Le fichier est trop gros...';
		}
		if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
		{
			//On formate le nom du fichier ici...
			$fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
			if(move_uploaded_file($_FILES['cv']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
			{
				echo 'Upload du cv effectue avec succes !';
				ajoutEtudiantFromFile($fichier, $bdd, $dossier);
			}
			else //Sinon (la fonction renvoie FALSE).
			{
				echo 'Echec de l\'upload !';
			}
		}
		else
		{
			echo $erreur;
		}
	}
	else
	{
		echo 'Le format du pdf doit être Nom.Prenom.pdf';
	}

	
	
}

function ajoutEtudiantFromFile($fichier, $bdd, $dossier)
{
	$nomPrenom = basename ( $fichier, ".pdf" );
	$pieces = explode(".", $nomPrenom);
	/*echo $pieces[0] . '<br>'; // nom
	echo $pieces[1]; // prenom*/
	$nom= $pieces[0];
	$prenom = $pieces[1];
	$filiere = $_POST['filiere'];
	if (strstr($dossier, 'upload/'))
	{
		$req = $bdd->prepare('INSERT INTO etudiant(Nom, Prenom, Filiere) VALUES (:nom, :prenom, :filiere)');
		$req->execute(array(
		'nom'=>$nom,
		'prenom'=>$prenom,
		'filiere'=>$filiere,
		));	 
	}
	else if (strstr($dossier, 'depot/'))
	{
		$req = $bdd->prepare('INSERT INTO liste(Nom, Prenom, Filiere) VALUES (:nom, :prenom, :filiere)');
		$req->execute(array(
		'nom'=>$nom,
		'prenom'=>$prenom,
		'filiere'=>$filiere,
		));	 
	}
	
}

function verifieEtudiantExiste($nom, $prenom, $filiere)
{
	include("include/coBDD.php");
	$req = $bdd->prepare('SELECT * from etudiant where Nom = ? and Prenom = ? and Filiere = ?');
	$req->execute(array($nom, $prenom, $filiere));
	$res = $req->fetch(PDO::FETCH_ASSOC);
	if ($res)
		return true;
	else
		return false;
	
}

function afficheEmailUser()
{
	include("include/coBDD.php");																		//CONNECTE A LA BDD
	$req = $bdd->prepare('SELECT mail from connexion where login = ?');
	$req->execute(array($_SESSION['login']));
	$res=$req->fetch(PDO::FETCH_ASSOC);
	echo $res['mail'];
}

function modifierMdp()
{
	include("include/coBDD.php");/*connexion à la BDD ON !*/
	
	if (isset($_POST['pastPassword']) AND isset($_POST['newPassword']) AND isset($_POST['confirmNewPassword']) )/*vérifie si les variables existent*/
	{
		$passhach = sha1($_POST['pastPassword']);
		$req = $bdd->prepare('SELECT login from connexion where login = ? and password = ?');
		$req->execute(array($_SESSION['login'], $passhach));
		$res=$req->fetch(PDO::FETCH_ASSOC);
		/*Si mot de passe est le même :*/
		if(!empty($res)){
			if ($_POST['newPassword']==$_POST['confirmNewPassword'])/*Si le nouveau mot de passe est bien confirmé*/
			{
			echo 'modification du mdp';
				$pass_hach=sha1($_POST['newPassword']);
				$req = $bdd->prepare('UPDATE connexion SET password=? WHERE login = ?');/*met à jour le mot de passe*/
				$req->execute(array(
				$pass_hach,
				$_SESSION['login']
				));
 
				echo '<p>La modification de mot de passe a été prise en compte !</p><br/>';
			}
			else{
				echo'<p>Vous n\'avez pas tapé deux fois le même mot de passe</p>';/*mot de passe confirmé pas correct*/
				echo'<form action="monCompte.php" method="post">
				<input type="submit" value="Réessayer"/>
				</form>';
			}
		}
		else
			echo '<p>L\'ancien mot de passe n\'est pas correct</p>';/*mot de passe pas le même que l'ancien*/
	}	
}

function modifierMail()
{
	include("include/coBDD.php");/*connexion à la BDD ON !*/
	
	if (isset($_POST['pastMail']) AND isset($_POST['password']) AND isset($_POST['newMail']) )/*vérifie si les variables existent*/
	{
		$passhach = sha1($_POST['password']);
		$req = $bdd->prepare('SELECT login from connexion where login = ? and password = ? and mail= ? ');
		$req->execute(array($_SESSION['login'], $passhach, $_POST['pastMail']));
		$res=$req->fetch(PDO::FETCH_ASSOC);
		/*Si mot de passe est le même :*/
		if(!empty($res)){
			echo 'modification du mail';
				$req = $bdd->prepare('UPDATE connexion SET mail=? WHERE login = ? and password = ? and mail= ? ');/*met à jour le mot de passe*/
				$req->execute(array(
				$_POST['newMail'],
				$_SESSION['login'], $passhach, $_POST['pastMail']
				));
 
				echo '<p>La modification du mail a bien été prise en compte !</p><br/>';
		}
		else
			echo '<p>Les informations entrées ne sont pas corrects</p>';/*mot de passe pas le même que l'ancien*/
	}	
}


function cvExiste($nom, $prenom, $filiere)
{
	$filename = 'upload/'. $filiere . '/' . $nom . '.' . $prenom . '.pdf';

	if (file_exists($filename))
		return true;
	else
		return false;
}

function afficherListeCv()
{
	include("/include/coBDD.php");	
	try
	{
		$req = $bdd->prepare('SELECT * FROM etudiant');
		$req->execute();
		
		$res = $req->fetch(PDO::FETCH_ASSOC);

		//Il y a au moins une ligne
		if($res)
		{
			echo '<table class="table table-bordered table-hover">' . "\n";
			
			//On affiche les en-têtes
			echo '<tr>'."\n";
			foreach($res as $c => $v)
				echo '<th>' . $c . '</th>';
			echo '</tr>'."\n";
	 
	 		do
			{
				//On affiche chaque ligne de résultat
				echo '<tr>';
				foreach($res as $v)
					echo '<td>' . $v . '</td>';
				if (cvExiste($res['Nom'], $res['Prenom'], $res['Filiere']))
					echo '<td><a href="upload/' . $res['Filiere'] . '/' .$res['Nom'] . '.' . $res['Prenom'] . '.pdf">Voir CV</a></td>';
				else
					echo '<td>Cet élève n\'a pas de cv en ligne</td>';
				echo '</tr>';
			}while($res = $req->fetch(PDO::FETCH_ASSOC));
			echo '</table>' . "\n";
		}
		else
			echo '<p>Aucun élève dans la base de données </p>';
	}
	catch(PDOException $e)
	{
	  	// On termine le script en affichant le n de l'erreur ainsi que le message 
    	die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>');
	}	
}

function afficherListeDepot()
{
	include("/include/coBDD.php");	
	
	try
	{
		$req = $bdd->prepare('SELECT * FROM liste');
		$req->execute();
		
		$res = $req->fetch(PDO::FETCH_ASSOC);

		//Il y a au moins une ligne
		if($res)
		{
			echo '<table class="table table-bordered table-hover">' . "\n";
			
			//On affiche les en-têtes
			echo '<tr>'."\n";
			foreach($res as $c => $v)
				echo '<th>' . $c . '</th>';
			echo '</tr>'."\n";
	 
	 		do
			{
				//On affiche chaque ligne de résultat
				echo '<tr>';
				foreach($res as $v)
					echo '<td>' . $v . '</td>';
				
				echo '<td><a href="depot/' . '/' .$res['Nom'] . '.' . $res['Prenom'] . '.pdf">Voir CV</a></td><td><a href="validerCv.php?nom='.urlencode($res['Nom']).'&amp;prenom='. urlencode($res['Prenom']).'&amp;filiere='. urlencode($res['Filiere']).'">Valider</td><td>Refuser</td>';
				echo '</tr>';
			}while($res = $req->fetch(PDO::FETCH_ASSOC));
			echo '</table>' . "\n";
		}
		else
			echo '<p>Aucun élève dans la base de données </p>';
	}
	catch(PDOException $e)
	{
	  	// On termine le script en affichant le n de l'erreur ainsi que le message 
    	die('<div class="filtre"> Erreur : ' . $e->getMessage() . '</div></body></html>');
	}	
	
}


?>