<?php

    require_once('../manager/BddManager.php');
    require_once('../manager/CronJoueurManager.php');

    $bdd =  BddManager::getBdd();

    // je recupere toute les infos des joueurs

    $reqRecupListDataJoueur = $bdd->query('SELECT * FROM membre as  m
                                          INNER JOIN technologie_joueur as tj on tj.id_joueur = m.id 
                                          INNER JOIN ressource as r on r.id_joueur = m.id');

    $listDataJoueur = $reqRecupListDataJoueur->fetchAll();
    $reqRecupListDataJoueur->closeCursor();
    //var_dump($listDataJoueur);

    foreach($listDataJoueur as $joueur)
	{
        //var_dump($joueur);

        $objetJoueur = New CronJoueur($joueur);
        var_dump($objetJoueur);

        $objetJoueur->incrementeRessource();

	}

    