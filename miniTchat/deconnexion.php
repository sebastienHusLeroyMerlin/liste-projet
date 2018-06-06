<?php

	session_start();
	
	session_unset() ;
	
	session_destroy();
	
	
	echo 'A bientôt pour de nouvelles conversations ';
	
	header('Refresh:5;accueil.php');

