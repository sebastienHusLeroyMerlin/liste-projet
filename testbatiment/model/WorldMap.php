<?php

    require_once('constante.php');
    require_once('User.php');
    require_once('Bdd.php');

    class WorldMap{

        public static function createWorldMap(){
            /*
                Pour créer la carte j'ai besoin:
                    - de definir :
                            - xLimitWorldMap, yLimitWorldMap
                            - xLastPlayer, yLastPlayer
                            - xLastLimitWorldMap, yLastLimitWorldMap TODO: a confirmer si confirmer a implementer ici
                    - de créer chaque tuile de la carte
            */
            $xLimitWorldMap = X_BASE;
            $yLimitWorldMap = Y_BASE;
            $xLastLimitWorldMap = X_BASE;
            $yLastLimitWorldMap = Y_BASE;

            //Creation des tuiles
            for ($y=0; $y < $yLimitWorldMap; $y++) { 
                for ($x=0; $x < $xLimitWorldMap; $x++) { 
                    
                    self::createTile($x, $y);

                }
            }
        }

        private static function enlargeWorldMap(){
//TODO A REVOIR
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

        public static function updateWorldMapInfos($value, $fieldName){

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

        public static function insertPlayerToWorldMap($idPlayer){
            /* note le premier joueur se trouve forcement sur la premiere ligne
            donc y = 0 et x = $nbEmptyBox
            donc je recupere le x_max et j ajoute le nbEmpty et je trouve x*/
            // besoin du $nbEmptyBox
            // besoin de lid du joueur 
            // besoin de la race du joueur car determine biome de depart
            // besoin de la position en x et y = 0 du joueur
            $nbEmptyBox = rand(1,4);

            //je recupere le x_limit_world_map
            $xLimitWorldMap = WorldMap::getInfoWorldMap(X_MAX_MAP);

            //requete recup infos dujoueur grace a l 
            $idRace = User::getPlayerRace($idPlayer);
            $listParamsBiomeForPlayer = WorldMap::defineParamsBiomeForPlayer($idRace);

            $y = 0 ;
            $x = $nbEmptyBox + $xLimitWorldMap ;

            if($x > $xLimitWorldMap){
                var_dump("je suis sup a x limit world map");
                //declenche la enlarge fct
                //self::enlargeWorldMap();
            }

            /*self::updateTileToIntegratePlayer($x, $y, $listParamsBiomeForPlayer, $idPlayer);

            self::updateWorldMapInfos($x, X_LAST_PLAYER);
            self::updateWorldMapInfos($y, Y_LAST_PLAYER);*/

        }

        private static function updateTileToIntegratePlayer($xPos, $yPos, $listParamsBiomeForPlayer, $idPlayer){

            $idBiome = $listParamsBiomeForPlayer[ID_BIOME];
            $idHumidity = $listParamsBiomeForPlayer[ID_HUM];
            $idClimat = $listParamsBiomeForPlayer[ID_CLIM];
            $idRelief = $listParamsBiomeForPlayer[ID_RELIEF];

            $bdd = Bdd::getBdd();

            $reqUpdateTile = $bdd->prepare('UPDATE world_map' . ID_BIOME . ',' . ID_HUM . ',' . ID_CLIM . ',' . ID_RELIEF . ',' . X_POS . ',' . Y_POS . ' 
                                            SET ' . ID_BIOME . ' = :idBiome, 
                                            ' . ID_HUM . ' = :idHumidity, 
                                            ' . ID_CLIM . ' = :idClimat, 
                                            ' . ID_RELIEF . ' = :idRelief, 
                                            ' . X_POS . ' = :xPos, 
                                            ' . Y_POS . ' = :yPos WHERE id_player = :idPlayer ');
            $reqUpdateTile->execute(array(
                'idBiome'=> $idBiome,
                'idHumidity' => $idHumidity,
                'idClimat'=> $idClimat,
                'idRelief' => $idRelief, 
                'xPos'=> $xPos,
                'yPos'=> $yPos,
                'idPlayer' => $idPlayer
            ));

            $reqUpdateTile->closeCursor();
        }

        private static function createTile($xCoordinate, $yCoordinate){
            //$idBiome = rand(1,4); aquoi cela servira t ' il definir les especes qui vivent dessus 
            
            $listParamsBiomeForTile = self::generateBiomeWithListParams(true);

            //J'enregistre la tuile en bdd
            self::insertTile($listParamsBiomeForTile, $xCoordinate, $yCoordinate);
            
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

        private static function insertTile($arrayParamsForCreateTile, $xPos, $yPos){

            $idBiome = $arrayParamsForCreateTile[ID_BIOME];
            $idHumidity = $arrayParamsForCreateTile[ID_HUM];
            $idClimat = $arrayParamsForCreateTile[ID_CLIM];
            $idRelief = $arrayParamsForCreateTile[ID_RELIEF];
            //var_dump("---" . $idClimat);
            $bdd = Bdd::getBdd();
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

            switch ($idRace) {
                case 1;//arraignées -- Forêt Humide
                    $idClimat = rand(2,5);

                    if($idClimat = 2 || $idClimat = 3 )
                        $idRelief = 2;
                    else
                        $idRelief = 3;
                
                    $idHumidity = 2;
                    $idBiome = 3;
                    break;

                case 2;//fourmis -- Forêt temperée
                    $idClimat = rand(2,5);

                    if($idClimat = 2 || $idClimat = 3 )
                        $idRelief = 2;
                    else
                        $idRelief = 3;

                    $idHumidity = 3;
                    $idBiome = 4;
                    break;

                case 3;//abeille -- Macquis
                    $idClimat = rand(4,5);

                    $idRelief = 3;

                    $idHumidity =  rand(5,7);
                    $idBiome = 8;
                    break;

                case 4;//termite -- Forêt Tropicale

                    $idClimat = rand(4,5);

                    $idRelief = 3;

                    $idHumidity = 1;
                    $idBiome = 9;
                    break;

                case 5;//frelon -- Forêt Sèche

                    $idClimat = rand(4,5);

                    $idRelief = 3;

                    $idHumidity = $idClimat = rand(4,5);
                    $idBiome = 7;
                    break;

                $listParamsBiome = self::generateListParamsBiome($idClimat, $idRelief, $idHumidity, $idBiome);

                
                return $listParamsBiome;
                        
            }

        }

        public static function showWorldMap(){
            return ;
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

        /*public static function coordinateInit($coordinateToInit){

            if(!isset($coordinateToInit))
                $result = 0 ; 
            else
                $result = $coordinateToInit;

            return $result;
        }*/
    }