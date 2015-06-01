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
		<li><a href="Boutique">Boutique</a></li>
		<li class="active"><a href="#">Classement <span class="sr-only">(current)</span></a></li>
		<li><a href="Event">Event</a></li>
		<li><a href="Vote">Vote</a></li>
		<li><a href="Social">Social</a></li>
		<li><a href="">Forum</a></li>
		<li><a href="Faction">Faction</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	
	<?php include('Module/middleClassement.php') ; ?>

	<?php include('Module/RightContent.php') ; ?>	

	<?php include('Module/Footer.php') ; ?>

</body>

</html>
