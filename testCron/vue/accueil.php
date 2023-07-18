<?php

		unset($_SESSION['boisCouveuse'] );
		unset($_SESSION['cireCouveuse']);
		unset($_SESSION['eauCouveuse']);
		
		
		unset($_SESSION['typeRessource']);
		$_SESSION['typeRessource'] = 'rien';

		$_SESSION['race'] = 'abeille' ;
		$_SESSION['niveau'] = 15;
		
		$localisation = 'accueil' ;
		
		require('../model/traitementAffichageInformation.php');
		require('../model/fonction.php');

		$section = 'sectionBatiment';
		require_once('template/skeleton.php');

?>