<?php

    // require_once('/var/www/krakatopoulpiz/modele/constante.php');
    require_once('C:\wamp64\www\PHP\liste-projet\testCron/modele/constante.php');

    class BddManager{

        public static function getBdd(){

            try
			{
				$bdd = new PDO(
                    'mysql:host=' . HOST . 
                    ';dbname=' . DB_NAME . 
                    ';charset=utf8',
                    LOGIN_BDD,
                    PASS_BDD,
				    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}

			return $bdd;

		}

    }