<?php
session_start();
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
                        <li class="scroll active"><a href="index.php">Mon Compte</a></li>
                        <li class="scroll"><a href="cvtheque.php">CVthèque</a></li>
						<li class="scroll"><a href="depot.php">Depot</a></li>
                        <li class="scroll"><a href="setting.php">Paramètre</a></li>
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
	
    <section id="services">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Bienvenue</h2>
                <p class="text-center wow fadeInDown"><?php
				echo $_SESSION['login']; ?></p>
            </div>

            <div class="row">
                <div class="features">

                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="media service-box">
                            <a href="upload.php">
                                <div class="pull-left">
                                    <i class="fa fa-cloud-upload"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Mettre en ligne un CV</h4></a>
                            <p>Mettez un CV en ligne à la place d'un étudiant irresponsable</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->

                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box">
                            <a href="#">
                                <div class="pull-left">
                                    <i class="fa fa-times"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Retirer un CV</h4></a>
                            <p>Supprimez un CV de la base de donnée</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->



                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms">
                        <div class="media service-box">
                            <a href="setting.php">
                                <div class="pull-left">
                                    <i class="fa fa-cog"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Paramètres</h4></a>
                            <p>Réglez vos paramètres de compte</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->

                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="500ms">
                        <div class="media service-box">
                            <a href="deconnexion.php">
                                <div class="pull-left">
                                    <i class="fa fa-power-off"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Se déconnecter</h4></a>
                            <p>A bientôt</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
    <!--/#services-->
	
	<?php
	}
	else
	{
		echo 'Vas-te connecter';
	}
	?>
	

    <?php include( "include/footer.php"); ?>