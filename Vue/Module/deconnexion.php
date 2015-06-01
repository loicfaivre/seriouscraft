<?php
	if (!empty($_POST['deconnexion'])){                            // Si on reçoit un post correspondant au bouton de déconnexion
		setcookie('cookieSerious', '', time() - 3600);
		header("Refresh:0");
	}

  if (isset($_COOKIE['cookieSerious'])){                         // On test s'il y a un cookie 
    $testCookie = false;
    $cookieSerious = $_COOKIE['cookieSerious'];

    
    try {
          $connexionBD = new PDO('mysql:host=localhost;dbname=bd_seriouscraft;charset=utf8','root', '');    // Tente de se connecter à la base de données
      }
      catch (Exception $e) {
          die('Erreur : ' . $e->getMessage());
      }
      
      $sql = '(Select * 
            From joueur);';
      $requete = $connexionBD->prepare($sql);
      $requete->execute();
      $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

      foreach($resultats as $value){                                  // Récupère le pseudo, le mdp, le seriousflouz, le nombre de vote, le nombre de point boutique, le nom de la faction 
        $key = sha1($value['pseudo_J'] . '.' . $value['mdp_J']);
        if ($key == $cookieSerious){
          $testCookie = true;
          $recupPseudo_J = $value['pseudo_J'];
          $recupMdp_J = $value['mdp_J'];
          $recupSeriousflouz_J = $value['seriousflouz'];
          $recupNb_Vote_J = $value['nb_Vote'];
          $recupNb_PointBoutique_J = $value['nb_PointBoutique'];
          $recupFaction_J = $value['nom_Faction'];

          if ($recupFaction_J == 'NULL'){
            $recupFaction_J = "Sans faction";
          }

          break 1;
        }
      }

    if ($testCookie){                                               // Affiche le pseudo, le mdp, le seriousflouz, le nombre de vote, le nombre de point boutique, le nom de la faction
        echo '<div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Bonjour '.$recupPseudo_J.'  !</h3>
                </div>
                <div class="panel-body">
                  <p>Seriousflouz : '.$recupSeriousflouz_J.'</p>
                  <p>Nombre Vote : '.$recupNb_Vote_J.'</p>
                  <p>Nombre Point Boutique : '.$recupNb_PointBoutique_J.'</p>
                  <form method="post" action="">
                    <input type="hidden" value="1" name="deconnexion">
                    <button type="submit" class="btn btn-default">Déconnexion</button>
                  </form>
                </div>
              </div>
              ';
    }
  }
?>