<?php

    require_once('../model/WorldMap.php');

    $listInfo = WorldMap::getWorldMapInfos();

    if($listInfo[0][0] == "y_max" )
    $xMax = $listInfo[0][1] ; //4

    if($listInfo[1][0] == "x_max" )
    $yMax = $listInfo[1][1] ; //4

    var_dump("xMax : " . $xMax . " -- yMax : " . $yMax);

    // si $xmax et $ ymax sont a null la carte ne st pas definie
    if(!isset($xMax) && !isset($yMax)){
        // je creer la carte
        WorldMap::initializeWorldMap();

    }

    var_dump(isset($xMax));

    // si $xmax et $ ymax sont a existe la carte est definie je peux l'agrandir
    if(isset($xMax) && isset($yMax) ){
        // j'agrandi la carte
        WorldMap::enlargeWorldMap();
    }