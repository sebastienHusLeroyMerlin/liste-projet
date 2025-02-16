<?php

    //require_once ('BddManager.php');

    class DiviniteManager{

        public static function getInfosDivinite($idRace){

            $bdd = BddManager::getBdd();

            $reqListInfoDivinite =  $bdd->prepare("SELECT nom, description FROM divinite 
            WHERE id_race = :idRace ");
            $reqListInfoDivinite->execute(array(
                'idRace' => $idRace
            ));
    
            $listInfoDivinite = $reqListInfoDivinite->fetch();

            $reqListInfoDivinite->closeCursor();
            
            unset($bdd);

            // Mise en Majuscule de la premiere lettre
            $listInfoDivinite['nom'] = ucfirst($listInfoDivinite['nom']);
            
            return $listInfoDivinite;
        }

        public static function getStatDivinite(){

        }

    }

