<?php

    Class Bdd{

        public static function getBdd(){

            try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=batiment;charset=utf8','root','',
				array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}

			return $bdd;

		}
		
		

    }