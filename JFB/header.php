<header>

	<div id="entete">
	
		<a  href="accueilPublique.php" ><img src="image/jardins_familiaux.jpg" title="Logo Jardins Familiaux de Bondues" alt="Terre"/></a>
					
		<h1><?php echo $titre ; ?></h1>
	
	</div>
	
	
	
		<form method="post" action="verification.php" id="connexionBarre">
		
		<a id="aBarre" href="inscription.php" >Inscription</a>
		
		<div id="divConnexionBarre">
		
			<!--<label for="pseudo" > Pseudo : </label>-->
			<input type="text" placeholder="Votre pseudo ICI" name="pseudo" id="pseudo" /><br/>
						
			<!--<label for="pass" >Mot de passe: </label>-->
			<input type="password" placeholder="Votre mot de passe ICI" name="pass" id="pass" /><br/>
										
			<br/><input type="submit"  id="buttonValidationBarreConnexion" value=" Connexion "/>
			
			<a href="mailto:hus.sebastien@gmail.com">Sebastien</a>
			
		</div>
		
		
		</form>
	
	
</header>