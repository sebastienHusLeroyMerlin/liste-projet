<?php 

//require_once('./scriptPerso/codeDetermineCampagne.php');
require_once('./scriptPerso/enumeration.php');

function determineCampagne($tabParam){
		
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
	                       $result = TypeCampagne::Perso;
	
			}else{
				//echo "J'affiche la campagne de base";
				$result = TypeCampagne::Base;
			}
		}else{
			
			//echo " la campagne se passe sur au moins deux mois -- 13";
			
			if($mois >= $moisDeb && $mois <= $moisFin){
				
				//echo " Infos campagne -- 131";
			
				if((($jour >= $jourDeb and $jour <= 31 and $mois == $moisDeb) or ($mois > $moisDeb && $jour <= $jourFin)) or  (($moisFin - $moisDeb )> 0 && $mois != $moisFin)){
					
					//echo "J'affiche la campagne personalisée -- 1311";
					$result = TypeCampagne::Perso;
					
				}else{
					
					//echo "J'affiche la campagne de base -- 1312";
					$result = TypeCampagne::Base;
				}
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
						$result = TypeCampagne::Perso;
					
					}else{
					
						//echo "J'affiche la campagne de base -- 2112";
						$result = TypeCampagne::Base;
					
					}
				}
			}
		}
//$result =  print_r($result->value());
//var_dump($result);
		return $result->value;
	}



    $jourDeb = 01;
    $moisDeb = 12;
    $anDeb = 2023;
    
    $jourFin = 31;
    $moisFin = 12;
    $anFin = 2023;
    
    $tabParamDate = array(
        "jourDeb" => $jourDeb ,
        "moisDeb" => $moisDeb ,
        "anDeb" => $anDeb ,
        "jourFin" => $jourFin ,
        "moisFin" => $moisFin ,
        "anFin" => $anFin  
        );

$result =  determineCampagne($tabParamDate);

print($result);