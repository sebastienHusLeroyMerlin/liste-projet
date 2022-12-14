<?php

    Class UserManager{

		public static function insertPlayer(){
			
		}

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

			unset($bdd);
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

		public static function addNewUser($firstName,  $userName, $mail, $pseudo, $pass)
        {
            $bdd =  BddManager::getBdd();
            
            $req = $bdd->prepare('INSERT INTO users( first_name, user_name, favorite_series, num_tel, mail, pseudo, pass)
                                        VALUES (:firstName, :userName, :favorite_series, :num_tel, :mail, :pseudo, :pass)');
            
            $req->execute(array(
                
                'firstName' => $firstName,
                'userName' => $userName,
                'favorite_series' => null,
                'num_tel' => null,
                'mail' => $mail,
                'pseudo' => $pseudo,
                'pass' => $pass
                
            ));
            
            $req->closeCursor();
            
            unset($bdd);
            
            return true;
        }
	}