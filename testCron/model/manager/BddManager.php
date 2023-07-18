<?php

    require_once('D:\wamp64\www\Worspace_Generale\Workspace_PHP\tempo\liste-projet\testCron\model\constante.php');

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