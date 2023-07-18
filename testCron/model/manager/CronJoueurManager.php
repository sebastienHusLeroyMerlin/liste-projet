<?php

require_once('../manager/BddManager.php');
require_once('../constante.php');

final class CronJoueur
{
        private int $technoRecolteBois ;
        private int $technoRecolteArgile ;
        private int $technoRecolteEau ;
        private int $technoRecolteNourriture ;
        private int $technoRecolteCire ;

        private int $ouvriereBoisPlaine ;
        private int $ouvriereBoisMarecage ;
        private int $ouvriereBoisForet ;
        private int $ouvriereCire ;
        private int $ouvriereArgilePlaine ;
        private int $ouvriereArgileForet ;
        private int $ouvriereArgileMarecage ;
        private int $ouvriereEauPlaine ;
        private int $ouvriereEauForet ;
        private int $ouvriereEauMarecage ;
        private int $ouvriereNourriturePlaine ;
        private int $ouvriereNourritureForet ;
        private int $ouvriereNourritureMarecage ;

        private int $boisTotal ;
        private int $argileTotal ;
        private int $eauTotal ;
        private int $nourritureTotal ;
        private int $cireTotal ;

        private int $idJoueur;


        public function __construct($objetJoueur)
        {
                $this->technoRecolteBois = $this->initDataJoueur($objetJoueur['tech_recolte_bois']);
                $this->technoRecolteArgile = $this->initDataJoueur($objetJoueur['tech_recolte_argile']);
                $this->technoRecolteEau = $this->initDataJoueur($objetJoueur['tech_recolte_eau']);
                $this->technoRecolteNourriture= $this->initDataJoueur($objetJoueur['tech_recolte_nourriture']);
                $this->technoRecolteCire = $this->initDataJoueur($objetJoueur['tech_recolte_cire']);
                $this->ouvriereBoisPlaine = $this->initDataJoueur($objetJoueur['ouvriere_bois_plaine']);
                $this->ouvriereBoisMarecage = $this->initDataJoueur($objetJoueur['ouvriere_bois_marecage']);
                $this->ouvriereBoisForet = $this->initDataJoueur($objetJoueur['ouvriere_bois_foret']);
                $this->ouvriereCire = $this->initDataJoueur($objetJoueur['ouvriere_cire']);
                $this->ouvriereArgilePlaine = $this->initDataJoueur($objetJoueur['ouvriere_argile_plaine']);
                $this->ouvriereArgileForet = $this->initDataJoueur($objetJoueur['ouvriere_argile_foret']);
                $this->ouvriereArgileMarecage = $this->initDataJoueur($objetJoueur['ouvriere_argile_marecage']);
                $this->ouvriereEauPlaine = $this->initDataJoueur($objetJoueur['ouvriere_eau_plaine']);
                $this->ouvriereEauForet = $this->initDataJoueur($objetJoueur['ouvriere_eau_foret']);
                $this->ouvriereEauMarecage = $this->initDataJoueur($objetJoueur['ouvriere_eau_marecage']);
                $this->ouvriereNourriturePlaine = $this->initDataJoueur($objetJoueur['ouvriere_nourriture_plaine']);
                $this->ouvriereNourritureForet = $this->initDataJoueur($objetJoueur['ouvriere_nourriture_foret']);
                $this->ouvriereNourritureMarecage = $this->initDataJoueur($objetJoueur['ouvriere_nourriture_marecage']);
                $this->boisTotal = $this->initDataJoueur($objetJoueur['bois_total']);
                $this->argileTotal = $this->initDataJoueur($objetJoueur['argile_total']);
                $this->eauTotal = $this->initDataJoueur($objetJoueur['eau_total']);
                $this->nourritureTotal = $this->initDataJoueur($objetJoueur['nourriture_total']);
                $this->cireTotal = $this->initDataJoueur($objetJoueur['cire_total']);
                $this->idJoueur = $this->initDataJoueur($objetJoueur['id_joueur']);
        }

        private function initDataJoueur(int $data){
                if($data >= 0 ){
                        $dataValid = $data;
                }
                else{
                       $dataValid = 0; 
                }

                return $dataValid;
        }



        public function incrementeRessource(){

                $prodCire = ((1 + ($this->technoRecolteCire/100)) * RESSOURCE_CIRE_BASE ) * $this->ouvriereCire ;
                $this->cireTotal = ceil($prodCire + $this->cireTotal);

		
                $prodBoisPlaine =  ((1 + ($this->technoRecolteBois/100)) * RESSOURCE_BOIS_BASE) * COEF_BOIS_PLAINE * $this->ouvriereBoisPlaine;
		$prodBoisForet =  ((1 + ($this->technoRecolteBois/100)) * RESSOURCE_BOIS_BASE) * COEF_BOIS_FORET * $this->ouvriereBoisMarecage;
		$prodBoisMarecage =  ((1 + ($this->technoRecolteBois/100)) * RESSOURCE_BOIS_BASE) * COEF_BOIS_MARECAGE * $this->ouvriereBoisForet;
				
                $this->boisTotal = ceil($prodBoisPlaine + $prodBoisForet + $prodBoisMarecage + $this->boisTotal);


		$prodArgilePlaine =  ((1 + ($this->technoRecolteArgile/100)) * RESSOURCE_ARGILE_BASE) * COEF_ARGILE_PLAINE * $this->ouvriereArgilePlaine;
		$prodArgileForet =  ((1 + ($this->technoRecolteArgile/100)) * RESSOURCE_ARGILE_BASE) * COEF_ARGILE_FORET * $this->ouvriereArgileForet;
		$prodArgileMarecage =  ((1 + ($this->technoRecolteArgile/100)) * RESSOURCE_ARGILE_BASE) * COEF_ARGILE_MARECAGE * $this->ouvriereArgileMarecage;
			
                $this->argileTotal = ceil($prodArgilePlaine + $prodArgileForet + $prodArgileMarecage + $this->argileTotal);


		$prodEauPlaine =  ((1 + ($this->technoRecolteEau/100)) * RESSOURCE_EAU_BASE) * COEF_EAU_PLAINE * $this->ouvriereEauPlaine;
		$prodEauForet =  ((1 + ($this->technoRecolteEau/100)) * RESSOURCE_EAU_BASE) * COEF_EAU_FORET * $this->ouvriereEauForet;
		$prodEauMarecage=  ((1 + ($this->technoRecolteEau/100)) * RESSOURCE_EAU_BASE) * COEF_EAU_MARECAGE * $this->ouvriereEauMarecage;
			
                $this->eauTotal =  ceil($prodEauPlaine + $prodEauForet + $prodEauMarecage + $this->eauTotal);


		$prodNourriturePlaine =  ((1 + ($this->technoRecolteNourriture/100)) * RESSOURCE_NOURRITURE_BASE) * COEF_NOURRITURE_PLAINE * $this->ouvriereNourriturePlaine;
		$prodNourritureForet =  ((1 + ($this->technoRecolteNourriture/100)) * RESSOURCE_NOURRITURE_BASE) * COEF_NOURRITURE_FORET * $this->ouvriereNourritureForet;
		$prodNourritureMarecage =  ((1 + ($this->technoRecolteNourriture/100)) * RESSOURCE_NOURRITURE_BASE) * COEF_NOURRITURE_MARECAGE * $this->ouvriereNourritureMarecage;

                $this->nourritureTotal = ceil($prodNourriturePlaine + $prodNourritureForet + $prodNourritureMarecage + $this->nourritureTotal);

                $bdd =  BddManager::getBdd();

                $reqUpRessource = $bdd->prepare('UPDATE ressource SET cire_total =:cire_total , bois_total =:bois_total , argile_total=:argile_total , eau_total =:eau_total , nourriture_total=:nourriture_total WHERE id_joueur = :id_joueur');
                $reqUpRessource ->execute(array(
                'bois_total' => $this->boisTotal,
                'argile_total' => $this->argileTotal ,
                'eau_total' => $this->eauTotal,
                'cire_total'=>$this->cireTotal,
                'nourriture_total' => $this->nourritureTotal,
                'id_joueur' => $this->idJoueur
                ));

                $reqUpRessource ->closeCursor();

        }

        /**
         * Get the value of technoRecolteBois
         */ 
        public function getTechnoRecolteBois()
        {
                return $this->technoRecolteBois;
        }

        /**
         * Set the value of technoRecolteBois
         *
         * @return  self
         */ 
        public function setTechnoRecolteBois($technoRecolteBois)
        {
                $this->technoRecolteBois = $technoRecolteBois;

                return $this;
        }

        /**
         * Get the value of technoRecolteArgile
         */ 
        public function getTechnoRecolteArgile()
        {
                return $this->technoRecolteArgile;
        }

        /**
         * Set the value of technoRecolteArgile
         *
         * @return  self
         */ 
        public function setTechnoRecolteArgile($technoRecolteArgile)
        {
                $this->technoRecolteArgile = $technoRecolteArgile;
                
                return $this;
        }

        /**
         * Get the value of technoRecolteEau
         */ 
        public function getTechnoRecolteEau()
        {
                return $this->technoRecolteEau;
        }

        /**
         * Set the value of technoRecolteEau
         *
         * @return  self
         */ 
        public function setTechnoRecolteEau($technoRecolteEau)
        {
                $this->technoRecolteEau = $technoRecolteEau;
                
                return $this;
        }

        /**
         * Get the value of technoRecolteNourriture
         */ 
        public function getTechnoRecolteNourriture()
        {
                return $this->technoRecolteNourriture;
        }

        /**
         * Set the value of technoRecolteNourriture
         *
         * @return  self
         */ 
        public function setTechnoRecolteNourriture($technoRecolteNourriture)
        {
                $this->technoRecolteNourriture = $technoRecolteNourriture;

                return $this;
        }


        /**
         * Get the value of technoRecolteCire
         */ 
        public function getTechnoRecolteCire()
        {
                return $this->technoRecolteCire;
        }

        /**
         * Set the value of technoRecolteCire
         *
         * @return  self
         */ 
        public function setTechnoRecolteCire($technoRecolteCire)
        {
                $this->technoRecolteCire = $technoRecolteCire;

                return $this;
        }


        /**
         * Get the value of ouvriereNourritureMarecage
         */ 
        public function getOuvriereNourritureMarecage()
        {
                return $this->ouvriereNourritureMarecage;
        }

        /**
         * Set the value of ouvriereNourritureMarecage
         *
         * @return  self
         */ 
        public function setOuvriereNourritureMarecage($ouvriereNourritureMarecage)
        {
                $this->ouvriereNourritureMarecage = $ouvriereNourritureMarecage;

                return $this;
        }

        /**
         * Get the value of ouvriereNourritureForet
         */ 
        public function getOuvriereNourritureForet()
        {
                return $this->ouvriereNourritureForet;
        }

        /**
         * Set the value of ouvriereNourritureForet
         *
         * @return  self
         */ 
        public function setOuvriereNourritureForet($ouvriereNourritureForet)
        {
                $this->ouvriereNourritureForet = $ouvriereNourritureForet;

                return $this;
        }

        /**
         * Get the value of ouvriereNourriturePlaine
         */ 
        public function getOuvriereNourriturePlaine()
        {
                return $this->ouvriereNourriturePlaine;
        }

        /**
         * Set the value of ouvriereNourriturePlaine
         *
         * @return  self
         */ 
        public function setOuvriereNourriturePlaine($ouvriereNourriturePlaine)
        {
                $this->ouvriereNourriturePlaine = $ouvriereNourriturePlaine;

                return $this;
        }

        /**
         * Get the value of ouvriereEauMarecage
         */ 
        public function getOuvriereEauMarecage()
        {
                return $this->ouvriereEauMarecage;
        }

        /**
         * Set the value of ouvriereEauMarecage
         *
         * @return  self
         */ 
        public function setOuvriereEauMarecage($ouvriereEauMarecage)
        {
                $this->ouvriereEauMarecage = $ouvriereEauMarecage;

                return $this;
        }

        /**
         * Get the value of ouvriereEauForet
         */ 
        public function getOuvriereEauForet()
        {
                return $this->ouvriereEauForet;
        }

        /**
         * Set the value of ouvriereEauForet
         *
         * @return  self
         */ 
        public function setOuvriereEauForet($ouvriereEauForet)
        {
                $this->ouvriereEauForet = $ouvriereEauForet;

                return $this;
        }

        /**
         * Get the value of ouvriereEauPlaine
         */ 
        public function getOuvriereEauPlaine()
        {
                return $this->ouvriereEauPlaine;
        }

        /**
         * Set the value of ouvriereEauPlaine
         *
         * @return  self
         */ 
        public function setOuvriereEauPlaine($ouvriereEauPlaine)
        {
                $this->ouvriereEauPlaine = $ouvriereEauPlaine;

                return $this;
        }

        /**
         * Get the value of ouvriereEau
         */ 
        public function getOuvriereEau()
        {
                return $this->ouvriereEauForet;
        }

        /**
         * Get the value of ouvriereArgileMarecage
         */ 
        public function getOuvriereArgileMarecage()
        {
                return $this->ouvriereArgileMarecage;
        }

        /**
         * Set the value of ouvriereArgileMarecage
         *
         * @return  self
         */ 
        public function setOuvriereArgileMarecage($ouvriereArgileMarecage)
        {
                $this->ouvriereArgileMarecage = $ouvriereArgileMarecage;

                return $this;
        }

        /**
         * Get the value of ouvriereArgileForet
         */ 
        public function getOuvriereArgileForet()
        {
                return $this->ouvriereArgileForet;
        }

        /**
         * Set the value of ouvriereArgileForet
         *
         * @return  self
         */ 
        public function setOuvriereArgileForet($ouvriereArgileForet)
        {
                $this->ouvriereArgileForet = $ouvriereArgileForet;

                return $this;
        }

        /**
         * Get the value of ouvriereArgilePlaine
         */ 
        public function getOuvriereArgilePlaine()
        {
                return $this->ouvriereArgilePlaine;
        }

        /**
         * Set the value of ouvriereArgilePlaine
         *
         * @return  self
         */ 
        public function setOuvriereArgilePlaine($ouvriereArgilePlaine)
        {
                $this->ouvriereArgilePlaine = $ouvriereArgilePlaine;

                return $this;
        }

        /**
         * Get the value of ouvriereCire
         */ 
        public function getOuvriereCire()
        {
                return $this->ouvriereCire;
        }

        /**
         * Set the value of ouvriereCire
         *
         * @return  self
         */ 
        public function setOuvriereCire($ouvriereCire)
        {
                $this->ouvriereCire = $ouvriereCire;

                return $this;
        }

        /**
         * Get the value of ouvriereBoisForet
         */ 
        public function getOuvriereBoisForet()
        {
                return $this->ouvriereBoisForet;
        }

        /**
         * Set the value of ouvriereBoisForet
         *
         * @return  self
         */ 
        public function setOuvriereBoisForet($ouvriereBoisForet)
        {
                $this->ouvriereBoisForet = $ouvriereBoisForet;

                return $this;
        }

        /**
         * Get the value of ouvriereBoisMarecage
         */ 
        public function getOuvriereBoisMarecage()
        {
                return $this->ouvriereBoisMarecage;
        }

        /**
         * Set the value of ouvriereBoisMarecage
         *
         * @return  self
         */ 
        public function setOuvriereBoisMarecage($ouvriereBoisMarecage)
        {
                $this->ouvriereBoisMarecage = $ouvriereBoisMarecage;

                return $this;
        }

        /**
         * Get the value of ouvriereBoisPlaine
         */ 
        public function getOuvriereBoisPlaine()
        {
                return $this->ouvriereBoisPlaine;
        }

        /**
         * Set the value of ouvriereBoisPlaine
         *
         * @return  self
         */ 
        public function setOuvriereBoisPlaine($ouvriereBoisPlaine)
        {
                $this->ouvriereBoisPlaine = $ouvriereBoisPlaine;

                return $this;
        }

        /**
         * Get the value of boisTotal
         */ 
        public function getBoisTotal()
        {
                return $this->boisTotal;
        }

        /**
         * Set the value of boisTotal
         *
         * @return  self
         */ 
        public function setBoisTotal($boisTotal)
        {
                $this->boisTotal = $boisTotal;

                return $this;
        }

        /**
         * Get the value of argileTotal
         */ 
        public function getArgileTotal()
        {
                return $this->argileTotal;
        }

        /**
         * Set the value of argileTotal
         *
         * @return  self
         */ 
        public function setArgileTotal($argileTotal)
        {
                $this->argileTotal = $argileTotal;

                return $this;
        }

        /**
         * Get the value of eauTotal
         */ 
        public function getEauTotal()
        {
                return $this->eauTotal;
        }

        /**
         * Set the value of eauTotal
         *
         * @return  self
         */ 
        public function setEauTotal($eauTotal)
        {
                $this->eauTotal = $eauTotal;

                return $this;
        }

        /**
         * Get the value of nourritureTotal
         */ 
        public function getNourritureTotal()
        {
                return $this->nourritureTotal;
        }

        /**
         * Set the value of nourritureTotal
         *
         * @return  self
         */ 
        public function setNourritureTotal($nourritureTotal)
        {
                $this->nourritureTotal = $nourritureTotal;

                return $this;
        }

        /**
         * Get the value of cireTotal
         */ 
        public function getCireTotal()
        {
                return $this->cireTotal;
        }

        /**
         * Set the value of cireTotal
         *
         * @return  self
         */ 
        public function setCireTotal($cireTotal)
        {
                $this->cireTotal = $cireTotal;

                return $this;
        }

        /**
         * Get the value of idJoueur
         */ 
        public function getIdJoueur()
        {
                return $this->idJoueur;
        }

        /**
         * Set the value of idJoueur
         *
         * @return  self
         */ 
        public function setIdJoueur($idJoueur)
        {
                $this->idJoueur = $idJoueur;

                return $this;
        }
}



