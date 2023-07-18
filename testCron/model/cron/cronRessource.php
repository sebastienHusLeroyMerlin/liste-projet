<?php

    require_once('../manager/BddManager.php');
    require_once('../manager/CronJoueurManager.php');

    $bdd =  BddManager::getBdd();

    // je recupere toute les infos des joueurs

    $reqRecupListDataJoueur = $bdd->exec('SELECT * FROM technologie_joueur as tj
                                          INNER JOIN membre as m on tj.id_joueur = m.id ');

    var_dump($reqRecupListDataJoueur);
    
    while($joueur = $reqRecupListDataJoueur)
	{
		
        $objetJoueur = New CronJoueur($joueur);
	}

    $reqRecupListDataJoueur->closeCursor();


