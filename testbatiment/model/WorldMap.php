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
            $reqGetInfoWorldMap = $bdd->prepare('UPDATE world_map SET id_player = :idPlayer, id_biome = :idBiome WHERE  x_pos = :XXXX and y_pos = :YYYY');
            $reqGetInfoWorldMap->execute(array(
                'idPlayer' => $idPlayer, 
                'idBiome'=> $idBiome,
                'XXXX'=> $x,
                'YYYY'=> $y
            ));

            $reqGetInfoWorldMap->closeCursor();

        }

        private static function updateTile(){

        }

        PUBLIC static function createTile($xCoordinate, $yCoordinate){
            //$idBiome = rand(1,4); aquoi cela servira t ' il definir les especes qui vivent dessus 
            
            $idClimat = rand(1,5);
            switch ($idClimat) {
                case 1:
                    $result = 1 ;
                    break;

                case 2:
                case 3:
                    $result = 2 ;
                    break;

                
                default:
                $result = 3 ;
                    break;
            }
            $idRelief = $result;

            switch ($idClimat . $idRelief) {
                case 11:
                    $resultIdHumidite = rand(1,4) ;
                    break;

                case 22:
                    $resultIdHumidite = rand(1,5) ;
                    break;

                case 32:
                    $resultIdHumidite = rand(1,6) ;
                    break;

                case 43:
                    $resultIdHumidite = rand(1,7) ;
                    break;

                case 53:
                    $resultIdHumidite = rand(1,8) ;
                    break;

                
                default:
                    var_dump("PB INIT BIOME") ;
                    break;
            }
            $idHumidite = $resultIdHumidite;

            // je concatene pour definitBiomeForTileinir le biome 
            $concatIdForBiome = $idClimat . $idRelief . $idHumidite ;
            $idBiome = self::initBiomeForTile($concatIdForBiome);
            var_dump($idBiome);
            $listParamsForCreateTile = array( 
                ID_CLIM => $idClimat, 
                ID_RELIEF => $idRelief, 
                ID_HUM => $idHumidite, 
                ID_BIOME => $idBiome
            );
            var_dump($listParamsForCreateTile);
            //J'enregistre la tuile en bdd
            self::insertTile($listParamsForCreateTile, $xCoordinate, $yCoordinate);
            
        }

        private static function insertTile($arrayParamsForCreateTile, $xPos, $yPos){

            $idBiome = $arrayParamsForCreateTile[ID_BIOME];
            $idHumidite = $arrayParamsForCreateTile[ID_HUM];
            $idClimat = $arrayParamsForCreateTile[ID_CLIM];
            $idRelief = $arrayParamsForCreateTile[ID_RELIEF];
            //var_dump("---" . $idClimat);
            $bdd = Bdd::getBdd();
            //todo revoir la requete + nom requete ect 
            $reqInsertTileToWorldMap = $bdd->prepare('INSERT INTO world_map  (' . ID_BIOME . ',' . ID_HUM . ',' . ID_CLIM . ',' . ID_RELIEF . ',' . X_POS . ',' . Y_POS . ')
                                                        VALUES (:idBiome, :idHumidite, :idClimat, :idRelief, :xPos, :yPos)');
            $reqInsertTileToWorldMap->execute(array(
                'idBiome'=> $idBiome,
                'idHumidite' => $idHumidite,
                'idClimat'=> $idClimat,
                'idRelief' => $idRelief, 
                'xPos'=> $xPos,
                'yPos'=> $yPos   
            ));

            $reqInsertTileToWorldMap->closeCursor();
        }

        public static function defineBiomeForPlayer($idPlayer){
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
                case 6:
                    $idBiome = 6 ;
                    break;
                case 7:
                    $idBiome = 7 ;
                    break;
                case 8:
                    $idBiome = 8 ;
                    break;
                case 9:
                    $idBiome = 9 ;
                    break;
                case 10:
                    $idBiome = 10 ;
                    break;            
            

                return $idBiome;
            }
        }

        public static function showWorldMap(){
            return ;
        }

        private static function initBiomeForTile($idBiome){

            var_dump($idBiome);

            switch ($idBiome) {
                case '225':
                case '326':
                case '437':
                case '538':
                    $result = 1 ; // Desert
                    break;
                
                case '114':
                case '113':
                case '112':
                case '111':
                    $result = 2 ; // Toundras.
                    break;

                case '222':
                case '322':
                case '432':
                case '532':
                    $result = 3 ; // Forêt Humide
                    break;
                
                case '223':
                case '323':
                case '433':
                case '533':
                    $result = 4 ; // Forêt Tempérée
                    break;

                case '436':
                case '325':
                case '224':
                    $result = 5 ; // Macquis sec
                    break;
                
                case '324':
                    $result = 6 ; // Steppe.
                    break;

                case '434':
                case '534':
                case '535':
                    $result = 7 ; // Forêt Sèche
                    break;
                
                case '537':
                case '536':
                case '435':
                    $result = 8 ; // Macquis
                break;

                case '431':
                case '531':
                    $result = 9 ; // Forêt Tropicale
                    break;
                
                case '221':
                case '321':
                    $result = 10 ; // Forêt pluviale
                break;

                default:
                    var_dump("PB D INITIALISATION DE BIOME");
                    break;

            }

            return $result;

        }

        /*public static function coordinateInit($coordinateToInit){

            if(!isset($coordinateToInit))
                $result = 0 ; 
            else
                $result = $coordinateToInit;

            return $result;
        }*/
    }