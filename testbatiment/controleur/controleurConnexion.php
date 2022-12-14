<?php

	require_once('../model/manager/UserManager.php');
	require_once('../model/manager/ToolsManager.php');
	
	if(isset($_POST['pseudo']) And isset($_POST['pass']))
	{
		if(!empty($_POST['pseudo']) And !empty($_POST['pass']))
		{
			$_POST['pseudo'] = ToolsManager::validData($_POST['pseudo']);
			$_POST['pass'] = ToolsManager::validData($_POST['pass']);
			
			
			$auth = UserManager::Auth();
			if($auth == true)
				header('Location:../controleur/routeur.php');
			
		}
		elseif(empty($_POST['pseudo']) OR empty($_POST['pass']))
		{
			if(!empty($_POST['pseudo']) AND empty($_POST['pass']))
			{
				echo 'Vous n\'avez pas renseigné votre motde de passe ! ';
				
			}
			elseif(empty($_POST['pseudo']) AND !empty($_POST['pass']))
			{
				echo 'Vous n\'avez pas renseigné votre pseudo ! ';
			}
			elseif(empty($_POST['pseudo']) AND empty($_POST['pass']))
			{
				echo 'Vous n\'avez renseigné ni votre motde de passe, ni votre pseudo ! ';
			}
			else
			{
				echo' Erreur : 5 ' ;
			}
		}
		else
		{
			echo 'Erreur : 2 ' ;
		}
	}
	elseif(!isset($_POST['pseudo']) OR !isset($_POST['pass']))
	{
		$_POST['pseudo'] = null ;
		$_POST['pass'] = null ;
	}
	else
	{
		echo 'Erreur : 1 ';
	}

