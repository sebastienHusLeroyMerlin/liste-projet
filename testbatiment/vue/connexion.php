<!DOCTYPE html>

<html>

	<?php include('component/head.php'); ?>
	
	<body>
	
		<h1>Connexion</h1>
		
		<form method='post' action='controleur/controleurConnexion.php' >
		
			<label for="pseudo">Pseudo : <label><input type="text" name="pseudo" id="pseudo" placeholder="Entrez vôtre pseudo ICI" title="Entrez vôtre pseudo ICI" /></br>
								
			<label for="pass">Mot de passe : <label><input type="text" name="pass" id="pass" placeholder="Entrez vôtre mot de passe ICI" title="Entrez vôtre mot de passe ICI" /></br>
								
			</br>
			
			<input type="submit" value="Connexion" /></br>
			
		</form>
		
		</br>
		
		<a href="inscription.php" >Inscription</a>
	
	</body>
	
</html>