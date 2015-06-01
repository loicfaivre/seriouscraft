<?php
	if (!empty($_POST['nom_Evenement'])){                                  													// Si l'on reçoit un post correspondant à l'ajout d'un évènement
		$evenementNotExist = True;

		try {
	        $connexionBD = new PDO('mysql:host=localhost;dbname=bd_seriouscraft;charset=utf8','root', '');
	    }
	    catch (Exception $e) {
	        die('Erreur : ' . $e->getMessage());
	    }
	    
	    $sql = '(Select * From evenement);';
	    $requete = $connexionBD->prepare($sql);
	    $requete->execute();
	    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC); // Renvoie un tableau (array)

	    foreach($resultats as $value){																						// On vérifie si l'évènement (son nom) n'existe pas déja
	    	if ($value['nom_Evenement'] == $_POST['nom_Evenement']){
	    		$evenementNotExist = False;
	    		break 1;
	    	}
	    }

	    if ($evenementNotExist){                                       														// Récupère les données du formulaire que l'on veut insérer puis les insère
	    	$nom_Evenement = $_POST['nom_Evenement'];
	    	$dateCreation = date("Y-m-d");
	    	$date_Debut = $_POST['date_Debut'];
	    	$date_Fin = $_POST['date_Fin'];
	    	$commentaire = $_POST['commentaire'];

	    	$sql = "INSERT INTO evenement (id_Evenement, nom_Evenement, dateCreation_Evenement, dateDeb_Evenement, dateFin_Evenement, description_Evenement, pseudo_J)
	    			VALUES (NULL, '$nom_Evenement', '$dateCreation', '$date_Debut', '$date_Fin', '$commentaire', 'themonheal');";
		    $requete = $connexionBD->prepare($sql);
		    $requete->execute();
		    echo '<div class="alert alert-success" role="alert">Félicitations, vous avez créé votre évènement avec succès !</div>';

	    }
	    else {																												// Si l'évènement existe déja, affiche une erreur	
	    	echo '<div class="alert alert-danger role="alert">Erreur, cet évènement existe déjà (changez le nom) !</div>';
	    }
	}

	if (isset($_COOKIE['cookieSerious'])){											// Vérifie s'il existe un cookie
		$testCookie = false;
		$cookieSerious = $_COOKIE['cookieSerious'];

		
		try {
	        $connexionBD = new PDO('mysql:host=localhost;dbname=bd_seriouscraft;charset=utf8','root', '');    // Essaie de se connecter à la base de données
	    }
	    catch (Exception $e) {
	        die('Erreur : ' . $e->getMessage());
	    }

	    $sql = "(Select * From joueur);";
	    $requete = $connexionBD->prepare($sql);
	    $requete->execute();
	    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

	    foreach($resultats as $value){																// Vérifie si le joueur existe
	    	$key = sha1($value['pseudo_J'] . '.' . $value['mdp_J']);
	    	if ($key == $cookieSerious){
	    		$testCookie = true; 
				$recupPseudo_J = $value['pseudo_J'];

	    		break 1;
	    	}
	    }

		if ($testCookie){																			// Si le joueur existe on affiche le formulaire permettant d'ajouter un évènement
			echo'<div class="panel panel-default">
					  <div class="panel-heading">Propose ton propos évènement !</div>
					  <div class="panel-body">
					  	<form method="post" action="">
						  <div class="form-group">
						    <label for="exampleInputName2">Nom évènement</label>
						    <input type="text" class="form-control" name="nom_Evenement" id="exampleInputName2" placeholder="Nom évènement">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputName2">Date début</label>
						    <input type="text" class="form-control" name="date_Debut" id="exampleInputName2" placeholder="2015-05-24">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputName2">Date fin</label>
						    <input type="text" class="form-control" name="date_Fin" id="exampleInputName2" placeholder="2015-05-24">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputName2">Commentaire</label>
						    <input type="text" class="form-control" name="commentaire" id="exampleInputName2" placeholder="Je suis le plus beau des commentaires">
						  </div>
						  <button type="submit" class="btn btn-default" Onclick="javascript:window.refresh()">Proposer</button>
						</form>	
					  </div>
					</div>'
			;
		}
	}

	else {																						// Sinon on affiche ce formulaire indiquant que le joueur doit se connecter pour poster un évènement
		echo'
			<div class="panel panel-default">
			  <div class="panel-heading">Proposition d\'évènement impossible</div>
			  <div class="panel-body">
			  		Veuillez vous connecter pour pouvoir proposer votre propre évènement.
			  </div>
			</div>
			'
		;
	}
?>




