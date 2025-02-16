<?php

    require_once '../entities/Tools.php';
    require_once '../modele/BddManager.php';

    class SaltManager{
       
        public static function addSalts($salt1, $salt2, $salt3, $pos1, $pos2, $pos3)
        {
            
            $coBdd = BddManager::getBdd();
            
            $req = $coBdd->prepare('INSERT INTO salt_table (id_user,  salt_one, salt_two, salt_three, p_one, p_two, p_three)
                                    VALUES (:idUser, :salt1, :salt2, :salt3,
                                            :pos1, :pos2, :pos3)');
            $req->execute(array(
                
                'idUser' => null,
                'salt1' =>  $salt1,
                'salt2' =>  $salt2,
                'salt3' =>  $salt3,
                'pos1' =>  $pos1,
                'pos2' =>  $pos2,
                'pos3' =>  $pos3
                
            ));
            
            // to do ajouter un log si mauvaise insertion
            
            $req->closeCursor();
            
            unset($coBdd);
            
        }
        
       
        public static function getSaltId($salt1, $salt2, $salt3)
        {
            $coBdd = BddManager::getBdd();
            
            $req = $coBdd->prepare('SELECT id FROM salt_table WHERE salt_one = :salt1  and salt_two = :salt2 and salt_three = :salt3');
            $req->execute(array(
                
                'salt1' => $salt1,
                'salt2' => $salt2,
                'salt3' => $salt3
                
            ));
            
            $result = $req->fetch();
            $idSalt = $result['id'];
            
            $req->closeCursor();
            
            unset($coBdd);
            
            return $idSalt;
        }
        
        
        
        
        // to do : proteger l acce a cette page seulement si nous somme co hypothese eviter a une personne non connecte dintervenir sur cette page voir avec le routeur
        
        //if(isset($_SESSION['acce']) && $_SESSION['acce'] == true)
            //{
    
        public static function encode($mdp)
        {
            // 1 - recuperation de la taille du mot de passe
            $sizeOfpass = strlen($mdp);
            
            
            /* 2 - Grain of salt
             2.1 - Generate 3 random grain of salt of 15 alphanumeric characters maximum.
             2.2 - Generate 3 random position of maximal size of pass for inser they 3 grain of saltof.
             */
            
            //2.1 - Generate 3 random grain of salt of 15 alphanumeric characters maximum.
            // Grain of salt 1
            $chaine = rand(1,15);
            $salt1 = ToolsManager::randomAlphanumericString($chaine);
            
            // Grain of salt 2
            $chaine = rand(1,15);
            $salt2 = ToolsManager::randomAlphanumericString($chaine);
            
            // Grain of salt 3
            $chaine = rand(1,15);
            $salt3 = ToolsManager::randomAlphanumericString($chaine);
            
            //2.2 - Generate 3 random position of maximal size of pass for inser they 3 grain of saltof.
            $pos1 = rand(1,$sizeOfpass);
            $pos2 = rand(1,$sizeOfpass);
            $pos3 = rand(1,$sizeOfpass);
            
            
            // 3 - Insertion  of 3 grain of salt in the pass
            
            // 3.1 - Insertion  of 1 grain of salt in the pass
            $pass = substr_replace($mdp,$salt1,$pos1,0);
            
            /* 3.2 - Insertion  of the second grain of salt in the password
             But for decode it in the future, test where the 2 grain of salt is it
             for know if i have to shift the initial random position of second grain of salt or not
             */
            if($pos1 > $pos2)
                $pass = substr_replace($pass,$salt2,$pos2,0);
                else
                    $pass = substr_replace($pass,$salt2,$pos2+$pos1,0);
                    
                    // 3.3 - Identical princip of the 3.2 point
                    if($pos3 < $pos2 && $pos3 < $pos1)
                    {
                        $pass = substr_replace($pass,$salt3,$pos3,0);
                    }
                    else
                    {
                        if($pos3 > $pos2 && $pos3 > $pos1)
                            $pass = substr_replace($pass,$salt3,$pos3+$pos1+$pos2,0);
                            elseif($pos3 > $pos2 && $pos3 < $pos1)
                            $pass = substr_replace($pass,$salt3,$pos3+$pos2,0);
                            else
                                $pass = substr_replace($pass,$salt3,$pos3+$pos1,0);
                    }
                    
                    
                    /* 4 - insertion of the grain of salt in the bdd with :
                     position of salt
                     size of salt
                     value of salt
                     */
                    
                    // id_user ajout� par la suite car pour le moment l utilisateur n est pas encore en bdd donc pas d id unique de cre�
                    self::addSalts($salt1, $salt2, $salt3, $pos1, $pos2, $pos3);
                    
                    // creation d un array
                    $response = array(
                        
                        'salt1' => $salt1,
                        'salt2' => $salt2,
                        'salt3' => $salt3,
                        'pass' => $pass
                        
                    );
                    
                    return $response ;
                    
        }
        
        public static function hashDecode($passBdd, $passForm, $idUser)
        {
            
            $arrayDataSalt = self::getDataSaltTableByIdUser($idUser);
            var_dump($arrayDataSalt);
            echo 'pas bdd before'.$passBdd;
            echo '<br>after'.$arrayDataSalt['salt3'];
            $passBdd = str_replace($arrayDataSalt['salt3'],"",$passBdd);
            ?><br><?php
            echo $passBdd;
            ?><br><?php
            
            ?><br><?php
    
            $passBdd = str_replace($arrayDataSalt['salt2'],"",$passBdd);
            ?><br><?php
            echo $passBdd;
            ?><br><?php
            
            ?><br><?php
    
            $passBdd = str_replace($arrayDataSalt['salt1'],"",$passBdd);
            ?><br><?php
            echo $passBdd;
          
            $passForm = sha1($passForm);
            
            ?><br><?php
    
            if($passBdd === $passForm)
            {
                echo 'pass identique';
                $result = true;
            }
            else    
            {
                echo 'erreur de pass';
                $result = false;
            }
    
            return $result;
    
        }
    
        // a mettre dans modele
        public static function getDataSaltTableByIdUser($idUser)
        {
    
            $coBdd = BddManager::getBdd();
    
            $req = $coBdd->prepare('SELECT * FROM salt_table WHERE id_user = :idUser');
            $req->execute(array(
    
                'idUser' => $idUser
    
            ));
    
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
    
            $arrayData = null;
            
            foreach($data as $value ) {
    
                $salt1 = $value['salt_one'];
                $salt2 = $value['salt_two'];
                $salt3 = $value['salt_three'];
                $pos1 = $value['p_one'];
                $pos2 = $value['p_two'];
                $pos3 = $value['p_three'];
    
                $arrayData = array(
    
                    'salt1' => $salt1, 'salt2' => $salt2, 'salt3' => $salt3,
                    'pos1' => $pos1, 'pos2' => $pos2, 'pos3' => $pos3
                );
    
            }
    
            $req->closeCursor();
    
            unset($coBdd);
    
            return $arrayData;
        }
        
        
        public static function setUserIdSaltTable($idUser,$idSalt){
            
            $coBdd = BddManager::getBdd();
            
            $req = $coBdd->prepare('UPDATE salt_table SET id_user = :idUser WHERE id = :idSalt');
            $req->execute(array(
                
                'idUser' => $idUser,
                'idSalt' => $idSalt
                
            ));
            
            
            $req->closeCursor();
            
            unset($coBdd);
            
        }
        
    }