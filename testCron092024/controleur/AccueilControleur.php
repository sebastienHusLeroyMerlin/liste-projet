<?php

    namespace testCron\controleur;
	//session_start();

    //use testCron\controleur\ControleurGeneral;

    //class AccueilControleur extends ControleurGeneral {

//        unset($_SESSION['boisCouveuse'] );
//        unset($_SESSION['cireCouveuse']);
//        unset($_SESSION['eauCouveuse']);
//        unset($_SESSION['typeRessource']);
//
//        $_SESSION['typeRessource'] = 'rien';
//
//        $_SESSION['race'] = 'abeille' ;
//        $_SESSION['niveau'] = 15;// niveau de quoi ?

         $localisation = 'accueil' ;


        require('../modele/traitementAffichageInformation.php');

        $section = 'sectionBatiment';
        require_once('../vue/template/skeleton.php');
    //}
	


?>