<?php
	require_once('manager/BddManager.php');
	session_start();

	if(isset($_SESSION['Auth']) AND $_SESSION['Auth'] == true)
	{
			if(isset($_POST['incremente'] ) AND $_POST['incremente']== 'incremente')
			{
				$_SESSION['destination'] = $_POST['localisation'] ;
				/*var_dump($_SESSION['destination'] );
				exit;*/
				// connexion a la bdd
				
				$bdd =  BddManager::getBdd();
				
				//voir si les ouvriere affecte aux terrain sont deja recuperer quelque part avant de poursuivre sinon les recupere par requete
				
				
				
				
				
				/*$_SESSION['ressource_total'] : represente la quantite de cette ressource en bdd
				_SESSION['ressource'] : represente de combien on credite la ressource*/
				$boisTotal = $_SESSION['bois'] + $_SESSION['bois_total'] ;
				$argileTotal = $_SESSION['argile'] + $_SESSION['argile_total'] ;
				$eauTotal = $_SESSION['eau'] + $_SESSION['eau_total'] ;
				$cireTotal = $_SESSION['cire'] + $_SESSION['cire_total'] ;
				$nourritureTotal= $_SESSION['nourriture'] + $_SESSION['nourriture_total'] ;
				
				
				
				//mise a jour ressource
				$reqUpRessource = $bdd->prepare('UPDATE ressource SET cire_total =:cire_total , bois_total =:bois_total , argile_total=:argile_total , eau_total =:eau_total , nourriture_total=:nourriture_total WHERE id_joueur = :id_joueur');
				$reqUpRessource ->execute(array(
				'bois_total' => $boisTotal,
				'argile_total' => $argileTotal ,
				'eau_total' => $eauTotal,
				'cire_total'=>$cireTotal,
				'nourriture_total' => $nourritureTotal,
				'id_joueur' => $_SESSION['id_joueur']
				));
				
				$reqUpRessource ->closeCursor();
				
					
				
					
				// ressource total et ouvriere total affecte recuperable par variable de session
				// $_SESSION['bois'] ;
				// $_SESSION['argile'] ;
				// $_SESSION['cire'] ;
				// $_SESSION['eau'] ;
				// $_SESSION['nourriture'] ;
				// $_SESSION['ouvriere_bois'];
				// $_SESSION['ouvriere_argile'];
				// $_SESSION['ouvriere_cire'];
				// $_SESSION['ouvriere_eau'];
				// $_SESSION['ouvriere_nourriture'];
				
			
				
				
				 
				
				
				header('Location:../index.php');
			}
			else
			{
				$page = $_POST['localisation'] ;
				header('Location:'.$page);
			}
	}
	else
	{
		echo'Dis t\'essairais pas de me hacker petit malin ? </br>
			Si tu veux jouer inscrits toi ';?><a href="inscription.php">ICI</a><?php
			
			header('Refresh:3;../vue/connexion.php');
	}