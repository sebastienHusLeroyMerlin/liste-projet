<div class="conteneurRessource">

	<?php //var_dump($_SESSION); ?>
					
	<div class="ressource">
						
		<p>Bois :</br><?php echo $_SESSION['bois_total'] ; ?></p>
						
	</div>
						
	<div class="ressource">
						
		<p>Cire :</br><?php echo $_SESSION['cire_total'] ; ?></p>
						
	</div>
						
	<div class="ressource">
						
		<p>Eau :</br><?php echo $_SESSION['eau_total'] ; ?></p>
						
	</div>
	
	<div class="ressource">
						
		<p>Argile :</br><?php echo $_SESSION['argile_total'] ; ?></p>
						
	</div>
	
	<div class="ressource">
						
		<p>Miel :</br><?php echo $_SESSION['nourriture_total'] ; ?></p>
						
	</div>
	
	
	
	<form action="../model/traitementIncrementation.php" method="post" >
	
		<input type="hidden" name="incremente" id="incremente" value="incremente"/>
		<input type="hidden" name="localisation" id="localisation" value="<?php echo $localisation ; ?>"/>
		<input type="submit" value="Incrementer"  />
		
		<?php var_dump($localisation ); ?>
		
	</form>
						
</div>