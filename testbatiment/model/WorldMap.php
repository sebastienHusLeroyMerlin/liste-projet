<?php

    require_once('constante.php');
    require_once('Bdd.php');

    class WorldMap{

        public static function enlargeWorldMap(){

            //Je recupere les valeurs x_max et y_max
            $xMax = self::getInfoWorldMap(X_MAP);
            $yMax = self::getInfoWorldMap(Y_MAP);

            /*
                si $xmax et $ ymax sont a null la carte n'est pas definie
                    donc j'initialise les limites de la carte
                
                sinon la carte est definie
                    donc je l'agrandis
            */
            if(!isset($xMax) && !isset($yMax)){
                $xMax = X_BASE ;
                $yMax = Y_BASE ;

                //je mets à jour la bdd
                self::updateWorldMapInfos($xMax, X_MAP);
                self::updateWorldMapInfos($yMax, Y_MAP);

                //j'instancie chaque tuile de la carte
                self::createTile($xMax);
            }
            else {
                var_dump($xMax . " ----- " . $yMax);
    
                $xMax += X_BASE ;
                $yMax += Y_BASE ;
    
                //je mets à jour la bdd
                self::updateWorldMapInfos($xMax, X_MAP);
                self::updateWorldMapInfos($yMax, Y_MAP);
            }

        }

        private static function updateWorldMapInfos($value, $fieldName){

            $bdd = Bdd::getBdd();

            $reqUpdateInfosWorldMap = $bdd->prepare('UPDATE infos_map SET valeur = :valeur WHERE nom_champ = :nomChamp');
            $reqUpdateInfosWorldMap->execute(array(
               'nomChamp' => $fieldName,
               'valeur' => $value
            ));

            $reqUpdateInfosWorldMap->closeCursor();
            
        }

        public static function getInfoWorldMap($fieldName){

            $bdd = Bdd::getBdd();

            $reqGetInfoWorldMap = $bdd->prepare('SELECT valeur FROM infos_map WHERE nom_champ = :nom_champ ');
            $reqGetInfoWorldMap->execute(array(
            'nom_champ' => $fieldName
            ));
                
            $resultReq = $reqGetInfoWorldMap->fetch();

            $reqGetInfoWorldMap->closeCursor();

            return $resultReq[0];

        }

        public static function insertPlayer(){

            $nbEmptyBox = rand(1,4);

            // je recupere la position en x du dernier inscrit
            $xLastPlayer = WorldMap::getInfoWorldMap(X_LAST_PLAYER);

            /*
                SI $xLastPlayer n'est pas definis
                aucun joueur n'existe la carte n'existe pas non plus
                J'instancie la carte
            */
            if(!isset($xLastPlayer)){
                //J'instancie la carte
                WorldMap::enlargeWorldMap();
    
                //J'insere mon joueur sur la carte
                
            }
        }

        private static function createTile($nbTile){

            $bdd = Bdd::getBdd();

            for ($i=1; $i <= $nbTile; $i++) { 

                //j'indique la position x
                $x = //TODO trouver comment definir x 
                //j'indique la position y
             
            }

            $reqGetInfoWorldMap = $bdd->prepare('SELECT valeur FROM infos_map WHERE nom_champ = :nom_champ ');
            $reqGetInfoWorldMap->execute(array(
            'nom_champ' => $fieldName
            ));
                
            $resultReq = $reqGetInfoWorldMap->fetch();

            $reqGetInfoWorldMap->closeCursor();
        }
    }