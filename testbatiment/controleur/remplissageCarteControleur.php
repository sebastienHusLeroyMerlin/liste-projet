<?php

/********** Note classe sans doute tempo ses etape seront faite a l inscription du joueur  *******/
// controleur d insertion de joueur sur la carte
    require_once('../model/WorldMap.php');
    require_once('../model/constante.php');
    
    /* 
        A l'inscription du premier joueur au moment de l inserer sur la carte
        0 - je determine le nombre de case vide entre lui et le dernier joueur implanté
        1 - je recupere les infos liées à la map ( pour x different de null = carte initialisée)
            je recupere le x du dernier joueur
            je recupere le y du dernier joueur
            je recupere le x definissant la limite de la carte 
            je recupere le y definissant la limite de la carte 
            je recupere le x maximum du dernier joueur inseré 
            je recupere le y maximum du dernier joueur inseré
        2 - si la carte est deja initialisée et que la position du joueur se situe sur la ligne d insertion x
                ->j insere le joueur 
            sinon sila carte n'est pas initialisés 
                ->je l initialise 
                        -> creer la ligne
                        -> creer chaque nouvelle tuile 
                        ->insere chaue nouvelle tuile
                ->j insere le joueur sur une tuile
                        -> j'écrase les parametres de biome de la tuile pur le biome du joueur
                        si la tuile est une tuile de type emplacement pour merveille alors l'insertion du joueur sera decalé de 1
                                si nouvel emplacement en dehors de la limite x
                                    -> j agrandis la carte 
                                    -> j insere le joueur 
            sinon si joueur en dehors de la ligne
                ->j'agrandis la carte
                ->j'insere le joueur
            sinon  log d'erreur
    */

    //Etape 0 
    $nbEmptyBox = rand(1,4);

    //Etape 1 
    $xLimitWorldMap = WorldMap::getInfoWorldMap(X_MAX_MAP);
    $yLimitWorldMap = WorldMap::getInfoWorldMap(Y_MAX_MAP);

    //$xPosPlayer = $nbEmptyBox + $xLastPlayerControled;

    //------ TODO voir comment on recup cette infos
    $idPlayer = 1;

    //Etape 2
    if(isset($xLimitWorldMap) && ($xPosPlayer <= $xLimitWorldMap)){
        $idBiome = WorldMap::defineBiomeForPlayer($idPlayer);
        WorldMap::insertPlayerToWorldMap($idPlayer, $xPosPlayer, $yPosPlayer, $idBiome);
    }
    elseif(!isset($xLimitWorldMap)){
        /*
            Pour créer la carte j'ai besoin:
                - de definir :
                        - xLimitWorldMap, yLimitWorldMap
                        - xLastPlayer, yLastPlayer
                        - xLastLimitWorldMap, yLastLimitWorldMap
                - de créer chaque tuile de la carte
        */
        $xLimitWorldMap = X_BASE;
        $yLimitWorldMap = Y_BASE;
        $xLastLimitWorldMap = X_BASE;
        $yLastLimitWorldMap = Y_BASE;

        // creation des tuiles
        for ($y=0; $y < $yLastLimitWorldMap; $y++) { 
            for ($x=0; $x < $xLastLimitWorldMap; $x++) { 
                
                WorldMap::createTile($x, $y);

            }
        }

        // ce dont on aura besoin pour update la tuile qui recevra le fichier
                //$idPlayer, $xCoordinate, $yCoordinate



        // A faire une fois le joueur inserer TODO a revoir
        //$xLastPlayer = WorldMap::getInfoWorldMap(X_LAST_PLAYER);
        $xLastPlayerControled = WorldMap::coordinateInit($xLastPlayer);

        //$yLastPlayer = WorldMap::getInfoWorldMap(Y_LAST_PLAYER);
        $yLastPlayerControled = WorldMap::coordinateInit($yLastPlayer);

    }
    elseif( $xPosPlayer  > $xLimitWorldMap){

        $yLastPlyLastPlayerControled += 1;
        ///si yLastPlayerControled >$ylimit alors j agrandis la map
        //si xpos> xlimit et ypos == y limit
        // je remet y a 0 et je  
        WorldMap::updateWorldMapInfos($yLastPlayerControled, Y_LAST_PLAYER);
        //et x revient a l origine x_depart
    

        $xPosPlayerUpdated = $xLimitWorldMap - $xLastPlayerControled - $nbEmptyBox;
        WorldMap::insertPlayerToWorldMap($idPlayer, $xPosPlayerUpdated, $yPosPlayer);
        WorldMap::updateWorldMapInfos($xPosPlayerUpdated, X_LAST_PLAYER);
    }
    else{
        //a transformer en log
        echo 'Pb logique d\'implantation';
    }




    /******* controleur de creation de carte  *******/

    /*public static function insertPlayerToWorldMap(){

        $nbEmptyBox = rand(1,4);

        // je recupere la position en x du dernier inscrit
        $xLastPlayer = WorldMap::getInfoWorldMap(X_LAST_PLAYER);

        // je recupere la position de la limite de carte
        $xLimitWorldMap = WorldMap::getInfoWorldMap(X_MAP);

        /*
            SI $xLastPlayer n'est pas definis
            aucun joueur n'existe donc la carte n'existe pas non plus
            J'instancie la carte
        */
       /* if(!isset($xLastPlayer)){
            //J'instancie la carte
            WorldMap::enlargeWorldMap();
        }

         
        // si j'essai d'inserer mon joueur en dehors de la carte
        if($xNewPlayer > $xLimitWorldMap){
            //j'ajoute une ligne à la carte 
            // de que sur l'axe des y je suis = à l axe des x 
            // je agrandis l axe des 5 de x_base
        }
        else{
            //J'insere mon joueur sur la carte
            //puisque c'est lepremier joueur je serai forcement sur la carte
            $xNewPlayer = $xLastPlayer + $nbEmptyBox ;//TODO trouver comment definir x 


        }
    }*/