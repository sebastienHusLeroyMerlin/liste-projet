<?php

    require_once('../modele/constante.php');
    require_once('UserManager.php');
    require_once('BddManager.php');
    require_once('ColonieManager.php');

    class WorldMapManager{

        public static function createWorldMap(){
            /*
                Pour créer la carte j'ai besoin:
                    - de definir :
                            - xLimitWorldMap, yLimitWorldMap
                            - xLastPlayer, yLastPlayer
                            - xLastLimitWorldMap, yLastLimitWorldMap TODO: a confirmer si confirmer a implementer ici
                    - de créer chaque tuile de la carte
            */
            $xLimitWorldMap = X_BASE - 1;
            self::updateWorldMapInfos($xLimitWorldMap, X_MAX_MAP);

            $yLimitWorldMap = Y_BASE - 1;
            self::updateWorldMapInfos($yLimitWorldMap, Y_MAX_MAP);

            $xLastLimitWorldMap = -1;
            self::updateWorldMapInfos($xLastLimitWorldMap, X_LAST_MAX_MAP);

            $yLastLimitWorldMap = -1;
            self::updateWorldMapInfos($yLastLimitWorldMap, Y_LAST_MAX_MAP);

            //Creation des tuiles
            for ($y=0; $y < Y_BASE; $y++) { 
                for ($x=0; $x < X_BASE; $x++) { 
                    
                    self::createTile($x, $y);

                }
            }
        }

        private static function enlargeWorldMap(){
//TODO A REVOIR
            //Je recupere les valeurs x_max et y_max
            $xLimitWorldMap = self::getInfoWorldMap(X_MAX_MAP);
            $yLimitWorldMap = self::getInfoWorldMap(Y_MAX_MAP);

            //je mets a jour les last limite de la map avec le x et y max actuel ( avant qu ils ne soient changés)
            $xLastLimitWorldMap = $xLimitWorldMap;
            $yLastLimitWorldMap = $yLimitWorldMap;

                var_dump($xLimitWorldMap . " ----- " . $yLimitWorldMap);
            // j'ajoute la valeur de base (..._Base) au limite actuel pour agrandir la carte
            $xLimitWorldMap += X_BASE;
            $yLimitWorldMap += Y_BASE;

            var_dump($xLimitWorldMap . " ----- " . $yLimitWorldMap);
    
            //je mets à jour la bdd avec les nouvelles infos
            self::updateWorldMapInfos($xLimitWorldMap, X_MAX_MAP);
            self::updateWorldMapInfos($yLimitWorldMap, Y_MAX_MAP);

            self::updateWorldMapInfos($xLastLimitWorldMap, X_LAST_MAX_MAP);
            self::updateWorldMapInfos($yLastLimitWorldMap, Y_LAST_MAX_MAP);


            $yLastLimitWorldMap = self::getInfoWorldMap(X_LAST_MAX_MAP);
            $xLastLimitWorldMap = self::getInfoWorldMap(Y_LAST_MAX_MAP);

            var_dump($yLastLimitWorldMap . " ----- " . $xLastLimitWorldMap);
           
             //Creation des tuiles
            for ($y=0; $y <= $yLimitWorldMap; $y++) { 
                for ($x=0; $x <= $xLimitWorldMap; $x++) { 
                    
                    self::createTile($x, $y);

                }
            }

        }

        public static function updateWorldMapInfos($value, $fieldName){

            $bdd = BddManager::getBdd();

            $reqUpdateInfosWorldMap = $bdd->prepare('UPDATE infos_map SET valeur = :valeur WHERE nom_champ = :nomChamp');
            $reqUpdateInfosWorldMap->execute(array(
               'nomChamp' => $fieldName,
               'valeur' => $value
            ));

            $reqUpdateInfosWorldMap->closeCursor();
            
        }

        public static function getInfoWorldMap($fieldName){

            $bdd = BddManager::getBdd();

            $reqGetInfoWorldMap = $bdd->prepare('SELECT valeur FROM infos_map WHERE nom_champ = :nom_champ ');
            $reqGetInfoWorldMap->execute(array(
            'nom_champ' => $fieldName
            ));
                
            $resultReq = $reqGetInfoWorldMap->fetch();

            $reqGetInfoWorldMap->closeCursor();

            return $resultReq[0];

        }

        public static function insertPlayerToWorldMap($idPlayer){
            /* note le premier joueur se trouve forcement sur la premiere ligne
            donc y = 0 et x = $nbEmptyBox
            donc je recupere le x_max et j ajoute le nbEmpty et je trouve x*/
            // besoin du $nbEmptyBox
            // besoin de lid du joueur 
            // besoin de la race du joueur car determine biome de depart
            // besoin de la position en x et y = 0 du joueur
            $nbEmptyBox = rand(RAND_MIN_EMPTY_BOX,RAND_MAX_EMPTY_BOX);

            //je recupere le x_limit_world_map
            $xLimitWorldMap = self::getInfoWorldMap(X_MAX_MAP);
            $xLastPlayer = self::getInfoWorldMap(X_LAST_PLAYER);

            if(!isset($xLastPlayer)){
                $xLastPlayer = 0 ;
            }

            //requete recup infos du joueur grace a l id
            $idRace = UserManager::getIdRaceByIdPlayer($idPlayer);
            $listParamsBiomeForPlayer = self::defineParamsBiomeForPlayer($idRace);
            var_dump($listParamsBiomeForPlayer);

            $idColo = ColonieManager::getIdColoByIdPlayer($idPlayer);
            
            $ylastPlayer =  self::getInfoWorldMap(Y_LAST_PLAYER);
            var_dump("y las player" . $ylastPlayer);
            $yPos = $ylastPlayer ;

            if(!isset($ylastPlayer)){
                $yPos = 0 ;
                var_dump("y last player n existe pas");
            }
            
            $xPos = $nbEmptyBox + $xLastPlayer ;

            // si la position en x du nouveau joueur depasse la limite en x de la map
            if($xPos > $xLimitWorldMap){
                //je passe a la ligne superieur en y
                $yPos++;

                // je determine combien de cases vide il reste avant implantation du joueur
                $restNbEmptyBox = ($xLastPlayer - $xLimitWorldMap) + $nbEmptyBox ;

                var_dump("je suis sup a x limit world map");
                var_dump('x position : ' . $xPos . ' --- Yposition : ' . $yPos);
                //Si ma nouvelle ligne en y se trouve hors de la limite en y de la map
                if($yPos > $xLimitWorldMap){
                    var_dump('j agrandis la map');
                    //declenche la enlarge fct
                    self::enlargeWorldMap();

                    $xLastLimitWorldMap = self::getInfoWorldMap(X_LAST_MAX_MAP);
                    $yPos = 0;
                    //je defini les nouvelles coordonnées du joueur
                    $xPos = $xLastLimitWorldMap + $restNbEmptyBox ;
                    $yPos = 0;
                }
                else{
                    //si je suis dans la limite en y de la map
                    
                    $yLastLimitWorldMap = self::getInfoWorldMap(Y_LAST_MAX_MAP);

                    if($yPos <= $yLastLimitWorldMap){
                        $xLastLimitWorldMap = self::getInfoWorldMap(X_LAST_MAX_MAP);
                        $xPos = ($xLastLimitWorldMap -1 ) + $restNbEmptyBox ;
                        var_dump('il faut faire une action ici');
                    }
                    else{
    
                        $xPos = -1 + $restNbEmptyBox;
                    }
                   
                }
                
            }
var_dump( $idColo);
            self::updateTileToIntegratePlayer($xPos, $yPos, $listParamsBiomeForPlayer, $idPlayer, $idColo);

            self::updateWorldMapInfos($xPos, X_LAST_PLAYER);
            self::updateWorldMapInfos($yPos, Y_LAST_PLAYER);

        }

        private static function updateTileToIntegratePlayer($xPos, $yPos, $listParamsBiomeForPlayer, $idPlayer, $idColo){

            $idBiome = $listParamsBiomeForPlayer[ID_BIOME];
            $idHumidity = $listParamsBiomeForPlayer[ID_HUM];
            $idClimat = $listParamsBiomeForPlayer[ID_CLIM];
            $idRelief = $listParamsBiomeForPlayer[ID_RELIEF];
var_dump($listParamsBiomeForPlayer);
            $bdd = BddManager::getBdd();

            $reqUpdateTile = $bdd->prepare('UPDATE world_map  
                                            SET ' . ID_BIOME . ' = :idBiome, 
                                            ' . ID_HUM . ' = :idHumidity, 
                                            ' . ID_CLIM . ' = :idClimat, 
                                            ' . ID_RELIEF . ' = :idRelief, 
                                            ' . ID_PLAYER . ' = :idPlayer,
                                            ' . ID_COLO . ' = :idColo
                                             WHERE ' . Y_POS . ' = :yPos and ' . X_POS . ' = :xPos');
            $reqUpdateTile->execute(array(
                'idBiome'=> $idBiome,
                'idHumidity' => $idHumidity,
                'idClimat'=> $idClimat,
                'idRelief' => $idRelief, 
                'xPos'=> $xPos,
                'yPos'=> $yPos,
                'idPlayer' => $idPlayer,
                'idColo' => $idColo
            ));

            $reqUpdateTile->closeCursor();
        }

        private static function createTile($xPos, $yPos){
            //$idBiome = rand(1,4); aquoi cela servira t ' il definir les especes qui vivent dessus 
            
            //je verifie qu'une tuile n'existe pas deja
            $tileExisting = self::isTileExisting($xPos, $yPos);
            //var_dump("---" . $tileExisting);
            if(!isset($tileExisting)){

                $listParamsBiomeForTile = self::generateBiomeWithListParams(true);

                //J'enregistre la tuile en bdd
                self::insertTile($listParamsBiomeForTile, $xPos, $yPos);
            }
        }

        private static function defineHumidity($idClimat, $idRelief){
            switch ($idClimat . $idRelief) {
                case 11:
                    $resultIdHumidity = rand(1,4) ;
                    break;

                case 22:
                    $resultIdHumidity = rand(1,5) ;
                    break;

                case 32:
                    $resultIdHumidity = rand(1,6) ;
                    break;

                case 43:
                    $resultIdHumidity = rand(1,7) ;
                    break;

                case 53:
                    $resultIdHumidity = rand(1,8) ;
                    break;

                
                default:
                    var_dump("PB INIT BIOME") ;
                    break;
            }

            return $resultIdHumidity;
        }

        private static function defineRelief($idClimat){
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
            
            return $result;
        }

        private static function isTileExisting($xPos, $yPos){
            $bdd = BddManager::getBdd();
            //todo revoir la requete + nom requete ect 
            $reqGetTile = $bdd->prepare('SELECT id FROM  world_map  WHERE  ' . X_POS . ' = :xPos and ' . Y_POS . ' = :yPos');
            $reqGetTile->execute(array(
                'xPos' => $xPos,
                'yPos' => $yPos   
            ));

            $result = $reqGetTile->fetch();

            $reqGetTile->closeCursor();

            if($result[0])
                return $response = true;

        }

        private static function insertTile($arrayParamsForCreateTile, $xPos, $yPos){


            $idBiome = $arrayParamsForCreateTile[ID_BIOME];
            $idHumidity = $arrayParamsForCreateTile[ID_HUM];
            $idClimat = $arrayParamsForCreateTile[ID_CLIM];
            $idRelief = $arrayParamsForCreateTile[ID_RELIEF];
            //var_dump("---" . $idClimat);
            $bdd = BddManager::getBdd();
            //todo revoir la requete + nom requete ect 
            $reqInsertTileToWorldMap = $bdd->prepare('INSERT INTO world_map  (' . ID_BIOME . ',' . ID_HUM . ',' . ID_CLIM . ',' . ID_RELIEF . ',' . X_POS . ',' . Y_POS . ')
                                                        VALUES (:idBiome, :idHumidity, :idClimat, :idRelief, :xPos, :yPos)');
            $reqInsertTileToWorldMap->execute(array(
                'idBiome'=> $idBiome,
                'idHumidity' => $idHumidity,
                'idClimat'=> $idClimat,
                'idRelief' => $idRelief, 
                'xPos'=> $xPos,
                'yPos'=> $yPos   
            ));

            $reqInsertTileToWorldMap->closeCursor();
        }

        private static function generateParamsBiome(){
            $idClimat = rand(1,5);
            $idRelief = self::defineRelief($idClimat);
            $idHumidity =  self::defineHumidity($idClimat, $idRelief);
            
            $listParams = array( 
                ID_CLIM => $idClimat, 
                ID_RELIEF => $idRelief, 
                ID_HUM => $idHumidity
            );

            return $listParams;
           
        }

        /**
         * Remplir soit avec vrai soit avec une liste de parametres
         */

        private static function generateBiomeWithListParams($defineListParamsForBiome){

            if($defineListParamsForBiome){
                $listParams = self::generateParamsBiome();
            }

            $idHumidity = $listParams[ID_HUM];
            $idClimat = $listParams[ID_CLIM];
            $idRelief = $listParams[ID_RELIEF];

            $codeBiome = $idClimat . $idRelief . $idHumidity ;
            $idBiome = self::defineBiome($codeBiome);
            $listParamsBiome = self::generateListParamsBiome($idClimat, $idRelief, $idHumidity, $idBiome);

            return $listParamsBiome;
        }

        private static function generateListParamsBiome($idClimat, $idRelief, $idHumidity, $idBiome){
            $listParamsBiomeGenered = array( 
                ID_CLIM => $idClimat, 
                ID_RELIEF => $idRelief, 
                ID_HUM => $idHumidity, 
                ID_BIOME => $idBiome
            );

            return $listParamsBiomeGenered;
        }

        public static function defineParamsBiomeForPlayer($idRace){
            var_dump($idRace);
            switch ($idRace) {
                case 1://arraignées -- Forêt Humide
                    $idClimat = rand(2,5);

                    if($idClimat = 2 || $idClimat = 3 )
                        $idRelief = 2;
                    else
                        $idRelief = 3;
                
                    $idHumidity = 2;
                    $idBiome = 3;
                    break;

                case 2://fourmis -- Forêt temperée
                    $idClimat = rand(2,5);

                    if($idClimat = 2 || $idClimat = 3 )
                        $idRelief = 2;
                    else
                        $idRelief = 3;

                    $idHumidity = 3;
                    $idBiome = 4;
                    var_dump("ici id = 2 ");
                    var_dump($idBiome);
                    break;

                case 3://abeille -- Macquis
                    $idClimat = rand(4,5);

                    $idRelief = 3;

                    $idHumidity =  rand(5,7);
                    $idBiome = 8;
                    break;

                case 4://termite -- Forêt Tropicale

                    $idClimat = rand(4,5);

                    $idRelief = 3;

                    $idHumidity = 1;
                    $idBiome = 9;
                    break;

                case 5://frelon -- Forêt Sèche

                    $idClimat = rand(4,5);

                    $idRelief = 3;

                    $idHumidity = $idClimat = rand(4,5);
                    $idBiome = 7;
                    break;
                        
            }

            var_dump($idBiome);
                $listParamsBiome = self::generateListParamsBiome($idClimat, $idRelief, $idHumidity, $idBiome);

                var_dump($listParamsBiome);
                return $listParamsBiome;

        }

        public static function showWorldMap(){
            return ;
        }

        public static function initializeAxeIntervals($xColo, $yColo){

            $xArrayIntervals = WorldMapManager::determinevueInterval($xColo);
            $xIntervalMin = $xArrayIntervals['intervalMin'];
            $xIntervalMax = $xArrayIntervals['intervalMax'];
            
            echo ' <---                ---><br>';
            $yArrayIntervals = WorldMapManager::determinevueInterval($yColo);
            $yIntervalMin = $yArrayIntervals['intervalMin'];
            $yIntervalMax = $yArrayIntervals['intervalMax'];

            return array(
                'xIntervalMin' => $xIntervalMin,
                'xIntervalMax' => $xIntervalMax,
                'yIntervalMin' => $yIntervalMin,
                'yIntervalMax' => $yIntervalMax
            );
        }

        private static function determinevueInterval($coordinateColo){

            $xLimitWorldMap = self::getInfoWorldMap(X_MAX_MAP);
            //je recupere les case en amont et en avale de mon joueur
            $coordinateColoInterval = (X_VUE - 1) / 2;
            $coordinateColoIntervalMin = (int)$coordinateColo - $coordinateColoInterval;
            $coordinateColoIntervalMax = (int)$coordinateColo + $coordinateColoInterval;
        
            if($coordinateColoIntervalMax > $xLimitWorldMap){
                $coordinateColoIntervalMax = $coordinateColo - $xLimitWorldMap + $coordinateColoIntervalMin - 1;
            var_dump($coordinateColoIntervalMax . ' = ' . $coordinateColo . ' - ' . $xLimitWorldMap . ' + '  . $coordinateColoIntervalMin . ' - 1' ); 
            }
            elseif($coordinateColoIntervalMin < 0){
                $coordinateColoIntervalMin = ( $xLimitWorldMap + 1 ) + $coordinateColoIntervalMin;
                var_dump($coordinateColoIntervalMin);
            }

            return array('intervalMin' => $coordinateColoIntervalMin,
            'intervalMax' => $coordinateColoIntervalMax );
        }

        public static function getNameBiome($xPos, $yPos){
            $bdd = BddManager::getBdd();

							$reqGetTile = $bdd->prepare('SELECT b.name 
															FROM  world_map w 
															INNER JOIN biome b ON b.id = w.id_biome
															WHERE  w.' . X_POS . ' = :xPos and w.' . Y_POS . ' = :yPos');
							$reqGetTile->execute(array(
								'xPos' => $xPos,
								'yPos' => $yPos   
							));

							$classBiome = $reqGetTile->fetch();

							$reqGetTile->closeCursor();

                            return $classBiome[0];
        }

        private static function defineBiome($codeBiome){

            var_dump($codeBiome);

            switch ($codeBiome) {
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

        public static function getCoordinatesByIdColo($idColo){
            $Bdd =  BddManager::getBdd();
        
            $reqGetCoordinatesByIdColo = $Bdd->prepare('SELECT x_pos, y_pos FROM world_map WHERE id_colo = :idColo');
            $reqGetCoordinatesByIdColo->execute(array(
    
                'idColo' => $idColo
                
            ));
    
            $coordinate = $reqGetCoordinatesByIdColo->fetchAll();
            
            $reqGetCoordinatesByIdColo->closeCursor();
            
            unset($Bdd);

            return $coordinate;
        }
    }