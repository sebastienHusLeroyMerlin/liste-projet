<?php

require_once('BddManager.php');

    class ColonieManager{

        protected $couveuse;
        protected $solarium;
        protected $idJoueur;

        public function __construct()
        {
            $this->couveuse = 0;
            $this->solarium = 0;
        }

        public function attributeColonie($objectPlayer){
            $playerMail = $objectPlayer->getMail();
            $playerId = $objectPlayer->getUserId($playerMail);
            var_dump($objectPlayer->getMail());
            var_dump($objectPlayer->getUserId($playerMail));
            var_dump($playerId);
            $Bdd =  BddManager::getBdd();
            
            $reqInsertColonie = $Bdd->prepare('INSERT INTO membre(couveuse,solarium,pass,id_joueur)
                                        VALUES (:couveuse,:solarium,:id_joueur)');
            
            $reqInsertColonie->execute(array(
 
                'couveuse' => $this->couveuse,
                'solarium' => $this->solarium,
                'id_joueur' => $playerId
                
            ));
            
            $reqInsertColonie->closeCursor();
            
            unset($Bdd);
            
            return true;
        }


    }