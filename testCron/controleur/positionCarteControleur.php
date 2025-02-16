<?php
    session_start();

    require_once('../modele/constante.php');
    require_once('../modele/manager/WorldMapManager.php');

    //TODOgerer le cas ou une des coordonnee ou les deux sont en dehors de la map

    /*
        Initialisation des super variable post et get 
        dans des variables simple
    */
    
    if(isset($_POST['xTarget']))
        $xPos = $_POST['xTarget'];
    elseif(isset($_GET['x']))
        $xPos = $_GET['x'];


    if(isset($_POST['yTarget']))  
        $yPos = $_POST['yTarget'];
    elseif(isset($_GET['y']))
        $yPos = $_GET['y'];

    
    if(isset($_GET['dir']))
        $dir = $_GET['dir'];
    else
        $dir = null;

    var_dump($_GET['dir']);

    /* --- fin d initialisation de variable --- */


    if($dir != null)
    {
        //TODO gerer le cas ou le x ou y serait negatif ou depasserait des limite de la carte

        // je determine la nouvelle position de visualisation de la carte
        switch ($dir) 
        {
            case 'r':
                $xPosNew = $xPos + X_BASE;
                //WorldMapManager::initializeAxeIntervals($xPos, $yPos);
            break;

            case 'l':
                $xPosNew = $xPos - X_BASE;
                //WorldMapManager::initializeAxeIntervals($xPos, $yPos);
            break;

            case 't':
                $yPosNew = $yPos + Y_BASE;
                //WorldMapManager::initializeAxeIntervals($xPos, $yPos);
            break;

            case 'b':
                $yPosNew = $yPos - Y_BASE;
                //WorldMapManager::initializeAxeIntervals($xPos, $yPos);
            break;
            
            default:
                //on ne bouge pas on reste sur place
                
                break;
                
        }

        // lors qu on deplace la carte si mon x ou y + x vue ou y vue > x limit ou y limit  revient a dire tu ne bouge pas 
            //sinon determine la nouvelle position
        // correspond a la determination des interval max que je veux voir 

        $xlimitWorldMpap = WorldMapManager::getInfoWorldMap(X_MAX_MAP);
        $ylimitWorldMap = WorldMapManager::getInfoWorldMap(Y_MAX_MAP);

        //ppas totalement vrai il manque une condition 
        if (($xlimitWorldMpap == X_BASE) or ($ylimitWorldMap == Y_BASE))
        {
            $listeIntervals = WorldMapManager::initializeAxeIntervals($xPos, $yPos);
        }
        elseif(($xlimitWorldMpap > X_BASE) or ($ylimitWorldMap > Y_BASE))
        {
            if($xlimitWorldMpap > X_BASE)
                $listeIntervals = WorldMapManager::initializeAxeIntervals($xPosNew, $yPos);
            

            if($ylimitWorldMap > Y_BASE)
                $listeIntervals = WorldMapManager::initializeAxeIntervals($xPos, $yPosNew);
        }
        else
        {
            //a transformer en log 
            echo ' dans le cas ou limite world map < a x ou y base normalement cas impossible';
        }

        
        if(($xPosNew > X_MAX_MAP) or ($yPosNew > Y_MAX_MAP))
        {

            
            if(isset($xPosNew))
            {
                $coordinateColo = $xPos;
                $limiteMax = WorldMapManager::getInfoWorldMap(X_MAX_MAP) ;
                $interval = ( ( X_VUE - 1 ) / 2 );

                $reste = $coordinateColo - $limiteMax + $interval;
                $xPosNew =  -1 + $reste;
                $xPos = $xPosNew;
            }
            else
            {
                $coordinateColo = $yPos;
                $limiteMax = WorldMapManager::getInfoWorldMap(Y_MAX_MAP);
                $interval = ( ( Y_VUE -1 ) / 2 );

                $reste = $coordinateColo - $limiteMax + $interval;
                $yPosNew =  -1 + $reste;
                $yPos = $yPosNew;
            }

        }  var_dump('Y : ' . $yPos  . ' X : ' . $xPos );
    }
    else
    {
        echo 'oups !!!!';
    }

    $listeIntervals = WorldMapManager::initializeAxeIntervals($xPos, $yPos);
    var_dump($listeIntervals);
    $arrayCoordinate = array('xPos'=>$xPos,
    'yPos'=>$yPos);
    var_dump($arrayCoordinate);
    $_SESSION['arrayCoordinate'] = $arrayCoordinate;
    $_SESSION['destination'] = 'testScript';
/*
    mettre sous forme de session et renvoyer a l 'accueil 
    avec le paramete  carte pour aller a la carte '*/

    header('Location:../index.php');