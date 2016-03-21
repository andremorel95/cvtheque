<?php 
	session_start();
	require('include/fonctions.php'); //Ensemble de fonctions PHP
?>
<?php 
	if(isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['filiere']) && verifieEtudiantExiste($_GET['nom'],$_GET['prenom'], $_GET['filiere']))
	{
?>

<form action="depot.php" method="post">
<p> Voulez-vous vraiment valider ce cv ?
<input type="hidden" name="nom" value="<?php echo $_GET['nom'];?>"/>
<input type="hidden" name="prenom" value="<?php echo $_GET['prenom'];?>"/>
<input type="hidden" name="filiere" value="<?php echo $_GET['filiere'];?>"/></p>
<p><input type="submit" value="oui" name="valider"/><input type="submit" value="non" name="valider"/></p>
</form>

<?php
	}
	else
	{
?>

	<p> Problème : retourner au <a href="depot.php">dépot</a>.
<?php } ?>
