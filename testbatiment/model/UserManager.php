<?php

    require_once('BddManager.php');

    Class UserManager{

		public static function insertPlayer(){
			
		}

		public static function Auth(){
//TODO voir si amelioration pas possible
			//connection a la bdd
			$bdd = BddManager::getBdd();

			$reqConnexion = $bdd->prepare('SELECT id FROM membre WHERE pass = :pass AND pseudo = :pseudo');
			$reqConnexion->execute(array(
			'pseudo' => $_POST['pseudo'],
			'pass' => $_POST['pass'] 
			));
			
			$resultatConnexion = $reqConnexion->fetch();
									
            $reqConnexion->closeCursor();
            
            session_start();
            $_SESSION['Auth'] = false;

			if(isset($resultatConnexion))
			{
				
				
				$req= $bdd->prepare('SELECT * FROM membre WHERE id = :id');
				$req->execute(array(
				'id' => $resultatConnexion['id']
				));
				
				$variableDeSession = $req->fetch();
				
				
				
				$req->closeCursor();
                
                $_SESSION['Auth'] = true;
				$_SESSION['pseudo'] = $variableDeSession['pseudo'] ;
				$_SESSION['pass'] = $variableDeSession['pass'] ;
				$_SESSION['mail'] = $variableDeSession['mail'] ;
				$_SESSION['droit'] = $variableDeSession['droit'] ;
				$_SESSION['id_joueur'] = $resultatConnexion['id'] ;
				
				$_SESSION['destination'] = 'accueil';
				return $auth = true;
			}
			elseif(!isset($resultat))
			{
				// es ce le pseudo qui est mauvais ?
				$reqRecherchePseudo = $bdd->prepare('SELECT pseudo FROM membre WHERE  pseudo = :pseudo');
				$reqRecherchePseudo->execute(array(
				'pseudo' => $_POST['pseudo']				 
				));
				
				$resultatRecherchePseudo = $reqRecherchePseudo->fetch();
				
				$reqRecherchePseudo->closeCursor();
				
				if(!isset($resultatRecherchePseudo))
				{
					echo 'Votre pseudo est Inconnu !!' ;
				}
				else
				{
					echo 'Votre mot de passe est invalide !!' ;
				}
				
			}
			else
			{
				echo 'Erreur : 3 ';
            }
        }

		/**
		 * Get String player race
		 */
		public static function getPlayerRace($id){

			$bdd = BddManager::getBdd();

            $reqGetPlayerRace = $bdd->prepare('SELECT r.race_name FROM race r 
			INNER JOIN membre m ON m.id_race = r.id  
			WHERE m.id = :idPlayer ');
            $reqGetPlayerRace->execute(array(
            'idPlayer' => $id
            ));
                
            $resultReq = $reqGetPlayerRace->fetch();

            $reqGetPlayerRace->closeCursor();
			unset($bdd);
            return $resultReq[0];

		}

		public static function getIdPlayerRace($id){

			$bdd = BddManager::getBdd();

            $reqGetPlayerRace = $bdd->prepare('SELECT id_race FROM membre   
			WHERE id = :idPlayer ');
            $reqGetPlayerRace->execute(array(
            'idPlayer' => $id
            ));
                
            $resultReq = $reqGetPlayerRace->fetch();

            $reqGetPlayerRace->closeCursor();
			unset($bdd);
            return $resultReq[0];

		}

		public static function verifMail($mail, $confirmMail){
            
            // test si $mail et confirmation du mail existent toujours et si toujour sup a 5 caractere
            /* 1 - verification si $mail et confirmMail existe,
             que $mail est superieur a 5 caractere
             que confirmMail contient le meme nombre de caractere que mail
             */
            if( (isset($mail) && strlen($mail) > 5) &&
                ((isset($confirmMail) && strlen($confirmMail) == strlen($mail)))){
                    
                    /* 2 - determine avec regex si mail correspond a ce que l on attend
                     que $mail et $verifMail sont identique
                     */
                    if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail) &&
                        $mail === $confirmMail){
                            
                            return true;
                            
                    }
                    else
                    {
                        return false;
                    }
                    
                    
            }
            else
            {
                return false;
            }
            
        }

		public static function verifNotExistingMail($mail)
        {
            $bdd = BddManager::getBdd();
            
            $req = $bdd->prepare("SELECT id FROM users WHERE mail = :mail");
            $req->execute(array(
                'mail' => $mail
            ));
            
            $result = $req->fetchAll();
            $nbrResultat = count($result);
            
            if($nbrResultat != 0)
            {
                /* reqat trouvé donc doit retourner faux,
                 pour empecher l insertion d un nouveau membre avec la meme adresse maill */
                echo 'insertion non autorisée ! ';
                
                $resultBool = false;
            }
            else
            {
                echo 'insertion autorisée !';
                
                $resultBool =  true;
            }
            
            $req->closeCursor();
            unset($bdd);
            return $resultBool ;
            
        }

		public static function getUserId($pseudo, $mail)
        {
            
            $bdd =  BddManager::getBdd();
            
            $req = $bdd->prepare('SELECT id FROM users WHERE pseudo = :pseudo or mail= :mail');
            $req->execute(array(
                
                'pseudo' => $pseudo,
                'mail' => $mail
                
            ));
            
            $result = $req->fetch();
            $userId = $result['id'];echo $userId;

            $req->closeCursor();
            
            unset($bdd);
            
            return $userId;
        }
	}