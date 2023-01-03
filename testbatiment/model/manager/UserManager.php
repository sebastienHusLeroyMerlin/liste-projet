<?php

    require_once('BddManager.php');

    Class UserManager{
        protected $pseudo ;
        protected $mail ;
        protected $pass ;
        protected $idAccess ;
        protected $idRace ;


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
            $this->mail = $pseudo . '@gmail.com';//tempo
            $this->pass = 123456;
            $this->idAccess = 1; // equivalent de membre basique
            $this->idRace = rand(1,4); 
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

        public function getMail(){
            return $this->mail;
        }

        public function setMail($mail){
            $this->mail = $mail;
        }

        public function getPass(){
            return $this->pass;
        }

        public function setPass($pass){
            $this->pass = $pass;
        }

        public function getIdAccess(){
            return $this->idAccess;
        }

        public function setIdAccess($idAccess){
            $this->idAccess = $idAccess;
        }

        public function getIdRace(){
            return $this->idRace;
        }

        //possible mais un compteur de temps se mettra en place avant le prochain changement chaque changement demandera de plus en plus de temps avant reinitialisation du compteur
        public function setIdRace($idRace){
            $this->idRace = $idRace;
        }

		public function insertPlayer(/*$firstName,  $userName, $mail,*/){

            $Bdd =  BddManager::getBdd();
            
            $req = $Bdd->prepare('INSERT INTO membre(pseudo,mail,pass,id_access,id_race)
                                        VALUES (:pseudo,:mail,:pass,:idAccess,:idRace)');
            
            $req->execute(array(
 
                'pseudo' => $this->getPseudo(),
                'mail' => $this->getMail(),
                'idAccess' => $this->getIdAccess(),
                'pass' => $this->getPass(),
                'idRace' => $this->getIdRace() 
                
            ));
            
            $req->closeCursor();
            
            unset($Bdd);
            
            return true;
		}

		/**
		 * Get String player race
		 */
		public static function getRaceNameById($id){

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

		public static function getIdRaceByIdPlayer($id){

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

		public static function getUserId($mail)
        {
            
            $bdd =  BddManager::getBdd();
            
            $req = $bdd->prepare('SELECT id FROM membre WHERE mail= :mail');
            $req->execute(array(
            
                'mail' => $mail
                
            ));
            
            $result = $req->fetch();
            $userId = $result['id'];
            var_dump($userId);
            //$userId = $result['id'];

            $req->closeCursor();
            
            unset($bdd);
            
            return $userId;
        }

        public static function getAllUserInfosByIdPlayer($idUser){
            $bdd = BddManager::getBdd();
				
            $req= $bdd->prepare('SELECT * FROM membre WHERE id = :id');
            $req->execute(array(
            'id' => $idUser
            ));
            
            $informationsUser = $req->fetch();
            
            $req->closeCursor();
            unset($req);

            return $informationsUser;
        }

        public static function getAllUserInfosByPseudo($pseudo){
            $bdd = BddManager::getBdd();
            // es ce le pseudo qui est mauvais ?
            $reqAllUserInfosByPseudo = $bdd->prepare('SELECT * FROM membre WHERE  pseudo = :pseudo');
            $reqAllUserInfosByPseudo->execute(array(
            'pseudo' => $pseudo				 
            ));
            
            $result = $reqAllUserInfosByPseudo->fetch();
            
            $reqAllUserInfosByPseudo->closeCursor();

            unset($req);

            return $result;
        }
	}