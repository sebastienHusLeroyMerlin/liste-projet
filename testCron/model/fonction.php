<?php

	function prixNiveauSup($niveauBatiment,$prix,$niveauTechnoReducRessource)
	{
		$coefMaitre = 1.62 ;
		$constanteDeReducRessource = 0.98 ; 
		
		if($niveauBatiment == 0)
		{
			$prixBatimentNormal = $prix;
		}
		elseif($niveauBatiment ==1)
		{
			$prixBatimentNormal = $prix * $coefMaitre ;
		}
		elseif($niveauBatiment >=2)
		{
			//au niveau sup
			$prixBatimentNormal = $prix*pow($coefMaitre ,$niveauBatiment-1);
		}
		else
		{
			return ' erreur : 1 ';
		}
		

		
		if($niveauTechnoReducRessource < 1 )
		{
			$prixfinal = $prixBatimentNormal;
			
			$prixfinal = round($prixfinal);
			
			return $prixfinal;
		}
		elseif($niveauTechnoReducRessource == 1)
		{
			$prixfinal = $prixBatimentNormal*$constanteDeReducRessource;
			
			$prixfinal = round($prixfinal);
			
			return $prixfinal;
		}
		elseif($niveauTechnoReducRessource >= 2)
		{
			$prixfinal = $prixBatimentNormal*pow($constanteDeReducRessource,($niveauTechnoReducRessource-1));
			
			$prixfinal = round($prixfinal);
			
			return $prixfinal;
		}
		else
		{
			return'erreur : 2';
		}
		
	}
