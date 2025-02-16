<div class="conteneurRessource">

	<?php //var_dump($_SESSION); ?>

	<div class="entrepot">

		<div class="ressource">
							
			<p>Bois :</br><?php echo $_SESSION['bois'] ; ?></p>
							
		</div>
							
		<div class="ressource">
							
			<p>Feuille :</br><?php echo $_SESSION['feuille'] ; ?></p>
							
		</div>
		
		<div class="ressource">
							
			<p>Argile :</br><?php echo $_SESSION['argile'] ; ?></p>
							
		</div>

		<div class="ressource">
							
			<p>Pierre :</br><?php echo $_SESSION['pierre'] ; ?></p>
							
		</div>

		<div class="ressource">
							
			<p>Terre :</br><?php echo $_SESSION['terre'] ; ?></p>
							
		</div>

		<div class="ressource">
							
			<p>Liege :</br><?php echo $_SESSION['liege'] ; ?></p>
							
		</div>

		<div class="ressource">
							
			<p>Pierre Brute :</br><?php echo $_SESSION['pierre_brute'] ; ?></p>
							
		</div>

	</div>

	<!-- -->

	<div class="coffre">
							
		<div class="ressource">
							
			<!-- destiné a accueillir les pierres précieuses -->
			<p>Saphir :</br><?php echo $_SESSION['saphir'] ; ?></p>
							
		</div>

		<div class="ressource">
							
			<!-- destiné a accueillir les pierres précieuses -->
			<p>Rubis :</br><?php echo $_SESSION['rubis'] ; ?></p>
							
		</div>

		<div class="ressource">
							
			<!-- destiné a accueillir les pierres précieuses -->
			<p>Amethyste :</br><?php echo $_SESSION['amethyste'] ; ?></p>
							
		</div>

		<div class="ressource">
							
			<!-- destiné a accueillir les pierres précieuses -->
			<p>Emeraude :</br><?php echo $_SESSION['emeraude'] ; ?></p>
							
		</div>

		<div class="ressource">
							
			<!-- destiné a accueillir les pierres précieuses -->
			<p>Diammant Noir :</br><?php echo $_SESSION['diamant_n'] ; ?></p>
							
		</div>

		<div class="ressource">
							
			<!-- destiné a accueillir les pierres précieuses -->
			<p>Diamant Blanc :</br><?php echo $_SESSION['diamant_b'] ; ?></p>
							
		</div>

	</div>

	<!-- --->

	<div class="grenier">

		<div class="ressource">
							
			<p>Miel :</br><?php echo $_SESSION['nourriture_abeille'] ; ?></p>
							
		</div>

		<div class="ressource">
							
			<p>Graine :</br><?php echo $_SESSION['nourriture_fourmis'] ; ?></p>
							
		</div>

		<div class="ressource">
							
			<p>Champignon :</br><?php echo $_SESSION['nourriture_termite'] ; ?></p>
							
		</div>

		<div class="ressource">
							
			<p>Puceron :</br><?php echo $_SESSION['nourriture_arraigne'] ; ?></p>
							
		</div>

		<div class="ressource">
							
			<p>Moucheron :</br><?php echo $_SESSION['nourriture_frelon'] ; ?></p>
							
		</div>

		<div class="ressource">
							
			<p>Vers :</br><?php echo $_SESSION['nourriture_v_luisant'] ; ?></p>
							
		</div>

	</div>
					
	<!-- --->
	

	<div class="mateiaux-rare">
							
		<div class="ressource">
							
			<p>Cire :</br><?php echo $_SESSION['cire'] ; ?></p>
											
		</div>

		<div class="ressource">
							
			<p>Soie :</br><?php echo $_SESSION['soie'] ; ?></p>
											
		</div>

		<div class="ressource">
							
			<p>Feutre :</br><?php echo $_SESSION['feutre'] ; ?></p>
											
		</div>

		<div class="ressource">
							
			<p>Carton :</br><?php echo $_SESSION['carton'] ; ?></p>
											
		</div>

		<div class="ressource">
							
			<p>Cocon :</br><?php echo $_SESSION['cocon'] ; ?></p>
											
		</div>

		<div class="ressource">
							
			<p>Segment luminescent :</br><?php echo $_SESSION['segment_l'] ; ?></p>
											
		</div>

	</div>

	<!-- -->

	<div class="reservoir">
							
		<div class="ressource">
							
			<p>Eau :</br><?php echo $_SESSION['eau'] ; ?></p>
											
		</div>

		<div class="ressource">
							
			<p>Mielat :</br><?php echo $_SESSION['mielat'] ; ?></p>
											
		</div>

	</div>
	
	
						
</div>

<form action="../modele/traitementIncrementation.php" method="post" >
	<!--<form action="../modele/cron/cronRessource.php" method="post" >-->
	
		<input type="hidden" name="incremente" id="incremente" value="incremente"/>
		<input type="hidden" name="localisation" id="localisation" value="<?php echo $localisation ; ?>"/>
		<input type="submit" value="Incrementer"  />
		
		<?php var_dump($localisation ); ?>
		
	</form>