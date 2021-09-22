<?php

    require_once('Bdd.php');

    Class User{

		public static function Auth(){

			//connection a la bdd
			$bdd = Bdd::getBdd();

			$reqConnexion = $bdd->prepare('SELECT id FROM membre WHERE pass = :pass AND pseudo = :pseudo');
			$reqConnexion->execute(array(
			'pseudo' => $_POST['pseudo'],
			'pass' => $_POST['pass'] 
			));
			
			$resultatConnexion = $reqConnexion->fetch();
									
            $reqConnexion->closeCursor();
            
            session_start();
            $_SESSION['Auth'] = false;

			if(isset($resultatConnexion))
			{
				
				
				$req= $bdd->prepare('SELECT * FROM membre WHERE id = :id');
				$req->execute(array(
				'id' => $resultatConnexion['id']
				));
				
				$variableDeSession = $req->fetch();
				
				
				
				$req->closeCursor();
                
                $_SESSION['Auth'] = true;
				$_SESSION['pseudo'] = $variableDeSession['pseudo'] ;
				$_SESSION['pass'] = $variableDeSession['pass'] ;
				$_SESSION['mail'] = $variableDeSession['mail'] ;
				$_SESSION['droit'] = $variableDeSession['droit'] ;
				$_SESSION['id_joueur'] = $resultatConnexion['id'] ;
				
				$_SESSION['destination'] = 'accueil';
				return $auth = true;
			}
			elseif(!isset($resultat))
			{
				// es ce le pseudo qui est mauvais ?
				$reqRecherchePseudo = $bdd->prepare('SELECT pseudo FROM membre WHERE  pseudo = :pseudo');
				$reqRecherchePseudo->execute(array(
				'pseudo' => $_POST['pseudo']				 
				));
				
				$resultatRecherchePseudo = $reqRecherchePseudo->fetch();
				
				$reqRecherchePseudo->closeCursor();
				
				if(!isset($resultatRecherchePseudo))
				{
					echo 'Votre pseudo est Inconnu !!' ;
				}
				else
				{
					echo 'Votre mot de passe est invalide !!' ;
				}
				
			}
			else
			{
				echo 'Erreur : 3 ';
            }
        }
	}