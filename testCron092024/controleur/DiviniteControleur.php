<?php 

    require_once('ControleurGeneral.php');

    class DiviniteControleur extends Controleur {

        public function __construct($localisationCible)
        {
            parent::__construct($localisationCible);
        }

        public function chargerVue(string $vue){

            $localisation = 'divinite' ;

            //var_dump($_SESSION);

            $idRace = UserManager::getIdRaceByIdPlayer($_SESSION['id_joueur']);

            //$diviniteManager = parent::chargerModele('diviniteManager');
            ToolsManager::fileAutoLoading('divinite',TypeFile::Manager); //->getInfosDivinite($idRace);

            //$listInfosDivinite = $diviniteManager->getInfosDivinite($idRace);

            $_SESSION['godName']  = $listInfosDivinite['nom'];


            require_once('../vue/component/section/diviniteSection.php');
        }


    }
?>