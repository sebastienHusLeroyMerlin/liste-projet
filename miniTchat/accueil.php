<?php

	if(isset($_POST['pseudo']) AND isset($_POST['pass']))
	{
		
		if(!empty($_POST['pseudo']) AND !empty($_POST['pass']))
		{
			//connection a la bdd
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=minitchat;charset=utf8','root','',
					array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
				}
				catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				}
				
			
			
			$req = $bdd->prepare('SELECT id FROM membre WHERE pseudo = :pseudo AND pass = :pass');
			$req->execute(array(
			'pseudo' => $_POST['pseudo'],
			'pass' => $_POST['pass']
			));
			
			$resultat = $req->fetch();
			
			$req->closeCursor();
			
			if($resultat)
			{
				session_start();
				
				$_SESSION['pass']= $_POST['pass'] ;
				$_SESSION['pseudo']= $_POST['pseudo'] ;
				
				var_dump($resultat);
				var_dump($resultat['id']);
				var_dump($resultat['pseudo']);
				var_dump($resultat['pass']);
				
				header('Location:miniTchat.php');
			}
			else
			{
				echo 'Identifiant inconnus veuillez entrer des identifiants valides </br>
				Ou inscrivez vous ';?><a href="inscription.php">ICI</a><?php
			}
		}
		elseif(empty($_POST['pseudo']) AND !empty($_POST['pass']))
		{
			echo 'Vous avez oublié de renseigner vôtre Pseudo !';
		}
		elseif(!empty($_POST['pseudo']) AND empty($_POST['pass']))
		{
			echo 'Vous avez oublié de renseigner vôtre Mot de passe !';
		}
		elseif(empty($_POST['pseudo']) AND empty($_POST['pass']))
		{
			echo 'Veuillez indiquer vos identifiant avant de vous connecter !';
		}
		else
		{
			echo 'Erreur : 2 ';
		}
	}
	elseif(!isset($_POST['pseudo']) Or !isset($_POST['pass']))
	{
		$_POST['pseudo'] = null ;
		$_POST['pass'] = null ;
	}
	else
	{
		echo 'Erreur : 1 ';
	}

?>

<!DOCTYPE html>

<html>

	<head>
	
		<meta charset="utf-8" />
		<title>TP : Accueil Mini-Tchat</title>
	
	</head>
	
	<body>
	
		<h1>Accueil mini-Tchat</h1>
		
		<form method="post" action="accueil.php" >
		
			<label for="pseudo">Pseudo : <label><input type="text" name="pseudo" id="pseudo" placeholder="Entrez vôtre pseudo ICI" title="Entrez vôtre pseudo ICI" /></br>
								
			<label for="pass">Mot de passe : <label><input type="text" name="pass" id="pass" placeholder="Entrez vôtre mot de passe ICI" title="Entrez vôtre mot de passe ICI" /></br>
								
			</br>
			
			<input type="submit" value="Connexion" /></br>
			
		</form>
		
		</br>
		
		<a href="inscription.php" >Inscription</a>
	
	</body>
	
</html>