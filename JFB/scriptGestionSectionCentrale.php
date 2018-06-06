<?php

	if($page == "accueilPublic")
	{
		include("sectionCentrale.php");
	}
	elseif($page == "inscription")
	{
		include("formulaireInscription.php");
	}
	elseif($page == "compteRendus")
	{
		include("sectionCentraleCompteRendus.php");
	}
		
?>