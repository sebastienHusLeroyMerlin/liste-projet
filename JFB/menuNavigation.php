<div id="navigation">
				
		<article>
					
			<h1>Météo</h1>
			
			<?php include ('widget/widgetMeteo.php') ;?>
			
			<a href="http://www.lameteo.org/index.php/previsions-meteo/tendances-saisonnieres" target="_blank" name="tendanceSaisoniere" id="tendanceSaisoniere"  title="Vous trouverez ici toutes les tendance météo de l'année <?php echo  $date = date('Y') ; ?>" >Tendance saisonière <?php echo  $date ; ?></a>
					
		</article>
				
		<nav>

			<a href="accueilPublique.php" name="accueil" id="accueil" class="button" title="Retour à l'accueil">Accueil</a>
			
			<a href="" name="forum" id="forum" class="button" >Forum</a>
			
			<a href="" name="reglement" id="reglement" class="button" >Réglement</a> 
			
			<a href="compteRendus.php" name="compteRendus" id="compteRendus" class="button" >Compte rendus</a> 
			
			<a href="" name="adhesionRenouvellement" id="adhesionRenouvellement" class="button" >Adhésion / Renouvellement</a>


		</nav>
				
</div>