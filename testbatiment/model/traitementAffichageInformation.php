<?php

	require_once('manager/BddManager.php');

	
		$bdd = BddManager::getBdd();
			
			
			//recuperation des information d'affichage
			$reqInfoAffichage = $bdd->prepare('SELECT * FROM colonie WHERE id_joueur = :id_joueur');
			$reqInfoAffichage->execute(array(
			'id_joueur' => $_SESSION['id_joueur']
			));
			
			$resultatInfoAffichage = $reqInfoAffichage->fetch();

			$_SESSION['niveauCouveuse'] = $resultatInfoAffichage['couveuse'];
			$_SESSION['niveauSolarium'] = $resultatInfoAffichage['solarium'];
			
			$reqInfoAffichage->closeCursor();
			
			
			//affichage des prix batiment
			$reqPrixBatiment = $bdd->prepare('SELECT * FROM batiment WHERE nomBatiment = :nomBatiment');
			$reqPrixBatiment->execute(array(
			'nomBatiment' => 'couveuse'
			));
			
			
			while($resultatPrixBatiment = $reqPrixBatiment->fetch())
			{
				
				 $boisCouveuse = $resultatPrixBatiment['bois'];
				 $cireCouveuse = $resultatPrixBatiment['cire'];
				 $eauCouveuse = $resultatPrixBatiment['eau'];
				 $dureeConstructionCouveuse = $resultatPrixBatiment['duree_construction'];
			
			}
						
			$reqPrixBatiment->closeCursor();
			
			
			
			$reqInfoRessource = $bdd->prepare('SELECT * FROM ressource WHERE id_joueur = :id_joueur');
			$reqInfoRessource->execute(array(
			'id_joueur' => $_SESSION['id_joueur']
			));
			
			$resultatInfoRessource = $reqInfoRessource->fetch();
			
			unset($_SESSION['eau'] );
			unset($_SESSION['bois'] );
			unset($_SESSION['argile'] );
			unset($_SESSION['nourriture'] );
			unset($_SESSION['bois_plaine']);
			unset($_SESSION['bois_foret'] );
			unset($_SESSION['bois_marecage'] );
			unset($_SESSION['cire_plaine'] );
			unset($_SESSION['cire_foret'] );
			unset($_SESSION['cire_marecagel'] );
			unset($_SESSION['eau_plaine'] );
			unset($_SESSION['eau_foret'] );
			unset($_SESSION['eau_marecage'] );
			unset($_SESSION['argile_plaine'] );
			unset($_SESSION['argile_foret'] );
			unset($_SESSION['argile_marecage'] );
			unset($_SESSION['nourriture_plaine'] );
			unset($_SESSION['nourriture_foret'] );
			unset($_SESSION['nourriture_marecage'] );
			unset($_SESSION['ouvriere_bois_plaine']);
			unset($_SESSION['ouvriere_bois_foret']);
			unset($_SESSION['ouvriere_bois_marecage']) ;
			unset($_SESSION['ouvriere_argile_plaine']) ;
			unset($_SESSION['ouvriere_argile_foret']) ;
			unset($_SESSION['ouvriere_argile_marecage']) ;
			unset($_SESSION['ouvriere_cire']) ;
			unset($_SESSION['ouvriere_eau_plaine']) ;
			unset($_SESSION['ouvriere_eau_foret']) ;
			unset($_SESSION['ouvriere_eau_marecage']) ;
			unset($_SESSION['ouvriere_nourriture_plaine']) ;
			unset($_SESSION['ouvriere_nourriture_foret']) ;
			unset($_SESSION['ouvriere_nourriture_marecage']) ;
			unset($_SESSION['ouvriere_bois_total']) ;
			unset($_SESSION['ouvriere_cire_total']) ;
			unset($_SESSION['ouvriere_argile_total']) ;
			unset($_SESSION['ouvriere_eau_total']) ;
			unset($_SESSION['ouvriere_nourriture_total']) ;
			unset($_SESSION['ouvriere_total']) ;
			
			unset($_SESSION['ouvriereDisponible']) ;
			
			//temmporaire
			$technoRecolteRessourceProductionCire = 1;
			$technoRecolteRessource = 1 ;
			$ressourceBase = 0.4;

			unset($_SESSION['plaine_bois'] ) ;
			unset($_SESSION['foret_bois'] ) ;
			unset($_SESSION['marecage_bois'] ) ;
					
			unset($_SESSION['plaine_argile'] ) ;
			unset($_SESSION['foret_argile'] ) ;
			unset($_SESSION['marecage_argile'] ) ;
					
			unset($_SESSION['plaine_eau']) ;
			unset($_SESSION['foret_eau'] ) ;
			unset($_SESSION['marecage_eau']) ;
					
			unset($_SESSION['plaine_nourriture']) ;
			unset($_SESSION['foret_nourriture'] ) ;
			unset($_SESSION['marecage_nourriture'] ) ;
				
			
			
			// $_SESSION['bois_plaine'] = $resultatInfoRessource['bois_plaine'] ;
			// $_SESSION['bois_foret'] = $resultatInfoRessource['bois_foret'] ;
			// $_SESSION['bois_marecage'] = $resultatInfoRessource['bois_marecage'] ;
			// $_SESSION['cire_plaine'] = $resultatInfoRessource['cire_plaine'] ;
			// $_SESSION['cire_foret'] = $resultatInfoRessource['cire_foret'] ;
			// $_SESSION['cire_marecage'] = $resultatInfoRessource['cire_marecage'] ;
			// $_SESSION['eau_plaine'] = $resultatInfoRessource['eau_plaine'] ;
			// $_SESSION['eau_foret'] = $resultatInfoRessource['eau_foret'] ;
			// $_SESSION['eau_marecage'] = $resultatInfoRessource['eau_marecage'] ;
			// $_SESSION['argile_plaine'] = $resultatInfoRessource['argile_plaine'] ;
			// $_SESSION['argile_foret'] = $resultatInfoRessource['argile_foret'] ;
			// $_SESSION['argile_marecage'] = $resultatInfoRessource['argile_marecage'] ;
			// $_SESSION['nourriture_plaine'] = $resultatInfoRessource['nourriture_plaine'] ;
			// $_SESSION['nourriture_foret'] = $resultatInfoRessource['nourriture_foret'] ;
			// $_SESSION['nourriture_marecage'] = $resultatInfoRessource['nourriture_marecage'] ;
			
			$_SESSION['bois_total'] = $resultatInfoRessource['bois_total'] ;
			$_SESSION['cire_total'] = $resultatInfoRessource['cire_total'] ;
			$_SESSION['argile_total'] = $resultatInfoRessource['argile_total'] ;
			$_SESSION['eau_total'] = $resultatInfoRessource['eau_total'] ;
			$_SESSION['nourriture_total'] = $resultatInfoRessource['nourriture_total'] ;
			
			$_SESSION['ouvriere_bois_plaine'] = $resultatInfoRessource['ouvriere_bois_plaine'] ;
			$_SESSION['ouvriere_bois_foret'] = $resultatInfoRessource['ouvriere_bois_foret'] ;
			$_SESSION['ouvriere_bois_marecage'] = $resultatInfoRessource['ouvriere_bois_marecage'] ;
			$_SESSION['ouvriere_argile_plaine'] = $resultatInfoRessource['ouvriere_argile_plaine'] ;
			$_SESSION['ouvriere_argile_foret'] = $resultatInfoRessource['ouvriere_argile_foret'] ;
			$_SESSION['ouvriere_argile_marecage'] = $resultatInfoRessource['ouvriere_argile_marecage'] ;
			$_SESSION['ouvriere_cire'] = $resultatInfoRessource['ouvriere_cire'] ;
			$_SESSION['ouvriere_eau_plaine'] = $resultatInfoRessource['ouvriere_eau_plaine'] ;
			$_SESSION['ouvriere_eau_foret'] = $resultatInfoRessource['ouvriere_eau_foret'] ;
			$_SESSION['ouvriere_eau_marecage'] = $resultatInfoRessource['ouvriere_eau_marecage'] ;
			$_SESSION['ouvriere_nourriture_plaine'] = $resultatInfoRessource['ouvriere_nourriture_plaine'] ;
			$_SESSION['ouvriere_nourriture_foret'] = $resultatInfoRessource['ouvriere_nourriture_foret'] ;
			$_SESSION['ouvriere_nourriture_marecage'] = $resultatInfoRessource['ouvriere_nourriture_marecage'] ;
								
			$_SESSION['ouvriere_bois_total'] = $resultatInfoRessource['ouvriere_bois_plaine'] + $resultatInfoRessource['ouvriere_bois_foret'] + $resultatInfoRessource['ouvriere_bois_marecage'] ;
			$_SESSION['ouvriere_argile_total'] = $resultatInfoRessource['ouvriere_argile_plaine'] + $resultatInfoRessource['ouvriere_argile_foret'] + $resultatInfoRessource['ouvriere_argile_marecage'] ;
			$_SESSION['ouvriere_eau_total'] = $resultatInfoRessource['ouvriere_eau_plaine'] + $resultatInfoRessource['ouvriere_eau_foret'] + $resultatInfoRessource['ouvriere_eau_marecage'] ;
			$_SESSION['ouvriere_nourriture_total'] = $resultatInfoRessource['ouvriere_nourriture_plaine'] + $resultatInfoRessource['ouvriere_nourriture_foret'] + $resultatInfoRessource['ouvriere_nourriture_marecage'] ;
			$_SESSION['ouvriere_total'] = $resultatInfoRessource['ouvriere_total'] ;
			
			/* premier argument =  technologie recolte de ressource
			second $ressourceBase = 0.4 ressource de base que peut transporter une ouvriere
			troisieme chiffre correspond au coef multiplicateur (de ressource de base ) par rapport au terrain ou se trouvent les ouvris*/
			
			$_SESSION['cire'] = ($technoRecolteRessourceProductionCire + $ressourceBase) * $_SESSION['ouvriere_cire'] ;
			$_SESSION['plaine_bois'] =  ($technoRecolteRessource + $ressourceBase) * 1 * $_SESSION['ouvriere_bois_plaine'] ;
			$_SESSION['foret_bois'] =  ($technoRecolteRessource + $ressourceBase) * 1.25 * $_SESSION['ouvriere_bois_foret'];
			$_SESSION['marecage_bois'] =  ($technoRecolteRessource + $ressourceBase) * 0.75 * $_SESSION['ouvriere_bois_marecage'];
					
			$_SESSION['plaine_argile'] =  ($technoRecolteRessource + $ressourceBase) * 1.5 * $_SESSION['ouvriere_argile_plaine'];
			$_SESSION['foret_argile'] =  ($technoRecolteRessource + $ressourceBase) * 1.25 * $_SESSION['ouvriere_argile_foret'];
			$_SESSION['marecage_argile'] =  ($technoRecolteRessource + $ressourceBase) * 0.75 * $_SESSION['ouvriere_argile_marecage'];
					
			$_SESSION['plaine_eau']=  ($technoRecolteRessource + $ressourceBase) * 0.75 * $_SESSION['ouvriere_eau_plaine'];
			$_SESSION['foret_eau'] =  ($technoRecolteRessource + $ressourceBase) * 0.5 * $_SESSION['ouvriere_eau_foret'];
			$_SESSION['marecage_eau']=  ($technoRecolteRessource + $ressourceBase) * 2.25 * $_SESSION['ouvriere_eau_marecage'];
					
			$_SESSION['plaine_nourriture']=  ($technoRecolteRessource + $ressourceBase) * 1 * $_SESSION['ouvriere_nourriture_plaine'];
			$_SESSION['foret_nourriture'] =  ($technoRecolteRessource + $ressourceBase) * 1 * $_SESSION['ouvriere_nourriture_foret'];
			$_SESSION['marecage_nourriture'] =  ($technoRecolteRessource + $ressourceBase) * 1 * $_SESSION['ouvriere_nourriture_marecage'];
			
			$_SESSION['ouvriereDisponible'] = $resultatInfoRessource['ouvriere_total']- $_SESSION['ouvriere_eau_total']  - $_SESSION['ouvriere_cire'] - $_SESSION['ouvriere_argile_total'] - $_SESSION['ouvriere_nourriture_total']  - $_SESSION['ouvriere_bois_total']  ;
			
			// permet de savoir de combien on incremente les ressources de notre compte
			$_SESSION['eau'] = $_SESSION['plaine_eau'] + $_SESSION['foret_eau']  + $_SESSION['marecage_eau'] ;
			$_SESSION['bois'] = $_SESSION['plaine_bois'] + $_SESSION['foret_bois']  + $_SESSION['marecage_bois'] ;
			$_SESSION['argile'] = $_SESSION['plaine_argile'] + $_SESSION['foret_argile'] + $_SESSION['marecage_argile'] ;
			$_SESSION['nourriture'] = $_SESSION['plaine_nourriture'] + $_SESSION['foret_nourriture'] + $_SESSION['marecage_nourriture'] ;
			
			// $_SESSION['production_total_eau'] = ;
			// $_SESSION['production_total_bois'] = ;
			// $_SESSION['production_total_argile'] = ;
			// $_SESSION['production_total_nourriture'] = ;
			
			
			$reqInfoRessource->closeCursor();


