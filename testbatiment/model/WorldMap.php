<?php

    require_once('constante.php');
    require_once('Bdd.php');

    class WorldMap{

        $bdd = Bdd::getBdd();

        public static function initializeWorldMap(){
            
            $xMax = XBASE ;
            $yMax = YBASE ;

            //je mets à jour la bdd

        }

        public static function enlargeWorldMap($xMax, $yMax){
            $xMax += XBASE ;
            $yMax += YBASE ;
        }

        public static function getWorldMapInfos(){
            
            //recuperation des infos taille de la carte
            $stringXMax = 'x_max';
            $stringYMax = 'y_max';

            $reqSizeOfMap = $bdd->prepare('SELECT nom_champ, valeur FROM infos_map WHERE nom_champ in ( :nom_champ_1, :nom_champ_2 ) ');
            $reqSizeOfMap->execute(array(
            'nom_champ_1' => $stringXMax,
            'nom_champ_2' => $stringYMax
            ));
                
            $result = $reqSizeOfMap->fetchAll();

            $reqSizeOfMap->closeCursor();

            return $result;
        }

        private function updateWorldMapInfos(){
            
        }
    }