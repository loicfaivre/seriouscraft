<?php 
	if (isset($_COOKIE['cookieSerious'])){																				// On test le cookie
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

	    foreach($resultats as $value){																					// Si le cookie correspond à un joueur
	    	$key = sha1($value['pseudo_J'] . '.' . $value['mdp_J']);													// On récupère le nom de sa faction en testant s'il en a une
	    	if ($key == $cookieSerious){
	    		$testCookie = true; 
				$recupFaction_J = $value['nom_Faction'];

				if ($recupFaction_J == 'NULL'){
					$recupFaction_J = "Sans faction";
				}

	    		break 1;
	    	}
	    }

		if ($testCookie){																					// Puis on affiche les caractéristiques de sa faction dans cette condition

		    ?>

		    <div class="centerContent">
		        <div class="panel panel-default">
				  <div class="panel-heading">Membres de votre faction</div>
				  <div class="panel-body">
				  		<table class="table table-striped">
		  					<th> Pseudo </th>
		  					<th> SeriousFlouz </th>
		  					<th> Nombre de vote </th>
		  					<th> Point Boutique </th>
			  					<?php
			  					$sql = "(Select pseudo_J, seriousflouz, nb_Vote, nb_PointBoutique
											From joueur
											Where nom_Faction = '$recupFaction_J'
											Order By pseudo_J);";
							    $requete = $connexionBD->prepare($sql);
							    $requete->execute();
							    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC); // Renvoie un tableau (array)
							    foreach($resultats as $value){
							        echo ('<tr><td>'.' '.$value['pseudo_J'].'</td><td>'.' '.$value['seriousflouz'].'</td><td>'.' '.$value['nb_Vote'].'</td><td>'.' '.$value['nb_PointBoutique'].'</td></tr>');
							    }
							 	?>
						</table>
				  	</div>
				</div>
			</div>
<?php			
	    }
	} 

	else {																																		// Sinon on lui demande de se co
	    echo '<div class="centerContent">
					<div class="panel panel-default">
					  <div class="panel-heading">Faction indisponible</div>
					  <div class="panel-body">
					  		Veuillez vous connecter pour afficher toutes les données correspondantes à votre faction.
					  </div>
					</div>
				</div>';
	}
?>

