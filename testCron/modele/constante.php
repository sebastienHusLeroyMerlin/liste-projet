<?php

    /* DEPENDRA SELON LE BIOME */
    const RESSOURCE_BOIS_BASE = 0.4;
    const RESSOURCE_CIRE_BASE = 0.2;
    const RESSOURCE_ARGILE_BASE = 0.4;
    const RESSOURCE_EAU_BASE = 0.4;
    const RESSOURCE_NOURRITURE_BASE = 0.4;

    const COEF_BOIS_PLAINE = 1;
    const COEF_ARGILE_PLAINE =  1.5;
    const COEF_EAU_PLAINE = 0.75;
    const COEF_NOURRITURE_PLAINE = 1 ;

    const COEF_BOIS_FORET = 1.25 ;
    const COEF_ARGILE_FORET =  1.25;
    const COEF_EAU_FORET = 0.5;
    const COEF_NOURRITURE_FORET = 1;

    const COEF_BOIS_MARECAGE = 0.75;
    const COEF_ARGILE_MARECAGE = 0.75;
    const COEF_EAU_MARECAGE = 2.25;
    const COEF_NOURRITURE_MARECAGE = 1 ;

    
/* ------------------------------- */ 

    //defini la taille de la carte affichée
    const X_VUE = 9;
    const Y_VUE = 9;

    //Permet de definir de combien la map s'agrandit
    const X_BASE = 9;
    const Y_BASE = 9;

    const X_MAX_MAP =  'x_limit_world_map';
    const Y_MAX_MAP =  'y_limit_world_map';

    const X_LAST_PLAYER =  'x_last_player';
    const Y_LAST_PLAYER =  'y_last_player'; 

    const X_LAST_MAX_MAP = 'x_last_limit';
    const Y_LAST_MAX_MAP = 'y_last_limit';

    //const X_START =  'x_start';
    //const Y_START =  'y_start'; 

    /*
        Parametrage du nombre aleatoire de case vide 
        avant implantation d un nouveau joueur
    */
    const RAND_MAX_EMPTY_BOX = 4;
    const RAND_MIN_EMPTY_BOX = 1;


    CONST ID_PLAYER = 'id_player';

/* ------------------------------- */ 

    const X_POS = 'x_pos';
    const Y_POS = 'y_pos';
    const ID_HUM =  'id_humidite';
    const ID_CLIM =  'id_climat';
    const ID_RELIEF =  'id_relief';
    const ID_BIOME =  'id_biome'; 
    const ID_COLO = 'id_colo';


    /* --- infos BDD --- */
/*
    const HOST = 'localhost';
    const DB_NAME = 'krakatopoulpiz';
    const LOGIN_BDD = 'pirato';
    const PASS_BDD = '@04000400Hs!krakatopoulpizsql';
*/

    const HOST = 'localhost';
    const DB_NAME = 'krakatopoulpiz';
    const LOGIN_BDD = 'root';
    const PASS_BDD = '';

