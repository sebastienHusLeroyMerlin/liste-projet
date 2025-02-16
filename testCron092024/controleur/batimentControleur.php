<?php

    /*
        J'AI BESOIN D UN APPEL BDD POUR RECUPERER TOUT LES BATIMENTS
    */

    $batimentUnserialized = unserialize($_GET['objBatiment']);
    var_dump($batimentUnserialized);

    //$listprices = BatimentManager::getPricesLevelUp($_GET['objBatiment']);
    
    $boisCouveuse = 100;//$listprices['bois'];
    $cireCouveuse = 100;//$listprices['cire'];
    $eauCouveuse = 100;//$listprices['eau'];
    $dureeConstructionCouveuseConverti = 1000;//$listprices['temps'];
    
    require('../vue/component/vignetteBatiment.php');