<?php

/********** Note classe sans doute tempo ses etape seront faite a l inscription du joueur  *******/
// controleur d insertion de joueur sur la carte
    require_once('../model/WorldMap.php');
    
    /* 
        A l'inscription du premier joueur au moment de l inserer sur la carte
        0 - je determine le nombre de case vide entre lui et le dernier joueur implanté
        1 - je recupere la limite de la map sur x ( si x different de nul la carte est initialisée)
            je recupere le x du dernier joueur
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
            sinon  log derreur
    */

    //Etape 0 
    $nbEmptyBox = rand(1,4);

    //Etape 1 
    $xLimitWorldMap = WorldMap::getInfoWorldMap(X_MAP);
    $xLastPlayer = WorldMap::getInfoWorldMap(X_LAST_PLAYER);

    if(!isset($xLastPlayer))
        $xLastPlayer = -1;

    $xPosPlayer = $nbEmptyBox + $xLastPlayer;

    if($xPosPlayer % 2 == 0 )
        $yPosPlayer = ;

    //------ TODO voir comment on recup cette infos
    $idPlayer = 1;

    //Etape 2
    if(isset($xLimitWorldMap) && $xPosPlayer <= $xLimitWorldMap){
        $idBiome = WorldMap::defineBiome($idPlayer);
        WorldMap::insertPlayerToWorldMap($idPlayer, $xPosPlayer, $yPosPlayer, $idBiome);
    }
    elseif(!isset($xLimitWorldMap)){

    }
    elseif( $xPosPlayer  > $xLimitWorldMap){

        $xPosPlayerUpdated = 

        WorldMap::insertPlayerToWorldMap($idPlayer, $xPosPlayerUpdated, $yPosPlayer);
    }
    else{
        //a transformer en log
        echo 'Pb logique d\'implantation';
    }




    /******* controleur de creation de carte  *******/

    public static function insertPlayerToWorldMap(){

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
        if(!isset($xLastPlayer)){
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
    }