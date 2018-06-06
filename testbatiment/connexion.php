<?php

	if(isset($_POST['pseudo']) And isset($_POST['pass']))
	{
		if(!empty($_POST['pseudo']) And !empty($_POST['pass']))
		{
			$_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
			$_POST['pass'] = htmlspecialchars($_POST['pass']);
			
			//connection a la bdd
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=batiment;charset=utf8','root','',
				array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
			
			$reqConnexion = $bdd->prepare('SELECT id FROM membre WHERE pass = :pass AND pseudo = :pseudo');
			$reqConnexion->execute(array(
			'pseudo' => $_POST['pseudo'],
			'pass' => $_POST['pass'] 
			));
			
			$resultatConnexion = $reqConnexion->fetch();
									
			$reqConnexion->closeCursor();
			
			if(isset($resultatConnexion))
			{
				session_start();
				
				$req= $bdd->prepare('SELECT * FROM membre WHERE id = :id');
				$req->execute(array(
				'id' => $resultatConnexion['id']
				));
				
				$variableDeSession = $req->fetch();
				
				
				
				$req->closeCursor();
				
				$_SESSION['pseudo'] = $variableDeSession['pseudo'] ;
				$_SESSION['pass'] = $variableDeSession['pass'] ;
				$_SESSION['mail'] = $variableDeSession['mail'] ;
				$_SESSION['droit'] = $variableDeSession['droit'] ;
				$_SESSION['id_joueur'] = $resultatConnexion['id'] ;
				
				header('Location:accueil.php');
			}
			elseif(!isset($resultat))
			{
				// es ce le pseudo qui est mauvais ?
				$reqRecherchePseudo = $bdd->prepare('SELECT pseudo FROM membre WHERE  pseudo = :pseudo');
				$reqRecherchePseudo->execute(array(
				'pseudo' => $_POST['pseudo']				 
				));
				
				$resultatRecherchePseudo = $reqRecherchePseudo->fetch();
				
				$reqRecherchePseudo->closeCursor();
				
				if(!isset($resultatRecherchePseudo))
				{
					echo 'Votre pseudo est Inconnu !!' ;
				}
				else
				{
					echo 'Votre mot de passe est invalide !!' ;
				}
				
			}
			else
			{
				echo 'Erreur : 3 ';
			}
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

?>

<!DOCTYPE html>

<html>

	<?php include('head.php'); ?>
	
	<body>
	
		<h1>Connexion au blog</h1>
		
		<form method="post" action="connexion.php" >
		
			<label for="pseudo">Pseudo : <label><input type="text" name="pseudo" id="pseudo" placeholder="Entrez vôtre pseudo ICI" title="Entrez vôtre pseudo ICI" /></br>
								
			<label for="pass">Mot de passe : <label><input type="text" name="pass" id="pass" placeholder="Entrez vôtre mot de passe ICI" title="Entrez vôtre mot de passe ICI" /></br>
								
			</br>
			
			<input type="submit" value="Connexion" /></br>
			
		</form>
		
		</br>
		
		<a href="inscription.php" >Inscription</a>
	
	</body>
	
</html>