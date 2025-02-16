<?php

    require_once('BddManager.php');

class BatimentManager{

    public static function getBuildingByColony($idColo, $idPlayer){

        $bdd = BddManager::getBdd();

        $reqListBuildingByColo = $bdd->prepare('SELECT * FROM batiment_joueur AS bj
        INNER JOIN  batiment AS b ON b.id = bj.id_batiment
        INNER JOIN  type_batiment AS tb ON tb.id = bj.id_batiment
        WHERE id_joueur = :idPlayer AND id_colonie = :idColo');
        $reqListBuildingByColo->execute(array(
            'idPlayer' => $idPlayer,
            'idColo' => $idColo
        ));

        $listBuildingByColo = $reqListBuildingByColo->fetchAll();
    
        $reqListBuildingByColo->closeCursor();
        
        unset($bdd);
        
        return $listBuildingByColo;
    }

    public static function getTypeBat(){

        $bdd = BddManager::getBdd();

        $reqListTypeBat = $bdd->query('SELECT * FROM type_batiment');
        
        $listTypeBat = $reqListTypeBat->fetchAll();

        $reqListTypeBat->closeCursor();

        unset($bdd);

        return $listTypeBat;

    }

    public static function  prixNiveauSup($niveauBatiment,$prix,$niveauTechnoReducRessource)
	{
		$coefMaitre = 1.62 ;
		$constanteDeReducRessource = 0.98 ; // chaque ameliorationtechnologique reduit de 2% le besoin en ressources
		
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

    public static function prixTempSup($niveauBatiment,$tempsBase,$niveauTechnoReducTemps){

        $coefAugmentationTemps = 1.35 ;
		$constanteDeReducTemps = 0.55 ; // chaque amelioration technologique reduit de 45% le temps
		
		if($niveauBatiment == 0)
		{
			$tempsBatimentNormal = $tempsBase;
		}
		elseif($niveauBatiment ==1)
		{
			$tempsBatimentNormal = $tempsBase * $coefAugmentationTemps ;
		}
		elseif($niveauBatiment >=2)
		{
			//au niveau sup
			$tempsBatimentNormal = $tempsBase*pow($coefAugmentationTemps ,$niveauBatiment-1);
		}
		else
		{
			return ' erreur : 1 ';
		}
		

		
		if($niveauTechnoReducTemps < 1 )
		{
			$prixfinal = $tempsBatimentNormal;
			
			$prixfinal = round($prixfinal);
			
			return $prixfinal;
		}
		elseif($niveauTechnoReducTemps == 1)
		{
			$prixfinal = $tempsBatimentNormal*$constanteDeReducTemps;
			
			$prixfinal = round($prixfinal);
			
			return $prixfinal;
		}
		elseif($niveauTechnoReducTemps >= 2)
		{
			$tempsfinal = $tempsBatimentNormal*pow($constanteDeReducTemps,($niveauTechnoReducTemps-1));
			
			$tempsfinal = round($tempsfinal);
			
			return $tempsfinal;
		}
		else
		{
			return'erreur : 2';
		}

    }

    public static function getPricesLevelUp($buildingObject) {

        // a deporter dans le batiment manager
            // comment recuperer le niveau technologique reduc temps et reducRessource
            $boisCouveuse = BatimentManager::prixNiveauSup($buildingObject['niveau'],$buildingObject['bois'],4);
            $cireCouveuse = BatimentManager::prixNiveauSup($currentBuildingLevel,$batiment['cire'],4);
            $eauCouveuse = BatimentManager::prixNiveauSup($currentBuildingLevel,$batiment['eau'],4);
            $dureeConstructionCouveuse = BatimentManager::prixTempSup($currentBuildingLevel,$batiment['bois'] + $batiment['cire'] + $batiment['eau'],47);
            
            //$_SESSION['boisCouveuse'] = $boisCouveuse ;
            //$_SESSION['cireCouveuse'] = $cireCouveuse ;
            //$_SESSION['eauCouveuse'] = $eauCouveuse ;

            //$dureeConstructionCouveuse = 349232;

            // conversion durée
            $resteJourAnnee = $dureeConstructionCouveuse % 31536000;
            $resteJourMois = $resteJourAnnee % 86400;
            $resteJour = $resteJourAnnee % 2592000 ;
            $resteHeure = $resteJour % 86400 ;
            $resteMinute = $resteJour % 3600 ;
            $resteSeconde = $resteHeure % 60 ;
            $annee = round($dureeConstructionCouveuse - $resteJourAnnee ) / 31536000;
            $mois = round((($resteJourAnnee - $resteJourMois)/86400)-(($resteJourAnnee - $resteJourMois)/86400)%30) / 30 ;
            $jour =  round(($resteJourAnnee - $resteJourMois)/86400) % 30;
            $heures = round($resteHeure - $resteMinute ) / 3600  ; 
            $minutes = round($resteMinute - $resteSeconde ) / 60  ;  
            $secondes = round($resteSeconde);

            $uniteAnnee = $uniteHeure = $uniteMois =  $uniteJour = $uniteJour = $uniteMinute = "" ;
            
            if($annee == 0 ) {

                $annee = ""  ;
            }
            else {
                $uniteAnnee = "a" ;
            }

            if($mois == 0 ) {
                $mois = "" ;
            }
            else {
                $uniteMois = "m" ;
            }

            if($jour == 0 ) {
                $jour = "" ;
            }
            else {
                $uniteJour = "j" ;
            }
            if($heures == 0 ) {
                $heures = "" ;
            }else {
                $uniteHeure = "h" ;
            }
            if($minutes == 0 ) {
                $minutes = "" ;
            }else {
                $uniteMinute = "min" ;
            }
            $dureeConstructionCouveuseConverti = "$annee $uniteAnnee $mois $uniteMois $jour $uniteJour $heures $uniteHeure $minutes $uniteMinute $secondes s"; 


    }
}

