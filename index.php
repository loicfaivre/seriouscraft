<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Serious-Craft</title>

   	 <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Mon CSS -->
	<link rel="stylesheet" type="text/css" href="Vue/styles.css"/>
</head>

<body class="body">
	<img src="Images/SeriousCraft.png" class="img-responsive"> 

	<nav class="navbar navbar-default" id="myNav">								<!-- Affiche la barre de navigation adaptée à la page appellante, ce commentaire s'applique pour toutes les pages php dans le dossier Vue-->
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	      </button>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
		<li class="active"><a href="#">Accueil <span class="sr-only">(current)</span></a></li>				<!-- La spécification de la nav bar -->
		<li><a href="Nous-rejoindre">Nous-rejoindre</a></li>
		<li><a href="Boutique">Boutique</a></li>
		<li><a href="Classement">Classement</a></li>
		<li><a href="Event">Event</a></li>
		<li><a href="Vote">Vote</a></li>
		<li><a href="Social">Social</a></li>
		<li><a href="">Forum</a></li>
		<li><a href="Faction">Faction</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	
	<div class="centerContent">
		<div class="panel panel-default">
		  <div class="panel-heading">Une petite présentation</div>
		  <div class="panel-body">
		  	Bienvenue sur le site web du serveur SeriousCraft ! Un serveur où il fait bon vivre mais où le PVP est la seule loi.

Vous avez accès sur notre site web à un tutoriel simple vous indiquant simplement comment vous connecter sur le server, une boutique en ligne où vous pourrez trouver des kits, une page de classement, une page "Evènement", une page de vote et enfin une page social (forum, facebook, youtube).

Tous les membres du staff vous souhaite une bonne visite sur le site, et un bon jeu sur le serveur =).
		  </div>
		</div>

		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Mise-à-jour</h3>
		  </div>
		  <div class="panel-body">
		  	Comme futures mises à jour, il faudrat implémenter : héberger le site web, faire les diverses connexions vers la base de données, et s'occuper des liens entre la base de données et le serveur Minecraft.
		  </div>
		</div>

		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Première modification</h3>
		  </div>
		  <div class="panel-body">
		  	Implémentation des différentes pages du site web :"Accueil", "Boutique", "Classement", "Evènement", "Nous-rejoindre", "Social", "Vote".
		  </div>
		</div>
	</div>

	<?php include('Vue/Module/RightContent.php') ;  // On include les différents éléments dans la page index.php ici le right content ?>	

	<?php include('Vue/Module/Footer.php') ;  		// Cette méthode s'appliquera pour toutes les autres pages ?>

</body>

</html>
