<?php

use testCron\modele\manager\ToolsManager;

    require_once('../modele/manager/UserManager.php');
	require_once('../modele/manager/ToolsManager.php');
	require_once('../modele/manager/ConnectionManager.php');
	require_once('../modele/manager/ColonieManager.php');

	$pseudo = ToolsManager::validData($_POST['pseudo']);
	$pass = ToolsManager::validData($_POST['pass']);
	
	if(isset($pseudo) And isset($pass))
	{
		if(!empty($pseudo) And !empty($pass))
		{
			
			$resultatConnexion = ConnectionManager::Auth();

			if(isset($resultatConnexion)){
                            
				$variableDeSession = UserManager::getAllUserInfosByIdPlayer($resultatConnexion['id']);
                

                $_SESSION['Auth'] = true;
                $_SESSION['pseudo'] = $variableDeSession['pseudo'] ;
                $_SESSION['pass'] = $variableDeSession['pass'] ;
                $_SESSION['mail'] = $variableDeSession['mail'] ;
                $_SESSION['id_access'] = $variableDeSession['id_access'] ;
                $_SESSION['id_joueur'] = $resultatConnexion['id'] ;
				
				
				$infosColo = ColonieManager::getInfosLastActivColoByIdPlayer($resultatConnexion['id'] ) ;
				$_SESSION['id_activ_colo'] = $infosColo['id'];

                $_SESSION['destination'] = 'accueil';
                header('Location:../controleur/routeur.php');
            }
            else
            {
				$resultatRecherchePseudo = UserManager::getAllUserInfosByPseudo($pseudo);
                
                if(!isset($resultatRecherchePseudo))
                {
                    echo 'Votre pseudo est Inconnu !!' ;
                }
                else
                {
                    echo 'Votre mot de passe est invalide !!' ;
                }
                $_SESSION['Auth'] = false;
            }

				
			
		}
		elseif(empty($pseudo) OR empty($pass))
		{
			if(!empty($pseudo) AND empty($pass))
			{
				echo 'Vous n\'avez pas renseigné votre motde de passe ! ';
				
			}
			elseif(empty($pseudo) AND !empty($pass))
			{
				echo 'Vous n\'avez pas renseigné votre pseudo ! ';
			}
			elseif(empty($pseudo) AND empty($pass))
			{
				echo 'Vous n\'avez renseigné ni votre motde de passe, ni votre pseudo ! ';
			}
			else
			{
				echo' Erreur : 5 ' ;
			}
		}
		else
		{
			echo 'Erreur : 2 ' ;
		}
	}
	elseif(!isset($pseudo) OR !isset($pass))
	{
		$pseudo = null ;
		$pass = null ;
	}
	else
	{
		echo 'Erreur : 1 ';
	}

