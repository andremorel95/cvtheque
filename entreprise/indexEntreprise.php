<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <?php include( "include/header.php"); ?>
	<body>

		<?php
		if(isset($_SESSION['login'])){
		?>
		
	    <section id="services">
	        <div class="container">

	            <div class="section-header">
	                <h2 class="section-title text-center wow fadeInDown">Espace Entreprise</h2>
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
	                                    <h4 class="media-heading">Mettre en Une offre de Stage</h4></a>
	                            <p>Pensez a mettre les prérequis pour ce stage</p>
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
	                                    <h4 class="media-heading">Supprimer une offre </h4></a>
	                            <p>Supprimez une offre de stage da</p>
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
	                                    <h4 class="media-heading">Se connecter</h4></a>
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
			echo 'Vous etes pas connecteé';
		}
		?>
	</body>
	   <?php include( "include/footer.php"); ?>

</html>