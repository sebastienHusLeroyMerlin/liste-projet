<?php

    namespace  controleur ;

    use controleur\ControleurGeneral;
//require_once ('ControleurGeneral.php');

    class ReineControleur extends ControleurGeneral{

        public function __construct($localisationCible)
        {
            parent::__construct($localisationCible);
        }

        public function chargerVue(string $vue){
            $localisation = 'reine' ;

            require('../modele/traitementAffichageInformation.php');

            $section = 'sectionReine';
            require_once('../vue/template/skeleton.php');
        }

    }

?>
