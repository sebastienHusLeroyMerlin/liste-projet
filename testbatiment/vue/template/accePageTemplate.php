<?php
	
	if(!isset($_SESSION))
		session_start();
	
	if(isset($_SESSION['Auth']) AND $_SESSION['Auth'] == true)
	{

        require_once('vue/'.$destination.'php');
				
	}
	else
	{
        // a remettre en evidence
		echo'Dis t\'essairais pas de me hacker petit malin ? </br>
			Si tu veux jouer inscrits toi ';?><a href="inscription.php">ICI</a><?php
			
            //header('Refresh:3;connexion.php');
            require('vue\connexion.php');
	}

?>