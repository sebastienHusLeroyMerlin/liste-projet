<?php


    require_once('../model/manager/UserManager.php');
    require_once('../model/manager/ColonieManager.php');


    $newPlayer = new UserManager('Bob');

    //j'inserre le joueur en bdd
    $newPlayer->insertPlayer();
    

    //j'initialise sa colo
    $newColonie = new ColonieManager();
    $newColonie->attributeColonie($newPlayer);