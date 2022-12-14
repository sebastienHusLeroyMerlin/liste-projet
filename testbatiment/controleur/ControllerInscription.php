<?php

//todo faire en sorte que le login soit unique

    require_once '../models/UserManager.php';
    require_once '../models/SaltManager.php';
    
    // 1 - determination quel formulaire a été validé ?
    // 1a - formulaire Inscription
    if(isset($_POST['subIns']))
    {
        // grain de sel ajouter une colonne en bdd grain de sel en generer un aleatoirement pour chaque utilisateur
        //et l associé au mdp lui meme crypter
        
        /*ajout d une session pour proteger les donnée qu on envoi au au control
         ( pas de hack entre les deuxqui sera tué plus tard
         voir les autres possibilité !!! systeme provisoire donc */
        
        
        
        
        $userName = $_POST['name'];
        $firstName = $_POST['firstName'];
        $pseudo = $_POST['pseudo'];//TODO tester si le pseudo est dispo
        $mail = $_POST['mail'];
        $confirmMail = $_POST['confirmMail'];
        $pass = sha1($_POST['pass']);
        
        
        // 2 - test si tout les champs existe et non null
        // 2a - si vrai
        if((isset($userName) && $userName != null ) &&
            (isset($firstName) && $firstName != null ) &&
            (isset($pseudo) && $pseudo != null ) &&
            (isset($pass) && $pass != null ) &&
            (isset($mail) && strlen($mail) > 5  ) &&
            (isset($confirmMail) && $confirmMail != null ))
        {
            
            /*  3.1
             verification validité mail
             verification mail est identique a confirMail
             verification mail pas deja present dans la bdd ( si present envoyer message )
             si tout ok insertion en bdd
             */
            
            // attention vetifExisting mail se trouve dans les traitementVisiteurBdd car liée aune recher sur la bdd
            if(UserManager::verifMail($mail, $confirmMail) && UserManager::verifNotExistingMail($mail)){
                //encodage du mot de passe
                $responseArray = SaltManager::encode($pass);
                $pass = $responseArray['pass'];
                $salt1 = $responseArray['salt1'];
                $salt2 = $responseArray['salt2'];
                $salt3 = $responseArray['salt3'];
                
                // retourner aussi l idSalt qui vient d etre creer
                $idSalt = SaltManager::getSaltId($salt1, $salt2, $salt3);
                echo 'gettype depuis formulzire control'.gettype($idSalt);
                
                
                // 4 - requete insertion bdd
                $etat = UserManager::addNewUser($firstName,  $userName, $mail, $pseudo, $pass);
                
                // recuperation de l'id utilisateur
                $idUser = UserManager::getUserId($pseudo, $mail);
                //attribution de l idUser a la table de hash
                SaltManager::setUserIdSaltTable($idUser, $idSalt);
                
                
                if($etat)
                {
                    $msg = 'Inscription réussite';
                }
                else
                {
                    $msg = 'Inscription échoué ';
                }
                
                $msgHeader = '&msgIns='.$msg;
                
            }
            else
            {
                $msgIns2 = $msgIns3 = '';
                
                if(!UserManager::verifMail($mail, $confirmMail))
                    $msgIns2 = ' Les e@mail que vous avez renseigné ne sont pas identique !';
                if(!UserManager::verifNotExistingMail($mail))
                    $msgIns3 = ' Cet e@mail est déjà referencé';
                        
                 $msgHeader = '&msgIns2='.$msgIns2.'&msgIns3='.$msgIns3;
            }
            
            // 6 - redirection sur le formulaire de connection avec le message d inscription reussi
            
            return header("Location: ../index.php?'$msgHeader'");
            
        }
        // 2b - si faux
        else
        {
            //determination de ou vient l'erreur !
            $pseudo = $_POST['name'];
            
            //echo 'Coucou tu te connecte en tan que : '. $pseudo;
            echo 'il y a une erreur dans le formulaire';
            
            echo 'Vous venez de la partie Inscription !';
        }
        
    }
    

