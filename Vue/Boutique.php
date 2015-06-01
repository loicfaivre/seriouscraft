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
	<link rel="stylesheet" type="text/css" href="styles.css"/>
</head>

<body class="body">
	<img src="../Images/SeriousCraft.png" class="img-responsive"> 

	<nav class="navbar navbar-default" id="myNav">
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
		<li><a href="Accueil">Accueil</a></li>
		<li><a href="Nous-rejoindre">Nous-rejoindre</a></li>
		<li class="active"><a href="#">Boutique <span class="sr-only">(current)</span></a></li>
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

	
	<div class="centerContent">	 <!-- Affiche la programmation de la boutique n'a pas été implémenté au vue du cahier des charges, en effet elle risque d'être gérée directement de puis l'application minecraft -->
		<?php 

	    try {
	        $connexionBD = new PDO('mysql:host=localhost;dbname=bd_seriouscraft;charset=utf8','root', '');
	    }
	    catch (Exception $e) {
	        die('Erreur : ' . $e->getMessage());
	    }
	    
	    $sql = '(Select E.*, 0 as Nb_Vote
					From Evenement E
					Where E.id_Evenement NOT IN	(Select id_Evenement From Voter))
					Union
					(Select E2.*, Count(*) as Nb_Vote
					From Evenement E2, Voter V
					Where E2.id_Evenement = V.id_Evenement);';
	    $requete = $connexionBD->prepare($sql);
	    $requete->execute();
	    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC); // Renvoie un tableau (array)

	    foreach($resultats as $value){
	        echo ('<div class="panel panel-default">
	        		<div class="panel-heading">'.$value['nom_Evenement'].'</div>
	        		<div class="panel-body">
	        			<p>'.$value['description_Evenement'].'</p>

	        			<p> Date Création : '.$value['dateCreation_Evenement'].'
	        			<br> Date Début : '.$value['dateDeb_Evenement'].'
	        			<br>Date Fin : '.$value['dateFin_Evenement'].'</p>

	        			<p> Auteur : '.$value['pseudo_J'].'
	        			<br> Nombre Vote : '.$value['Nb_Vote'].'</p>
	        		</div>
	        		</div>');
	    }
	 
		?>	
	</div>

	<?php include('Module/RightContent.php') ; ?>	

	<?php include('Module/Footer.php') ; ?>

</body>

</html>
