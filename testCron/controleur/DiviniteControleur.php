<?php 

    require_once('Controleur.php');
    require_once('../modele/manager/UserManager.php');

    class DiviniteControleur extends Controleur {

        public function __construct($localisationCible)
        {
            parent::__construct($localisationCible);
        }

        public function chargerVue($idJoueur){
            

            $idRace = UserManager::getIdRaceByIdPlayer($idJoueur);

            $DiviniteManager = parent::chargerModele('diviniteManager');

            $listInfosDivinite = $DiviniteManager->getInfosDivinite($idRace);
            $godName = $listInfosDivinite['nom'];

            require_once('../vue/component/section/diviniteSection.php');
        }


    }
?>