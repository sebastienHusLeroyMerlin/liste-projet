<?php

/********** Note classe sans doute tempo ses etape seront faite a l inscription du joueur  *******/

    require_once('../model/WorldMap.php');
    
    /* 
        Note : La race du nouveau joueur determine le biome de sa case ( qui l'avantage )
        
        A l'inscription du premier joueur au moment de l inserer sur la carte
        je verifie que la carte est initialisée
        si oui j insere le joueur 
        si la carte est deja initialisée et que la position du joueur se situe sur la ligne d insertion x
        alors j insere le joueur 
        sinon j agrandis la carte et j insere le joueur

    */
    // un joueur s est inscrit je l insere sur la carte
    WorldMap::insertPlayer();



    for ($i=1; $i <= $nbTile; $i++) { 

        //j'indique la position x
        
        //j'indique la position y
     
    }