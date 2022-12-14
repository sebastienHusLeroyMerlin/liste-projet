<?php

    require_once('Bdd.php');

    Class User{

		private $pseudo ;
		private $mail ;
		private $pass ;
		private $access ;
		private $race ;


		/*je cré une colonie dans le constructeur 
		j initialise les niveau de la colonie a 0
		j insere la colonie dans la bdd colonie
		j initialise la table ressource lié a la colonie 
		pas d ouvri juste des ressource de base
		je recup l id de la colo
		j insere le joueur sur la carte avec l id de sa colonie

		*/

		/* --- Constructors --- */
		public function __construct($pseudo)
		{
			$this->pseudo =  $pseudo;
			$this->mail = $pseudo . '@gmail.com';
			$this->pass = 123456;
			$this->access = 1; // equivalent de membre basique
			$this->race = rand(1,4); 
		}

		public function __destruct()
		{
			
		}

		/* --- Getter Setter --- */


		public function getPseudo(){
			return $this->pseudo;
		}

		public function setPseudo($pseudo){
			$this->pseudo = $pseudo;
		}

		public function setPass($pass){
			$this->pass = $pass;
		}

		public function setAccess($access){
			$this->access = $access;
		}

		//possible mais un compteur de temps se mettra en place avant le prochain changement chaque changement demandera de plus en plus de temps avant reinitialisation du compteur
		public function setRace($race){
			$this->race = $race;
		}

		public static function insertPlayer(){
			
		}

		public static function Auth(){

			//connection a la bdd
			$bdd = Bdd::getBdd();

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

			$bdd = Bdd::getBdd();

            $reqGetPlayerRace = $bdd->prepare('SELECT r.race_name FROM race r 
			INNER JOIN membre m ON m.id_race = r.id  
			WHERE m.id = :idPlayer ');
            $reqGetPlayerRace->execute(array(
            'idPlayer' => $id
            ));
                
            $resultReq = $reqGetPlayerRace->fetch();

            $reqGetPlayerRace->closeCursor();

            return $resultReq[0];

		}

		public static function getIdPlayerRace($id){

			$bdd = Bdd::getBdd();

            $reqGetPlayerRace = $bdd->prepare('SELECT id_race FROM membre   
			WHERE id = :idPlayer ');
            $reqGetPlayerRace->execute(array(
            'idPlayer' => $id
            ));
                
            $resultReq = $reqGetPlayerRace->fetch();

            $reqGetPlayerRace->closeCursor();

            return $resultReq[0];

		}
	}