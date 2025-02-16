<?php

/********** Note classe sans doute tempo ses etape seront faite a l inscription du joueur  *******/
// controleur d insertion de joueur sur la carte
    require_once('../modele/manager/WorldMapManager.php');
    require_once('../modele/constante.php');
    
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
                        ->insere chaque nouvelle tuile
                ->j insere le joueur sur une tuile
                        -> j'écrase les parametres de biome de la tuile pur le biome du joueur
                        TODOsi la tuile est une tuile de type emplacement pour merveille alors l'insertion du joueur sera decalé de 1
                                si nouvel emplacement en dehors de la limite x
                                    -> j agrandis la carte 
                                    -> j insere le joueur 
            sinon si joueur en dehors de la ligne
                ->j'agrandis la carte
                ->j'insere le joueur
            sinon  log d'erreur
    */

    //Etape 1 
    $xLimitWorldMap = WorldMapManager::getInfoWorldMap(X_MAX_MAP);
    $yLimitWorldMap = WorldMapManager::getInfoWorldMap(Y_MAX_MAP);

    //------ TODO voir comment on recup cette infos piste session
    $idPlayer = $_GET['idPlayer'];

    //Etape 2
    if(isset($xLimitWorldMap)){
        WorldMapManager::insertPlayerToWorldMap($idPlayer);
    }
    elseif(!isset($xLimitWorldMap)){
var_dump("creation de carte");
        /* --- Création de carte --- */
        WorldMapManager::createWorldMap();

        /* --- Debut  insertion joueur --- */
        WorldMapManager::insertPlayerToWorldMap($idPlayer);

    }
    elseif( $xPosPlayer  > $xLimitWorldMap){
            //TODO recevra une partie de la refactorisqtion de la fonction insertPlayerToWorldMap()
    }
    else{
        //a transformer en log
        echo 'Pb logique d\'implantation';
    }


    header('Location:../controleur/routeur.php?destination=testScript');