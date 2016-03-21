	<?php
		try{
			$bdd = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');
			$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $er){
		        die('<p> Erreur['.$er->getCode().'] : '.$er->getMessage().'</p>');
		}
	?>
