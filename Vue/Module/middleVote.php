<?php 

	$verif = true;

	if (!empty($_POST['vote'])){																						// Si on reçoit un formulaire de POST
		$cookieSerious = $_COOKIE['cookieSerious'];

		try {
	        $connexionBD = new PDO('mysql:host=localhost;dbname=bd_seriouscraft;charset=utf8','root', '');				// Tente connexion à la base de données
	    }
	    catch (Exception $e) {
	        die('Erreur : ' . $e->getMessage());
	    }

	    $sql = "(Select * 
	    			From joueur);";
	    $requete = $connexionBD->prepare($sql);
	    $requete->execute();
	    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

	    foreach($resultats as $value){																					// On récupère le cookie et on test s'il est valide
	    	$key = sha1($value['pseudo_J'] . '.' . $value['mdp_J']);													// Si c'est le cas on incrémente le nombre de vote par 1 du joueur
	    	if ($key == $cookieSerious){
	    		$pseudo_J_Recup = $value['pseudo_J'];
	    		$sql = "UPDATE joueur SET nb_Vote = nb_Vote + 1 WHERE pseudo_J = '$pseudo_J_Recup';";
			    $requete = $connexionBD->prepare($sql);
			    $requete->execute();

	    		break 1;
	    	}
	    }																												// puis on affiche un message de remerciement

		echo'
			<div class="centerContent">
				<div class="panel panel-default">
				  <div class="panel-heading">Seriouscraft te remercie !</div>
				  <div class="panel-body">
				  	<p> Merci d\'avoir voté pour le serveur ! =) </p>
				  </div>
				</div>
			</div>
		';
		$verif = false;
	}

	else if (isset($_COOKIE['cookieSerious']) && $verif == true){													// On test le cookie	
		$testCookie = false;
		$cookieSerious = $_COOKIE['cookieSerious'];

		
		try {
	        $connexionBD = new PDO('mysql:host=localhost;dbname=bd_seriouscraft;charset=utf8','root', '');
	    }
	    catch (Exception $e) {
	        die('Erreur : ' . $e->getMessage());
	    }

	    $sql = "(Select * 
	    			From joueur);";
	    $requete = $connexionBD->prepare($sql);
	    $requete->execute();
	    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

	    foreach($resultats as $value){
	    	$key = sha1($value['pseudo_J'] . '.' . $value['mdp_J']);
	    	if ($key == $cookieSerious){
	    		$testCookie = true; 
	    		$pseudo_J_Recup = $value['pseudo_J'];

	    		break 1;
	    	}
	    }

		if ($testCookie){																						// S'il existe on affiche cette div permettant de voter
		 	echo'
				<div class="centerContent">
					<div class="panel panel-default">
					  <div class="panel-heading">Voter</div>
					  <div class="panel-body">
					  	<form method="post" action="">
		                  <input type="hidden" value="1" name="vote">
		                  <p> Connectez-vous sur le site rpg-paradize en cliquant sur ce lien : <a href="http://www.rpg-paradize.com/site-Seriouscraft+1.71.8-102773" target="_blank"> rpg-paradize </a>. </br>
		                  		Une fois le vote effectué, appuyez sur le boutton ci-dessous pour confirmer votre vote. </p>
		                  <button type="text" class="btn btn-default">J\'ai voté !</button>
		                </form>
					  </div>
					</div>
				</div>
			';
		}
	}
	
	else {																										// Sinon cette div, demandant de se connecter
		 echo '<div class="centerContent">
					<div class="panel panel-default">
					  <div class="panel-heading">Vote impossible</div>
					  <div class="panel-body">
					  		Veuillez vous connecter pour pouvoir voter pour le server.
					  </div>
					</div>
				</div>';
	}
?>