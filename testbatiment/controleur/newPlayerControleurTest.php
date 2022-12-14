<?php


    require('../model/User.php');


    $newPlayer = new User("bob");
    var_dump($newPlayer);
    $newPlayer->