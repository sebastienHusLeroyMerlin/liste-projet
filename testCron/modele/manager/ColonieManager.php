<?php

require_once('BddManager.php');

class ColonieManager{
    protected $couveuse;
    protected $solarium;
    protected $idJoueur;

    public function setIdPlayer($idPlayer){
        $this->idJoueur = $idPlayer;
    }

    public function __construct()
    {
        $this->couveuse = 0;
        $this->solarium = 0;
    }

    public function attributeColonie($objectPlayer){
        $playerMail = $objectPlayer->getMail();
        $playerId = UserManager::getUserId($playerMail);

        var_dump($objectPlayer->getMail());
        var_dump($objectPlayer->getUserId($playerMail));
        var_dump($playerId);
        $Bdd =  BddManager::getBdd();
        
        $reqInsertColonie = $Bdd->prepare('INSERT INTO colonie(couveuse,solarium,id_joueur,last_activ_colo)
                                    VALUES (:couveuse,:solarium,:id_joueur,:last_activ_colo)');
        
        $reqInsertColonie->execute(array(

            'couveuse' => $this->couveuse,
            'solarium' => $this->solarium,
            'id_joueur' => $playerId,
            'last_activ_colo' => 'true'
            
        ));
        
        $reqInsertColonie->closeCursor();
        
        unset($Bdd);
        
        return true;
    }

    public static function getInfosLastActivColoByIdPlayer($idPlayer){
        $Bdd =  BddManager::getBdd();
        
        $reqGetInfoLastActivColo = $Bdd->prepare('SELECT * FROM colonie WHERE id_joueur = :idPlayer and last_activ_colo = true');
        $reqGetInfoLastActivColo->execute(array(

            'idPlayer' => $idPlayer
            
        ));

        $infosLastActivColo = $reqGetInfoLastActivColo->fetch();
        
        $reqGetInfoLastActivColo->closeCursor();
        
        unset($Bdd);
        
        return $infosLastActivColo;
    }

    public static function getIdColoByIdPlayer($idPlayer){
        $Bdd =  BddManager::getBdd();
        
        $reqGetInfoLastActivColo = $Bdd->prepare('SELECT id FROM colonie WHERE id_joueur = :idPlayer and last_activ_colo = true');
        $reqGetInfoLastActivColo->execute(array(

            'idPlayer' => $idPlayer
            
        ));

        $infosLastActivColo = $reqGetInfoLastActivColo->fetch();
        
        $reqGetInfoLastActivColo->closeCursor();
        
        unset($Bdd);
        
        return $infosLastActivColo[0];
    }

}