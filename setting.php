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
    <link href="css/modif.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="icon" type="image/png" href="images/ico/favicon1.ico" />
    <link rel="shortcut icon" href="images/ico/favicon1.ico" />

</head>
<!--/head-->

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
                        <li class="scroll active"><a href="setting.php">Paramètre</a></li>
                        <li class="scroll"><a href="deconnexion.php">Se déconnecter</a></li>
                    </ul>
                </div>
            </div>
            <!--/.container-->
        </nav>
        <!--/nav-->
    </header>
    <!--/header-->

	<?php
	if(isset($_SESSION['login'])){
	?>
    <div class="container">
        <div class="row">
            <div class="col-md-3 customsettingpage">
                <div class="list-group" id="sidebar">
                    <a href="modifierMotDePasse.php" class="list-group-item">Modifier mot de passe</a>
                    <a href="modifierMail.php" class="list-group-item">Modifier E-mail</a>
                </div>
            </div>
            <div class="col-md-9 customsettingpage">
                <h2 class="column-title">Nom</h2>
                <p><?php
				echo $_SESSION['login'];
				?></p>
                

                <h2 class="column-title">E-mail</h2>
                <p><?php
				afficheEmailUser();
				?></p>
                
            </div>
            <div class="span9"></div>
        </div>
    </div>

	<?php
	}
	else
	{
		echo 'Vas-te connecter';
	}
	?>
    <?php include( "include/footer.php"); ?>