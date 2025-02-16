<?php
	require_once('manager/BddManager.php');
	require_once('manager/ToolsManager.php');
	session_start();

	if(isset($_SESSION['Auth']) AND $_SESSION['Auth'] == true)
	{
	
		if(isset($_POST['nomBatiment']) && !empty($_POST['nomBatiment']))
		{
				
				$nomBatiment = ToolsManager::validData($_POST['nomBatiment']);
				
				$bois  = (int) $_SESSION['bois_total'] ;
				$cire  = (int) $_SESSION['cire_total'] ;
				$eau = (int) $_SESSION['eau_total'] ;
				
				var_dump($bois);
				if(isset($bois) AND isset($cire) AND isset($eau) AND !empty($bois) AND !empty($cire) AND !empty($eau) OR $bois == 0 OR $cire == 0 OR $eau == 0)
				{
					if($bois >= $_SESSION['boisCouveuse'] AND $cire >= $_SESSION['cireCouveuse'] AND $eau >= $_SESSION['eauCouveuse'])
					{
						//connexion a la bdd
						
						$bdd =  BddManager::getBdd();
						
						//recuper le niveau actuel du batiment concerné
						$req = $bdd->prepare('SELECT '.$nomBatiment.' FROM colonie WHERE id_joueur = :id_joueur');
						$req->execute(array(
						'id_joueur' => $_SESSION['id_joueur']
						));
						
						$resultat = $req->fetch();
						
						$req->closeCursor();
						
						
						//je met a jour le nouveau niveau du batiment
						$reqMiseAJourNiveauBatiment = $bdd->prepare('UPDATE colonie SET '.$nomBatiment.' = :nouveauNiveauBatiment WHERE id_joueur = :id_joueur ');
						$reqMiseAJourNiveauBatiment->execute(array(
						'nouveauNiveauBatiment' => $resultat[$_POST['nomBatiment']]+1,
						'id_joueur' => $_SESSION['id_joueur']
						));
						
						$reqMiseAJourNiveauBatiment->closeCursor();
						
						
						// $eau - $_SESSION['eauCouveuse']
						// $cire - $_SESSION['cireCouveuse'] 
						// $bois - $_SESSION['boisCouveuse']
						
						//je mets ajour la table des ressources a laquel j enleve le prix du batiment
						$reqMiseAJourRessource = $bdd->prepare('UPDATE ressource SET bois_total =:bois_total , cire_total =:cire_total  , eau_total =:eau_total  WHERE id_joueur = :id_joueur');
						$reqMiseAJourRessource->execute(array(
						'eau_total' => $eau - $_SESSION['eauCouveuse'],
						'cire_total' => $cire - $_SESSION['cireCouveuse'] ,
						'bois_total' => $bois - $_SESSION['boisCouveuse'],
						'id_joueur' => $_SESSION['id_joueur']
						));

						$reqMiseAJourRessource->closeCursor();
						echo'update';
						
						$_SESSION['destination'] = 'accueil';
						header('Location:../controleur/routeur.php');
						
					}
					else
					{
						if ($bois < $_SESSION['boisCouveuse'])
						{
							$boisManquant = $_SESSION['boisCouveuse']-$bois;
							$messageComplementaire =  'Vous n\'avez pas asser de bois .Il vous en manque : '. $boisManquant.' .';
						}
						if ($cire < $_SESSION['cireCouveuse'])
						{
							$cireManquante = $_SESSION['cireCouveuse'] - $cire ;
							$messageComplementaire2 =  'Vous n\'avez pas asser de cire .Il vous en manque : '. $cireManquante.' .';
						}
						if ($eau< $_SESSION['eauCouveuse'])
						{
							$eauManquante = $_SESSION['eauCouveuse']-$eau;
							$messageComplementaire3=  'Vous n\'avez pas asser d\'eau .Il vous en manque : '. $eauManquante.' .';
						}
						
						$_SESSION['message'] = 'Sans ressources pas de construction possible !'.$messageComplementaire.''.$messageComplementaire2.''.$messageComplementaire3;
						
						echo'message';
						
						$_SESSION['destination'] = 'accueil';
						header('Location:../controleur/routeur.php');
					}
				}
				else
				{
					echo 'Erreur : 3';
				}
				
		}
		else
		{
			echo 'erreur :1 ';
		}
	
	}
	else
	{
		echo'Dis t\'essairais pas de me hacker petit malin ? </br>
			Si tu veux jouer inscrits toi ';?><a href="inscription.php">ICI</a><?php
			
			header('Refresh:3;connexion.php');
	}
