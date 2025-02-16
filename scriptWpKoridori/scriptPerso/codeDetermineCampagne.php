<?php

class Tool{

	public static function determineCampagne($tabParam){
		
	$jourDeb = $tabParam['jourDeb'];
	$moisDeb = $tabParam['moisDeb'];
	$anDeb = $tabParam['anDeb'];
	
	$jourFin = $tabParam['jourFin'];
	$moisFin = $tabParam['moisFin'];
	$anFin = $tabParam['anFin'];
	
	$jour = date('j');
	$mois = date('m');
	$annee = date('Y');
		
	//es ce que mon année de debut et de fin sont identique
	if(($anFin - $anDeb )== 0 && $annee == $anFin ){
		
		//echo " tout se passe sur la même année -- 1 ";
		
		if(($moisFin - $moisDeb )== 0 && $mois == $moisFin){
			
			//echo " tout se passe sur le même mois -- 11";
			
			if($jour >= $jourDeb && $jour <= $jourFin){
	
				//echo "J'affiche la campagne personalisée";
	                       $result = "campPerso";
	
			}else{
				//echo "J'affiche la campagne de base";
				$result = "campBase";
			}
		}else{
			
			//echo " la campagne se passe sur au moins deux mois -- 13";
			
			if($mois >= $moisDeb && $mois <= $moisFin){
				
				//echo " Infos campagne -- 131";
			
				if((($jour >= $jourDeb and $jour <= 31 and $mois == $moisDeb) or ($mois > $moisDeb && $jour <= $jourFin)) or  (($moisFin - $moisDeb )> 0 && $mois != $moisFin)){
					
					//echo "J'affiche la campagne personalisée -- 1311";
					$result = "campPerso";
					
				}else{
					
					//echo "J'affiche la campagne de base -- 1312";
					$result = "campBase";
					
					/*if($jour > $jourFin && $mois == $moisFin){
						
						//echo " la campagne perso est finie -- 13121
						";
						
					}else{
						
						//echo " la campagne perso n'a pas encore démarée -- 13122
						";
						
					}*/
					
				}
			}else{
				
				/*//echo " Infos campagne -- 132";
				
				if($mois < $moisDeb){
					
					//echo " la campagne n'a pas encore démarée -- 1321";
					
				}else{
					
					//echo " la campagne est finie -- 1322
					";
					
				}*/
				
			}
		
		}
	}else{
		
		//echo " la campagne se passe sur au moins deux ans -- 2";
				
			// suis je dans les annee de la campagnes
			if($annee >= $anDeb and $annee <= $anFin){
				
				//echo " la campagne est a cheval sur 2 au moins 2 mois -- 21"; 
				
				// suis je dans les mois de la campagne
				if(($mois >= $moisDeb and $annee == $anDeb) || ($mois <= $moisFin and $annee == $anFin) || ($annee > $anDeb && $annee < $anFin)){
		
					//echo "je suis dans les mois de la campagne 211";
					
					//suis je dans les jours de la campagnes
					if(($jour >= $jourDeb and $jour <= 31 and $mois == $moisDeb and $annee == $anDeb) 
					or ($jour <= $jourFin and  $mois == $moisFin and $annee == $anFin)
					or ($jour<= 31 and $mois <= 12)){
					
						//echo "J'affiche la campagne personalisée -- 2111";
						$result = "campPerso";
					
					}else{
					
						//echo "J'affiche la campagne de base -- 2112";
						$result = "campBase";
					
						/*if($jour > $jourFin && $mois == $moisFin){
							
							//echo " la campagne perso est finie -- 21121
							";
							
						}else{
							
							//echo " la campagne perso n'a pas encore démarée -- 211212
							";
							
						}*/
					
					}
					
					
				}else{
					
					/*//echo "je ne suis pas dans les mois de la campagne -- 212";
					
					if($mois > $moisFin && $annee == $anFin){
						
						//echo " la campagne perso est finie -- 2121
						";
						
					}else{
						
						//echo " la campagne perso n'a pas encore démarée -- 2122
						";
						
					}*/
					
				}
				
			}else{
				
				/*//echo "info campagne -- 22
				";
				
				if($annee < $anDeb){
					
					//echo " la campagne n'a pas encore démarée --  221
					";
					
				}else{
					
					//echo " la campagne est finie -- 222
					";
					
				}*/
				
			}
		}

		return $result;
	}
}

?>