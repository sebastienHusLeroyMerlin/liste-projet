<?php

	session_start();
	
	if(isset($_SESSION['pseudo']) AND isset($_SESSION['pass']))
	{
		//connexion a la bdd
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=minitchat;charset=utf8','root','',
			array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
				
		if(isset($_POST['message'])AND !empty($_POST['message']))
		{
			
		$_SESSION['pseudo'] = $_POST['pseudo'];

				//requête à effectuer ( entrer le message saisie)
				// passe par requete preparer pour securiser
				
				$req = $bdd->prepare('INSERT INTO tchat(message,pseudo) VALUES(:message,:pseudo)');
				$req->execute(array(
				'pseudo' => $_POST['pseudo'],
				'message' =>$_POST['message'] 
				));
				
				$req->closeCursor();
			
		}
		
 	
		?>
			<!DOCTYPE html>

			<html>

				<head>
				
					<meta charset="utf-8" />
					<title>TP : Mini-Tchat</title>
				
				</head>
				
				<body>
				
					<h1>Mini-Tchat</h1>
					
					<form method="post" action="miniTchat.php">
					
						<input type="text" value="<?php echo $_SESSION['pseudo'] ; ?>" name="pseudo" id="pseudo" />
						
						<input type="text" placeholder="Tapez vôtre texte ICI" title="Tapez vôtre texte ICI" name="message" id="message" />
						
						<input type="submit" value="Envoyer" />
					
					</form>
					
					</br>
					
					<?php
					
						$req = $bdd->query('SELECT * FROM tchat ORDER BY id DESC LIMIT 0,10 ');
						
						while($resultat = $req->fetch())
						{
							echo $resultat['date'].' '.$resultat['pseudo'].' : '.$resultat['message'].'</br>';
						}
						
						$req->closeCursor() ;
					?>
					
					</br>
					</br>
					
					<a href="deconnexion.php">Deconnexion</a>
				
				</body>
				
			</html>
		<?php
	}
	else
	{
		echo'Dis t\'essairais pas de me hacker petit malin ? </br>
			Si tu veux jouer inscrits toi ';?><a href="inscription.php">ICI</a><?php
			
			header('Refresh:3;accueil.php');
	}
	

?>


