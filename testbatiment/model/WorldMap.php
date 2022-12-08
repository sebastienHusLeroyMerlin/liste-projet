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

        PUBLIC static function createTile($xCoordinate, $yCoordinate){
            //$idBiome = rand(1,4); aquoi cela servira t ' il definir les especes qui vivent dessus 
            
            $idClimat = rand(1,5);
            $idRelief = rand(1,3);
            $idHumidite = rand(1,8);

            // je concatene pour definir le biome 
            $concatIdForBiome = $idClimat . $idRelief . $idHumidite ;
            $idBiome = self::initBiomeForTile($concatIdForBiome);

            $listParamsForCreateTile = array( $idClimat, $idRelief, $idHumidite, $idBiome);

            //J'enregistre la tuile en bdd
            self::insertTile($listParamsForCreateTile);
            
        }

        private static function insertTile($arrayParamsForCreateTile){
            $bdd = Bdd::getBdd();

            //todo revoir la requete + nom requete ect 
            $reqGetInfoWorldMap = $bdd->prepare('INSERT INTO world_map VALUES nom_champ = :nom_champ ');
            $reqGetInfoWorldMap->execute(array(
            'nom_champ' => $fieldName
            ));
                
            $resultReq = $reqGetInfoWorldMap->fetch();

            $reqGetInfoWorldMap->closeCursor();
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
            switch ($idBiome) {
                case '225':
                case '326':
                case '437':
                case '539':
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
                    var_dump("PB DEFINITION BIOME");//TODO :  remplacer par un log 
                    break;

                return $result;
            }

            
        }

        /*public static function coordinateInit($coordinateToInit){

            if(!isset($coordinateToInit))
                $result = 0 ; 
            else
                $result = $coordinateToInit;

            return $result;
        }*/
    }