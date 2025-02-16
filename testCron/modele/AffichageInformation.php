<?php

	require_once('manager/BddManager.php');
	require_once('constante.php');

	class AffichageInformation{

	
		public static function getInfoBatiment(){

			echo "dans get info batiment ";
			
		$bdd = BddManager::getBdd();
			
			
			/*//recuperation des information d'affichage
			$reqInfoBatimentAffichage = $bdd->prepare('SELECT * FROM batiment_joueur as bj 
												INNER JOIN batiment as bt on bt.id = bj.id_batiment
												INNER JOIN type_batiment as tb on tb.id = bt.id_type_batiment
												WHERE id_joueur = :id_joueur');
			$reqInfoBatimentAffichage->execute(array(
			'id_joueur' => $_SESSION['id_joueur']
			));
			
			$listInfosBatiment = $reqInfoBatimentAffichage->fetchAll();
			
			foreach ($listInfosBatiment as $batiment) {
				//var_dump($listInfosBatiment);
				$nom_batiment = $batiment['nom_batiment'];
				$_SESSION[$nom_batiment] = $batiment;
			}
			
			var_dump($_SESSION);
			$reqInfoBatimentAffichage->closeCursor();
			*/
			
			//affichage des prix batiment
			$reqPrixBatiment = $bdd->prepare('SELECT * FROM batiment WHERE nom_batiment = :nomBatiment');
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

/*
			
			$reqTechnoJoueur = $bdd->prepare('SELECT * FROM technologie_joueur WHERE id_joueur = :id_joueur');
			$reqTechnoJoueur->execute(array(
			'id_joueur' => $_SESSION['id_joueur']
			));
			
			while($resultatTechnoJoueur = $reqTechnoJoueur->fetch())
			{
				var_dump($resultatTechnoJoueur);
				/*
				$technoRecolteRessourceProductionCire = $resultatTechnoJoueur['tech_recolte_cire'];
				$technoRecolteRessourceProductionBois = $resultatTechnoJoueur['tech_recolte_bois'] ;
				$technoRecolteRessourceProductionArgile = $resultatTechnoJoueur['tech_recolte_argile'] ;
				$technoRecolteRessourceProductionEau = $resultatTechnoJoueur['tech_recolte_eau'] ;
				$technoRecolteRessourceProductionNourriture = $resultatTechnoJoueur['tech_recolte_nourriture'] ;
			
			}
			

			/*
			$reqTechnoJoueur = $bdd->prepare('SELECT * FROM test WHERE id_joueur = :id_joueur');
			$reqTechnoJoueur->execute(array(
			'id_joueur' => $_SESSION['id_joueur']
			));

			while($resultatTechnoJoueur = $reqTechnoJoueur->fetch())
			{*/
				
				$technoRecolteRessourceProductionCire = 1;
				$technoRecolteRessourceProductionBois = 1;
				$technoRecolteRessourceProductionArgile = 1 ;
				$technoRecolteRessourceProductionEau = 1 ;
				$technoRecolteRessourceProductionNourriture = 1 ;
			
			/*}
			/*
			$reqTechnoJoueur->closeCursor();
*/
		

			$reqInfoRessource = $bdd->prepare('SELECT * FROM ressource WHERE id_joueur = :id_joueur');
			$reqInfoRessource->execute(array(
			'id_joueur' => $_SESSION['id_joueur']
			));
			
			$resultatInfoRessource = $reqInfoRessource->fetch();
			
			unset($_SESSION['eau'] );
			unset($_SESSION['mielat'] );

			unset($_SESSION['bois'] );
			unset($_SESSION['argile'] );
			unset($_SESSION['feuille'] );
			unset($_SESSION['pierre'] );
			unset($_SESSION['terre'] );
			unset($_SESSION['liege'] );
			unset($_SESSION['pierre_brute'] );

			unset($_SESSION['cire']);
			unset($_SESSION['cocon']);
			unset($_SESSION['feutre']);
			unset($_SESSION['soie']);
			unset($_SESSION['carton']);
			unset($_SESSION['segment_l']);

			unset($_SESSION['nourriture_abeille'] );
			unset($_SESSION['nourriture_fourmis']);
			unset($_SESSION['nourriture_frelon']);
			unset($_SESSION['nourriture_arraigne']);
			unset($_SESSION['nourriture_termite']);
			unset($_SESSION['nourriture_v_luisant']);

			unset($_SESSION['saphir']);
			unset($_SESSION['rubis']);
			unset($_SESSION['amethyste']);
			unset($_SESSION['emeraude']);
			unset($_SESSION['diamant_b']);
			unset($_SESSION['diamant_n']);

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
			
			$_SESSION['bois'] = $resultatInfoRessource['bois'] ;
			$_SESSION['argile'] = $resultatInfoRessource['argile'] ;
			$_SESSION['feuille'] = $resultatInfoRessource['feuille'] ;
			$_SESSION['pierre'] = $resultatInfoRessource['pierre'] ;
			$_SESSION['terre'] = $resultatInfoRessource['terre'] ;
			$_SESSION['liege'] = $resultatInfoRessource['liege'] ;
			$_SESSION['pierre_brute'] = $resultatInfoRessource['pierre_brute'] ;

			$_SESSION['cire'] = $resultatInfoRessource['cire'] ;
			$_SESSION['cocon'] = $resultatInfoRessource['cocon'] ;
			$_SESSION['feutre'] = $resultatInfoRessource['feutre'] ;
			$_SESSION['soie'] = $resultatInfoRessource['soie'] ;
			$_SESSION['carton'] = $resultatInfoRessource['carton'] ;
			$_SESSION['segment_l'] = $resultatInfoRessource['segment_l'] ;

			$_SESSION['eau'] = $resultatInfoRessource['eau'] ;
			$_SESSION['mielat'] = $resultatInfoRessource['mielat'] ;

			$_SESSION['saphir'] = $resultatInfoRessource['saphir'] ;
			$_SESSION['rubis'] = $resultatInfoRessource['rubis'] ;
			$_SESSION['amethyste'] = $resultatInfoRessource['amethyste'] ;
			$_SESSION['emeraude'] = $resultatInfoRessource['emeraude'] ;
			$_SESSION['diamant_b'] = $resultatInfoRessource['diamant_b'] ;
			$_SESSION['diamant_n'] = $resultatInfoRessource['diamant_n'] ;

			$_SESSION['nourriture_abeille'] = $resultatInfoRessource['nourriture_abeille'] ;
			$_SESSION['nourriture_fourmis'] = $resultatInfoRessource['nourriture_fourmis'] ;
			$_SESSION['nourriture_termite'] = $resultatInfoRessource['nourriture_termite'] ;
			$_SESSION['nourriture_arraigne'] = $resultatInfoRessource['nourriture_arraigne'] ;
			$_SESSION['nourriture_frelon'] = $resultatInfoRessource['nourriture_frelon'] ;
			$_SESSION['nourriture_v_luisant'] = $resultatInfoRessource['nourriture_v_luisant'] ;


			$reqInfoRessource->closeCursor();

			/*****************************************/

			$reqRepartOuvri = $bdd->prepare('SELECT * FROM repartition_ouvriere WHERE id_joueur = :id_joueur');
			$reqRepartOuvri->execute(array(
			'id_joueur' => $_SESSION['id_joueur']
			));
			
			$resultatRepartOuvri = $reqRepartOuvri->fetch();


			$_SESSION['ouvriere_prod_bois_plaine'] = $resultatRepartOuvri['ouvriere_bois_plaine'] ;
			$_SESSION['ouvriere_prod_bois_foret'] = $resultatRepartOuvri['ouvriere_bois_foret'] ;
			$_SESSION['ouvriere_prod_bois_marecage'] = $resultatRepartOuvri['ouvriere_bois_marecage'] ;
			$_SESSION['ouvriere_prod_argile_plaine'] = $resultatRepartOuvri['ouvriere_argile_plaine'] ;
			$_SESSION['ouvriere_prod_argile_foret'] = $resultatRepartOuvri['ouvriere_argile_foret'] ;
			$_SESSION['ouvriere_prod_argile_marecage'] = $resultatRepartOuvri['ouvriere_argile_marecage'] ;
			$_SESSION['ouvriere_prod_cire'] = $resultatRepartOuvri['ouvriere_cire'] ;
			$_SESSION['ouvriere_prod_eau_plaine'] = $resultatRepartOuvri['ouvriere_eau_plaine'] ;
			$_SESSION['ouvriere_prod_eau_foret'] = $resultatRepartOuvri['ouvriere_eau_foret'] ;
			$_SESSION['ouvriere_prod_eau_marecage'] = $resultatRepartOuvri['ouvriere_eau_marecage'] ;
			$_SESSION['ouvriere_prod_nourriture_plaine'] = $resultatRepartOuvri['ouvriere_nourriture_plaine'] ;
			$_SESSION['ouvriere_prod_nourriture_foret'] = $resultatRepartOuvri['ouvriere_nourriture_foret'] ;
			$_SESSION['ouvriere_prod_nourriture_marecage'] = $resultatRepartOuvri['ouvriere_nourriture_marecage'] ;
								
			$_SESSION['ouvriere_bois_total'] = $resultatRepartOuvri['ouvriere_bois_plaine'] + $resultatRepartOuvri['ouvriere_bois_foret'] + $resultatRepartOuvri['ouvriere_bois_marecage'] ;
			$_SESSION['ouvriere_argile_total'] = $resultatRepartOuvri['ouvriere_argile_plaine'] + $resultatRepartOuvri['ouvriere_argile_foret'] + $resultatRepartOuvri['ouvriere_argile_marecage'] ;
			$_SESSION['ouvriere_eau_total'] = $resultatRepartOuvri['ouvriere_eau_plaine'] + $resultatRepartOuvri['ouvriere_eau_foret'] + $resultatRepartOuvri['ouvriere_eau_marecage'] ;
			$_SESSION['ouvriere_nourriture_total'] = $resultatRepartOuvri['ouvriere_nourriture_plaine'] + $resultatRepartOuvri['ouvriere_nourriture_foret'] + $resultatRepartOuvri['ouvriere_nourriture_marecage'] ;
			$_SESSION['ouvriere_total'] = $resultatRepartOuvri['ouvriere_total'] ;

			$reqRepartOuvri->closeCursor();

			/* premier argument =  technologie recolte de ressource
			second $ressourceBase = 0.4 ressource de base que peut transporter une ouvriere
			troisieme chiffre correspond au coef multiplicateur (de ressource de base ) par rapport au terrain ou se trouvent les ouvris*/
			
			$_SESSION['prod_total_cire'] = ((1+($technoRecolteRessourceProductionCire/100)) * RESSOURCE_CIRE_BASE) * $_SESSION['ouvriere_prod_cire'] ;
			
			$_SESSION['plaine_prod_bois'] =  ((1+($technoRecolteRessourceProductionBois/100)) * RESSOURCE_BOIS_BASE) * COEF_BOIS_PLAINE * $_SESSION['ouvriere_prod_bois_plaine'] ;
			$_SESSION['foret_prod_bois'] =  ((1+($technoRecolteRessourceProductionBois/100)) * RESSOURCE_BOIS_BASE) * COEF_BOIS_FORET * $_SESSION['ouvriere_prod_bois_foret'];
			$_SESSION['marecage_prod_bois'] =  ((1+($technoRecolteRessourceProductionBois/100)) * RESSOURCE_BOIS_BASE) * COEF_BOIS_MARECAGE * $_SESSION['ouvriere_prod_bois_marecage'];
					
			$_SESSION['plaine_prod_argile'] =  ((1+($technoRecolteRessourceProductionArgile/100)) * RESSOURCE_ARGILE_BASE) * COEF_ARGILE_PLAINE * $_SESSION['ouvriere_prod_argile_plaine'];
			$_SESSION['foret_prod_argile'] =  ((1+($technoRecolteRessourceProductionArgile/100)) * RESSOURCE_ARGILE_BASE) * COEF_ARGILE_FORET * $_SESSION['ouvriere_prod_argile_foret'];
			$_SESSION['marecage_prod_argile'] =  ((1+($technoRecolteRessourceProductionArgile/100)) * RESSOURCE_ARGILE_BASE) * COEF_ARGILE_MARECAGE * $_SESSION['ouvriere_prod_argile_marecage'];
					
			$_SESSION['plaine_prod_eau']=  ((1+($technoRecolteRessourceProductionEau/100)) * COEF_EAU_PLAINE) * COEF_EAU_PLAINE * $_SESSION['ouvriere_prod_eau_plaine'];
			$_SESSION['foret_prod_eau'] =  ((1+($technoRecolteRessourceProductionEau/100)) * COEF_EAU_PLAINE) * COEF_EAU_FORET * $_SESSION['ouvriere_prod_eau_foret'];
			$_SESSION['marecage_prod_eau']=  ((1+($technoRecolteRessourceProductionEau/100)) * COEF_EAU_PLAINE) * COEF_EAU_MARECAGE * $_SESSION['ouvriere_prod_eau_marecage'];
					
			$_SESSION['plaine_prod_nourriture']=  ((1+($technoRecolteRessourceProductionNourriture/100)) * RESSOURCE_NOURRITURE_BASE) * COEF_NOURRITURE_PLAINE * $_SESSION['ouvriere_prod_nourriture_plaine'];
			$_SESSION['foret_prod_nourriture'] =  ((1+($technoRecolteRessourceProductionNourriture/100)) * RESSOURCE_NOURRITURE_BASE) * COEF_NOURRITURE_FORET * $_SESSION['ouvriere_prod_nourriture_foret'];
			$_SESSION['marecage_prod_nourriture'] =  ((1+($technoRecolteRessourceProductionNourriture/100)) * RESSOURCE_NOURRITURE_BASE) * COEF_NOURRITURE_MARECAGE * $_SESSION['ouvriere_prod_nourriture_marecage'];
			
			$_SESSION['ouvriereDisponible'] = $resultatRepartOuvri['ouvriere_total']- $_SESSION['ouvriere_eau_total']  - $resultatRepartOuvri['ouvriere_cire'] ; - $_SESSION['ouvriere_argile_total'] - $_SESSION['ouvriere_nourriture_total']  - $_SESSION['ouvriere_bois_total']  ;
			
			// permet de savoir de combien on incremente les ressources de notre compte
			$_SESSION['prod_total_eau'] = $_SESSION['plaine_prod_eau'] + $_SESSION['foret_prod_eau']  + $_SESSION['marecage_prod_eau'] ;
			$_SESSION['prod_total_bois'] = $_SESSION['plaine_prod_bois'] + $_SESSION['foret_prod_bois']  + $_SESSION['marecage_prod_bois'] ;
			$_SESSION['prod_total_argile'] = $_SESSION['plaine_prod_argile'] + $_SESSION['foret_prod_argile'] + $_SESSION['marecage_prod_argile'] ;
			$_SESSION['prod_total_nourriture'] = $_SESSION['plaine_prod_nourriture'] + $_SESSION['foret_prod_nourriture'] + $_SESSION['marecage_prod_nourriture'] ;
		}
	}