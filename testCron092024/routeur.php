<?php
	
	if(!isset($_SESSION))
		session_start();
	//var_dump($_SESSION);
	if(isset($_SESSION['Auth']) AND $_SESSION['Auth'] == true /*isset($_SESSION['mail']) AND isset($_SESSION['droit']) AND isset($_SESSION['pass'])*/)
	{
		if(!empty($_SESSION['destination']))
		{
			$destination = $_SESSION['destination'];
			unset($_SESSION['destination']); 
		}
		else
			if(!empty($_GET['destination']))
			{
				$destination = $_GET['destination'];

			}else
				$destination = 'accueil';


		//var_dump($_SESSION);
		var_dump($destination);
		//var_dump($_SESSION);

        require_once('../vue/'.$destination.'.php');
		
	}
	else
	{
		if(!empty($_POST)){
			require_once('controleurConnexion.php');
			exit;
		}
		else{
			header('Location:../vue/connexion.php');
		}
        // a remettre en evidence
		echo'Dis t\'essairais pas de me hacker petit malin ? </br>
			Si tu veux jouer inscrits toi ';?><a href="inscription.php">ICI</a><?php
 
	}

?>