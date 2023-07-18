<!DOCTYPE html>

<html>

	<?php require_once('../vue/component/head.php'); ?>
	
	<body>
	
		<h1>Connexion</h1>
		<!--../controleur/controleurConnexion.php-->
		<form method='post' action='../controleur/routeur.php' >
		
			<label for="pseudo">Pseudo : <label><input type="text" name="pseudo" id="pseudo" placeholder="Entrez vôtre pseudo ICI" title="Entrez vôtre pseudo ICI" /></br>
								
			<label for="pass">Mot de passe : <label><input type="password" name="pass" id="pass" placeholder="Entrez vôtre mot de passe ICI" title="Entrez vôtre mot de passe ICI" /></br>
								
			</br>
			
			<input type="submit" value="Connexion" /></br>
			
		</form>
		
		</br>
		
		<a href="inscription.php" >Inscription</a>
	
	</body>
	
</html>