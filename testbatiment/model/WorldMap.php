<?php

    require_once('constante.php');
    require_once('User.php');
    require_once('Bdd.php');

    class WorldMap{

        public static function enlargeWorldMap(){

            //Je recupere les valeurs x_max et y_max
            $xMax = self::getInfoWorldMap(X_MAX_MAP);
            $yMax = self::getInfoWorldMap(Y_MAX_MAP);

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
                self::updateWorldMapInfos($xMax, X_MAX_MAP);
                self::updateWorldMapInfos($yMax, Y_MAX_MAP);

                //j'instancie chaque tuile de la carte
                self::createTile($xMax);
            }
            else {
                var_dump($xMax . " ----- " . $yMax);
    
                $xMax += X_BASE ;
                $yMax += Y_BASE ;
    
                //je mets à jour la bdd
                self::updateWorldMapInfos($xMax, X_MAX_MAP);
                self::updateWorldMapInfos($yMax, Y_MAX_MAP);
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

        public static function insertPlayerToWorldMap($idPlayer, $x, $y, $idBiome){

            $bdd = Bdd::getBdd();

            //todo revoir la requete + nom requete ect 
            $reqGetInfoWorldMap = $bdd->prepare('UPDATE world_map SET id_player = :idPlayer, id_biome = :id_biome WHERE  x_pos = :XXXX and y_pos = :YYYY');
            $reqGetInfoWorldMap->execute(array(
                'idPlayer' => $idPlayer, 
                'id_biome'=> $idBiome,
                'XXXX'=> $x,
                'YYYY'=> $y
            ));

            $reqGetInfoWorldMap->closeCursor();

        }

        private static function updateTile(){

        }

        private static function createTile($idPlayer, $xCoordinate, $yCoordinate){
            $idBiome = rand(1,4);

            
        }

        private static function insertTile(/*prend un objet tuile */){
            $bdd = Bdd::getBdd();

            //todo revoir la requete + nom requete ect 
            $reqGetInfoWorldMap = $bdd->prepare('INSERT INTO ... VALUES nom_champ = :nom_champ ');
            $reqGetInfoWorldMap->execute(array(
            'nom_champ' => $fieldName
            ));
                
            $resultReq = $reqGetInfoWorldMap->fetch();

            $reqGetInfoWorldMap->closeCursor();
        }

        public static function defineBiome($idPlayer){
            $playerRace = User::getPlayerRace($idPlayer);

            switch ($playerRace) {
                case 1:
                    $idBiome = 1 ;
                    break;
                case 2:
                    $idBiome = 2 ;
                    break;
                case 3:
                    $idBiome = 3 ;
                    break;
                case 4:
                    $idBiome = 4 ;
                    break;
                case 5:
                    $idBiome = 5 ;
                    break;            
            }

            return $idBiome;
        }

        public static function showWorldMap(){

        }

        /*public static function coordinateInit($coordinateToInit){

            if(!isset($coordinateToInit))
                $result = 0 ; 
            else
                $result = $coordinateToInit;

            return $result;
        }*/
    }