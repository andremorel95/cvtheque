<?php
session_start();
require("include/fonctions.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CVthèque Paris 13</title>
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.transitions.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="icon" type="image/png" href="images/ico/favicon1.ico"/>
    <link rel="shortcut icon" href="images/ico/favicon1.ico"/>
    
</head><!--/head-->

<body id="home" class="homepage">

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logo-P13.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                         <li class="scroll"><a href="index.php">Mon Compte</a></li>
                        <li class="scroll"><a href="cvtheque.php">CVthèque</a></li>
						<li class="scroll"><a href="depot.php">Depot</a></li>
                        <li class="scroll"><a href="setting.php">Paramètre</a></li>
                        <li class="scroll"><a href="deconnexion.php">Se déconnecter</a></li>            
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
    
    <section id="about">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Upload manuel d'un CV</h2>
                <p class="text-center wow fadeInDown">
				<?php
				if (isset($_FILES['cv']['name']) and isset ($_POST['filiere']))
				{
				include("include/coBDD.php");
				$dossier = 'upload/' . $_POST['filiere'] . '/';
				ajout($bdd, $dossier);
				}
				?>		
				<form method="POST" action="upload.php" enctype="multipart/form-data">
				<!-- On limite le fichier à 10Mo -->
				<input type="hidden" name="MAX_FILE_SIZE" value="10000000"> 
				Fichier : <input type="file" name="cv"><br> 
				<select name="filiere">
					<option value="Informatique">DUT INFO</option>
					<option value="Droit">Dut droit</option>
				</select>
                <input class="btn btn-primary" type="submit" name="envoyer" value="Envoyer le fichier">
				</form>
				</p>
            </div>
        </div>
    </section><!--/#about-->
    
<?php include("include/footer.php"); ?>


	 
     
