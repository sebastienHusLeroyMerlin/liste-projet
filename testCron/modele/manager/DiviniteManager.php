<?php

    require('BddManager.php');

    class DiviniteManager{

        public static function getInfosDivinite($idRace){
            $bdd = BddManager::getBdd();

            $reqListInfoDivinite =  $bdd->prepare("SELECT 'nom', 'description' FROM divinite 
            WHERE id_race = :idRace ");
            $reqListInfoDivinite->execute(array(
                'idRace' => $idRace
            ));
    
            $listInfoDivinite = $reqListInfoDivinite->fetchAll();
        
            $reqListInfoDivinite->closeCursor();
            
            unset($bdd);
            
            return $listInfoDivinite;
        }

        public static function getStatDivinite(){

        }

    }

