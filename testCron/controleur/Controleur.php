<?php

abstract class Controleur {

    //unset($_SESSION['boisCouveuse'] );
	//unset($_SESSION['cireCouveuse']);
	//unset($_SESSION['eauCouveuse']);
	//unset($_SESSION['typeRessource']);

	//$_SESSION['typeRessource'] = 'rien';
	//$_SESSION['race'] = 'abeille' ;
	//$_SESSION['niveau'] = 15;// niveau de quoi ? 
    protected $localisation;
    protected $section;

    public function chargerModele(string $modele){

        /*
             1 - je cré un objet modele 
             qui transforme la premiere lettre en majuscule 
             du string modele souhaité
        */
        $objModele = ucfirst($modele);

        if ( substr($modele,-7) == 'Manager'){
            require("../modele/manager/$modele.php");
        }
        else{
            require("../modele/$modele.php");
        }

        // l' instance modele represente l'objet créé
        $instanceModele = new  $objModele();

        //$this->$instanceModele = new  $objModele();
        echo " dans load modele ";

        // je retourne l'instance pour pouvoir chainer des methodes
        return $instanceModele;

    }

    public function ChargerVue(string $vue){

        $localisation = $this->localisation;
        
        if(substr($vue, -8) == 'Template')
            require("../vue/template/$vue.php");
        else
            require("../vue/$vue.php");

        //$this->$vue = new $vue();

    }
	
	public function __construct($localisationCible){

        $this->localisation = $localisationCible;
        // commun a tout les controleurs
        $this->chargerModele('AffichageInformation');
        AffichageInformation::getInfoBatiment();// pas de retour pour le moment car tout stocker en session a revoir 


        //require('../modele/traitementAffichageInformation.php');
	    //require_once('../vue/template/skeleton.php');
        $this->ChargerVue('skeletonTemplate');
        echo "coucou dans le constructeur controleur appeler depuis ".$localisationCible;
    }

    //public static function getDestinationControleur(string $destination){
    //    require("../controleur/".$destination."Controleur.php");
    //
    //}

    //public abstract function getView();

	
	

}

?>