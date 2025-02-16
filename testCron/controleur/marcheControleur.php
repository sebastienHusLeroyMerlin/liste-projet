<?php
	
	session_start();
		
		$localisation = 'marché' ;
		
		require('../modele/traitementAffichageInformation.php');

		$section = 'sectionMarche';
		require_once('../vue/template/skeleton.php');

?>