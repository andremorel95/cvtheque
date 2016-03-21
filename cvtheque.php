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
                        <li class="scroll"><a href="index.php">Mon compte</a></li>
                        <li class="scroll active"><a href="cvtheque.php">CVthèque</a></li>
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
    <section class="content">
        <div id="tablecv" class="row">
            <div>
                <div class="box">
                    <div class="box-header">
                        <h3 align="center" class="box-title">Liste des CV étudiants</h3>
                    </div>
					
					 <select name="Anne">
						
					</select>
							<input type="hidden" name="MAX_FILE_SIZE" value="10000000"> 
     Fichier : <input type="file" name="cv">
     <input class="btn btn-primary" type="submit" name="envoyer" value="Envoyer le fichier">
</form></p>
            </div>
        </div>
    </section><!--/#about-->
					
					
					
                    <div style="margin-top: 15px; margin-bottom: 15px"class="container-fluid">
                        <div class="row">
                            <div id="demo-12-col" class="col-xs-12">
                                <div class="col-xs-2 col-xs-offset-1"><a class="btn btn-primary btn-lg custom" href="#">Info</a></div>
                                <div class="col-xs-2"><a class="btn btn-primary btn-lg custom" href="#">GEA</a></div>
                                <div class="col-xs-2"><a class="btn btn-primary btn-lg custom" href="#">GEII</a></div>
                                <div class="col-xs-2"><a class="btn btn-primary btn-lg custom" href="#">RT</a></div>
                                <div class="col-xs-2"><a class="btn btn-primary btn-lg custom" href="#">CJ</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <?php
						afficherListeCv();
						?>
                        <div class="col-xs-6">
                            <div id="example1_info" class="dataTables_info">Affichage de 1 to 8 parmi les x CV</div>
                        </div>
                        <div class="col-xs-6">
                            <div id="alignementcv" class="dataTables_paginate paging_bootstrap">
                                <ul class="pagination">
                                    <li class="prev disabled"><a href="#">← Previous</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li class="next"><a href="#">Next → </a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->

	<?php
	}
	else
	{
		echo 'Vas-te connecter';
	}
	?>
    <?php include( "include/footer.php"); ?>