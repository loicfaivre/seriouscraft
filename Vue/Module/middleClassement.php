<div class="centerContent">
	<div class="panel panel-default">
	  <div class="panel-heading">Classement Seriousflouz</div>
	  <div class="panel-body">
	  		<table class="table table-striped">							<!-- Affiche le classement des joueurs suivant un critère particulier -->
					<th> Pseudo </th>
					<th> Faction </th>
					<th> Seriousflouz </th>

				<?php 

			    try {
			        $connexionBD = new PDO('mysql:host=localhost;dbname=bd_seriouscraft;charset=utf8','root', ''); 			// Tente une connexion à la base de données
			    }
			    catch (Exception $e) {
			        die('Erreur : ' . $e->getMessage());
			    }
			    
			    $sql = 'Select J.pseudo_J, J.seriousflouz, F.nom_Faction
						From Joueur J, Faction F
						Where (J.nom_Faction = F.nom_Faction)
						Order By J.seriousflouz DESC ;';
			    $requete = $connexionBD->prepare($sql);																		
			    $requete->execute();
			    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC); // Renvoie un tableau (array)

			    foreach($resultats as $value){															// Affiche le classement des joueurs en fonction des seriousflouzs
			        echo ('<tr><td>'.' '.$value['pseudo_J'].'</td><td>'.' '.$value['nom_Faction'].'</td><td>'.' '.$value['seriousflouz'].'</td></tr>');
			    }
			 
				?>	
			</table>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">Classement Vote</div>
	  <div class="panel-body">
	  		<table class="table table-striped">
					<th> Pseudo </th>
					<th> Faction </th>
					<th> Nombre Vote </th>

				<?php 

			    try {
			        $connexionBD = new PDO('mysql:host=localhost;dbname=bd_seriouscraft;charset=utf8','root', '');
			    }
			    catch (Exception $e) {
			        die('Erreur : ' . $e->getMessage());
			    }
			    
			    $sql = 'Select J.pseudo_J, J.nb_Vote, F.nom_Faction
						From Joueur J, Faction F
						Where (J.nom_Faction = F.nom_Faction)
						Order By J.nb_Vote DESC ;';
			    $requete = $connexionBD->prepare($sql);
			    $requete->execute();
			    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC); // Renvoie un tableau (array)

			    foreach($resultats as $value){																	// Affiche le classement des joueurs en fonction des votes
			        echo ('<tr><td>'.' '.$value['pseudo_J'].'</td><td>'.' '.$value['nom_Faction'].'</td><td>'.' '.$value['nb_Vote'].'</td></tr>');
			    }
			 
				?>	
			</table>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">Classement PointBoutique</div>
	  <div class="panel-body">
	  		<table class="table table-striped">
					<th> Pseudo </th>
					<th> Faction </th>
					<th> Point Boutique </th>

				<?php 

			    try {
			        $connexionBD = new PDO('mysql:host=localhost;dbname=bd_seriouscraft;charset=utf8','root', '');
			    }
			    catch (Exception $e) {
			        die('Erreur : ' . $e->getMessage());
			    }
			    
			    $sql = 'Select J.pseudo_J, J.nb_PointBoutique, F.nom_Faction
						From Joueur J, Faction F
						Where (J.nom_Faction = F.nom_Faction)
						Order By J.nb_PointBoutique DESC ;';
			    $requete = $connexionBD->prepare($sql);
			    $requete->execute();
			    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC); // Renvoie un tableau (array)

			    foreach($resultats as $value){																// Affiche le classement des joueurs en fonction des nb_PointBoutique
			        echo ('<tr><td>'.' '.$value['pseudo_J'].'</td><td>'.' '.$value['nom_Faction'].'</td><td>'.' '.$value['nb_PointBoutique'].'</td></tr>');
			    }
			 
				?>	
			</table>
	  </div>
	</div>
</div>