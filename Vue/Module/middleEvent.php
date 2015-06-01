<div class="centerContent">
	<?php 																		// Affiche les différents évènements qui se sont produits ou qui vont se produire
		include('Module/creationEvenement.php') ;

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