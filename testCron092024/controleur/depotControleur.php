<?php
	
	session_start();

        require('../modele/manager/ToolsManager.php');
		
		$localisation = 'dépot' ;
        $localisationSection = ToolsManager::removeAccents($localisation);
		
		require('../modele/traitementAffichageInformation.php');

		$section = 'section'.$localisationSection;
		require_once('../vue/template/skeleton.php');

?>