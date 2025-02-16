<?php

    class ConnectionManager{
        public static function Auth(){
            //connection a la bdd
            $bdd = BddManager::getBdd();

            $reqConnexion = $bdd->prepare('SELECT id FROM membre WHERE pass = :pass AND pseudo = :pseudo');
            $reqConnexion->execute(array(
            'pseudo' => $_POST['pseudo'],
            'pass' => $_POST['pass'] 
            ));
            
            $resultatConnexion = $reqConnexion->fetch();
                       
            $reqConnexion->closeCursor();
            unset($reqConnexion);
            //session_start();
            //
            return $resultatConnexion;
        }
    }