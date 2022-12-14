<?php
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
        $this->mail = $pseudo . '@gmail.com';//tempo
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

}