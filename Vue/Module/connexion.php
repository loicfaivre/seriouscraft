<?php
	if (!empty($_POST['pseudo_J_Input'])){                 // Si l'on reçoit un post correspondant à une demande de connexion
		$joueurExiste = False;
		$pseudoJoueurRecup = NULL;
		$mdpJoueurRecup = NULL;

		try {
	        $connexionBD = new PDO('mysql:host=localhost;dbname=bd_seriouscraft;charset=utf8','root', '');  
	    }
	    catch (Exception $e) {
	        die('Erreur : ' . $e->getMessage());
	    }
	    
	    $sql = '(Select pseudo_J, mdp_J 
	    			From joueur);';
	    $requete = $connexionBD->prepare($sql);
	    $requete->execute();
	    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC); // Renvoie un tableau (array)

	    foreach($resultats as $value){																						// On vérifie si le joueur existe dans la base de données
	    	if ($value['pseudo_J'] == $_POST['pseudo_J_Input'] && $value['mdp_J'] == $_POST['mdp_J_Input']){
	    		$pseudoJoueurRecup = $value['pseudo_J'];
	    		$mdpJoueurRecup = $value['mdp_J'];
	    		$joueurExiste =	 true;
	    		break 1;
	    	}
	    }
	    if ($joueurExiste){
	    	setcookie('cookieSerious', sha1($pseudoJoueurRecup . '.' . $mdpJoueurRecup), time() + 3600);					// Si c'est le cas on lui créer un cookie puis on refresh la page (retard de 1 page du cookie)
	    	header("Refresh:0");
	    }

	    else {
	    	echo '<div class="alert alert-danger role="alert">Erreur : Pseudo et/ou Mot de passe incorrect</div>';			// Sinon on lui affiche un message d'erreur
	    }
	}
?>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Connectez-vous !</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="">
	  <div class="form-group">
	    <label for="exampleInputName2">Pseudo</label>
	    <input type="text" class="form-control" name="pseudo_J_Input" id="exampleInputName2" placeholder="Pseudo">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control" name="mdp_J_Input" id="exampleInputPassword1" placeholder="Password">
	  </div>
	  <button type="submit" class="btn btn-default" Onclick="javascript:window.refresh()">Connexion</button>
	</form>
  </div>
</div>