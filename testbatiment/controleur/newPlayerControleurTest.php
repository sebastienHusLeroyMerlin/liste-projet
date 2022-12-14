<?php


    require('../model/manager/UserManager.php');


    $newPlayer = new UserManager('Bob');
    var_dump($newPlayer);
    echo $newPlayer->getPseudo();

    $newPlayer->insertPlayer();