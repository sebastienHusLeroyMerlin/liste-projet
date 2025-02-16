<?php

    spl_autoload_register(function ($class) {
        // Convertir les namespaces en chemins de fichier
        $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

        // Construire le chemin complet du fichier
        $filePath = __DIR__ . DIRECTORY_SEPARATOR . $classPath;
        //$filePath = DIRECTORY_SEPARATOR . $classPath;
        var_dump(__NAMESPACE__);
        var_dump($classPath );
        var_dump(__DIR__ );

        var_dump($filePath);
        // Debug: Imprimer le chemin pour vérification
        //print_r("Autoloading: " . $filePath . "\n");

        // Vérifier si le fichier existe et l'inclure
        if (file_exists($filePath)) {
            require_once $filePath;
        } /*else {
            // Gérer le cas où la classe n'est pas trouvée
            die("Classe introuvable : $class");
        }*/
    });


//spl_autoload_register(function ($class) {
//
//
//    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
//
//
//    require $path . '.php';
//
//
//});