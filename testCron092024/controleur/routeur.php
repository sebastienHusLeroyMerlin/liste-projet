<?php

    //require_once ('../modele/manager/ToolsManager.php');
require_once ('../autoload.php');


use modele\manager\ToolsManager;
use enums\TypeFile;
use controleur\ReineControleur;
use modele\AffichageInformation;

	
	if(!isset($_SESSION))
		session_start();
	//var_dump($_SESSION);
	if(isset($_SESSION['Auth']) && $_SESSION['Auth'] == true /*isset($_SESSION['mail']) AND isset($_SESSION['droit']) AND isset($_SESSION['pass'])*/)
	{

		if(!empty($_SESSION['destination']))
		{
			$destinationCible = $_SESSION['destination'];
			unset($_SESSION['destination']); 
		}
		else
			if(!empty($_GET['destination']))
			{
				$destinationCible = $_GET['destination'];

			}else
				$destinationCible = 'reine';

            $test =  new ReineControleur($destinationCible);

//		$destinationCible = ucfirst($destinationCible);
//
//		$controleurCible =  $destinationCible . "Controleur";
//		var_dump($controleurCible);
//
//        // Instanciation dynamique du contrôleur
//        $controleur = new $controleurCible($destinationCible);
//
//		var_dump($_SESSION['id_joueur']);
//		$controleur->chargerVue($_SESSION['id_joueur']);
		
		
	}
	else
	{
		if(!empty($_POST)){
			require_once('connexionControleur.php');
			exit;
		}
		else{
			header('Location:../vue/connexion.php');
		}
        // a remettre en evidence
		echo'Dis t\'essairais pas de me hacker petit malin ? </br>
			Si tu veux jouer inscrits toi ';?><a href="inscription.php">ICI</a><?php
 
	}

?>