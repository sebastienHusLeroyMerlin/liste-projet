<?php

session_start();
	
if(isset($_SESSION['Auth']) AND $_SESSION['Auth'] == true)
{

	/* tester avant que la session ne soit detruite d afficher le nom de l utilisateur*/
	$heure = date('H');
		
	if($heure >= 6 AND $heure < 12)
	{
		$reponse = 'Aurevoir '.$_SESSION['pseudo'].' bonne matinée ';
	}
	elseif($heure >= 12 AND $heure < 14)
	{
		$reponse = 'Aurevoir '.$_SESSION['pseudo'].' bon appétit ';
	}
	elseif($heure >= 14 AND $heure < 16)
	{
		$reponse = 'Aurevoir '.$_SESSION['pseudo'].' bon après midi ';
	}
	elseif($heure >= 16 AND $heure < 18)
	{
		$reponse = 'Aurevoir '.$_SESSION['pseudo'].' bonne fin d\'après midi ';
	}
	elseif($heure >= 18 AND $heure < 21)
	{
		$reponse = 'Aurevoir '.$_SESSION['pseudo'].' bonne soirée ';
	}
	elseif($heure >= 21 AND $heure < 23)
	{
		$reponse = 'Aurevoir '.$_SESSION['pseudo'].' bonne fin de soirée ';
	}
	else
	{
		$reponse = 'Bonne nuit  '.$_SESSION['pseudo'];
	}
	
	session_unset();
	
	session_destroy();


	header('Refresh:4;../controleur/routeur.php');
	
}
else
{
	echo'Dis t\'essairais pas de me hacker petit malin ? </br>
		Si tu veux jouer inscrits toi ';?><a href="inscription.php">ICI</a><?php
		
		header('Refresh:3;connexion.php');
}