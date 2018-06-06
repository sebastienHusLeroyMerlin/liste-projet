<div id="central">

		<h2>Inscription</h2>
				
		<form method="post" action="traitementInscription.php">
		
			<div id="miseEnPageFormulaire">
			
				<fieldset id="infoCo">
					<legend>Informations de connexion</legend>
			
					<p>Souhaitez vous utiliser un pseudonyme pour votre connexion ?</p>
					<label for="oui">Ou</label>i<input type="radio" name="questionPseudo"  id="oui" value="oui" checked />
					<label for="non">Non</label><input type="radio" name="questionPseudo"  id="non" value="non"/><br/><br/>
					
					<label for="pseudo">Pseudonyme : </label><br/>
					<input type="text" name="pseudo" id="pseudo" placeholder="Tapez votre pseudo ICI"/><br/><br/>
					
					<label for="pass" >Mot de passe : </label><br/>
					<input type="password" name="pass" id="pass" placeholder="Tapez votre Mot de passe ICI"  /><br/><br/>
					
					<label for="confirmPass" >Confirmation du mot de passe : </label><br/>
					<input type="password" name="confirmPass" id="confirmPass" placeholder="Re tapez votre Mot de passe ICI"  /><br/><br/>
					
				</fieldset>
				
				<fieldset id="infoPerso">
					<legend>Informations Personnelles</legend>
				
					<br/><label for="nom" >Nom : </label><br/>
					<input type="text" name="nom" id="nom" placeholder="Tapez votre nom ICI"  /><br/><br/>
					
					<label for="prenom" >Prénom : </label><br/>
					<input type="text" name="prenom" id="prenom" placeholder="Tapez votre prenom ICI"  /><br/><br/>
					
					<label for="mail" >E-mail : </label><br/>
					<input type="email" name="mail" id="mail" placeholder="Tapez votre e-mail ICI"  /><br/><br/>
					
					<label for="tel" >Téléphone : </label><br/>
					<input type="text" name="tel" id="tel" placeholder="00.00.00.00.00"  /><br/><br/>
					
				</fieldset>
				
				<fieldset id="adresse">
					<legend>Adresse</legend>
				
					<br/><label for="rue" >Rue : </label><br/>
					<input type="text" name="rue" id="rue" placeholder="Tapez le nom de votre rue"  /><br/><br/>
					
					<label for="numero" >Numero : </label><br/>
					<input type="text" name="numero" id="numero" placeholder="Tapez le numéro de votre habitation"  /><br/><br/>
					
					<label for="ville" >Ville : </label><br/>
					<input type="ville" name="ville" id="ville" placeholder="Tapez le nom de votre ville"  /><br/><br/>
					
					<label for="codePostale" >Code postale : </label><br/>
					<input type="text" name="codePostale" id="codePostale" placeholder="Tapez le code postale de votre ville"  /><br/><br/>
					
				</fieldset>
				
			</div>
			
			<fieldset>
				<legend>Informations facultatives</legend>
				
					<br/><label for="anniv" >Date d'anniversaire : </label><input type="date" name="anniv" id="anniv"  /><br/><br/>
				
			</fieldset>
			
			<br/><input type="checkbox" name="reglement" id="reglement" required />
			<label for="reglement">J'accepte le <a href="" >règlement de fonctionnement </a>des Jardins Familiaux de Bondues</label><br/>

			<br/><input type="submit" class="buttonValidation" value="Inscription"/>
			
		</form>
		
		<h3>Note : </h3>
		
		<p>Toutes les informations demandées ne servent et ne serviront qu'à l'usage exclusif de notre association.<br/>
		Par conséquent elle ne seront ni transmisent ni vendues à des sites tiers.</p>
				
</div>