<?php

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


    /* --- infos BDD --- */

    const HOST = 'localhost';
    const DB_NAME = 'batiment';
    const LOGIN_BDD = 'root';
    const PASS_BDD = '';
