<?php


    require_once('../modele/manager/UserManager.php');
    require_once('../modele/manager/ColonieManager.php');
    require_once('../modele/manager/ToolsManager.php');

    $playerName = ToolsManager::validData($_POST['name']);
    $newPlayer = new UserManager($playerName);

    //j'inserre le joueur en bdd
    $newPlayer->insertPlayer();
    

    //j'initialise les batiments de la la nouvelle colonie à 0
    $newColonie = new ColonieManager();

    //j'attribue l'id du joueur a l'objet colo
    $idPlayer = $newPlayer->getUserId($newPlayer->getMail());
    $newColonie->setIdPlayer($idPlayer);

    //je recupere les coordonnée d implantation du joueur 
    

    //j'inserre la colonie en bdd
    var_dump($newPlayer);
    $newColonie->attributeColonie($newPlayer);

    header('Location:remplissageCarteControleur.php?idPlayer='.$idPlayer);