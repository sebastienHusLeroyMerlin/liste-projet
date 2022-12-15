<?php


    require_once('../model/manager/UserManager.php');
    require_once('../model/manager/ColonieManager.php');
    require_once('../model/manager/ToolsManager.php');

    $playerName = ToolsManager::validData($_POST['name']);
    $newPlayer = new UserManager($playerName);

    //j'inserre le joueur en bdd
    $newPlayer->insertPlayer();
    

    //j'initialise les batiments de la la nouvelle colonie à 0
    $newColonie = new ColonieManager();
    $newColonie->setIdPlayer($newPlayer->getUserId($newPlayer->getMail()));


    //j'inserre la colonie en bdd
    var_dump($newPlayer);
    $newColonie->attributeColonie($newPlayer);