<?php

/********** Note classe sans doute tempo ses etape seront faite a l inscription du joueur  *******/

    require_once('../model/WorldMap.php');
    
    /* 
        Note : La race du nouveau joueur determine le biome de sa case ( qui l'avantage )
        je determine les biomes de chaques case avant le nouveau joueurs 
    */
    // un joueur s est inscrit je l insere sur la carte
    WorldMap::insertPlayer();

