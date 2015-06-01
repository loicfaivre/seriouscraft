<div class="rightContent">
	<?php 
		if (isset($_COOKIE['cookieSerious'])){                             								// Si un cookie est récupéré
			$testCookie = false;

			$cookieSerious = $_COOKIE['cookieSerious'];
			
			try {
		        $connexionBD = new PDO('mysql:host=localhost;dbname=bd_seriouscraft;charset=utf8','root', '');    // Tentative de connexion à la base de données
		    }
		    catch (Exception $e) {
		        die('Erreur : ' . $e->getMessage());
		    }
		    
		    $sql = '(Select pseudo_J, mdp_J 
		    			From joueur);';
		    $requete = $connexionBD->prepare($sql);
		    $requete->execute();
		    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

		    foreach($resultats as $value){																// Test sur le cookie existe
		    	$key = sha1($value['pseudo_J'] . '.' . $value['mdp_J']);
		    	if ($key == $cookieSerious){
		    		$testCookie = true;
		    		break 1;
		    	}
		    }

			if ($testCookie){																			// Si oui on include ce module
		    	include('deconnexion.php') ;
		    }
		} 

		else {
		    include('connexion.php') ;																	// Si non on include celui-ci
		}
	?>

	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Evènement récent !</h3>
	  </div>
	  <div class="panel-body">
	     Ouverture du site Web et du serveur Minecraft le 1er Juin 2015.
	  </div>
	</div>
</div>