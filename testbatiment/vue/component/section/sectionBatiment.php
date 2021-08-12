<section class="conteneurBatiment" >

    <?php 
        if(isset($_SESSION['message']))
		{
			?>
			
            <div class="message">
				<p>
					<?= $_SESSION['message'] ; ?>
											
				</p>
			</div>
		    
            <?php
		}
		unset($_SESSION['message']) ;						
	?>
							
	<div class="encadreGeneral"><!-- Ne devra pas etre visible  -->
							
		<h3>Couveuse Niv <?php echo $_SESSION['niveauCouveuse']; ?> </h3>
							
		<div class="encadrePhoto" title="couveuse"><!-- contient la photo et le cout en ressource du batiment  -->
						
			<img src="asset/image/couveuse.png" title="couveuse" alt="couveuse" class="img"/>
								
			<h3>Coût pour le Niv <?php $nSup = $resultatInfoAffichage['couveuse']+1; echo $nSup ;?> </h3>
								
			<p>
								
				<?php
					$boisCouveuse = prixNiveauSup($nSup,$boisCouveuse,4);
					$cireCouveuse = prixNiveauSup($nSup,$cireCouveuse,4);
					$eauCouveuse = prixNiveauSup($nSup,$eauCouveuse,4);
										
					$_SESSION['boisCouveuse'] = $boisCouveuse ;
					$_SESSION['cireCouveuse'] = $cireCouveuse ;
					$_SESSION['eauCouveuse'] = $eauCouveuse ;
										
										
					echo 	'Bois</br>'.$boisCouveuse.'</br></br>'.
							'Cire</br>'.$cireCouveuse.'</br></br>'.
							'Eau</br>'.$eauCouveuse.'</br></br>'.
							'Durée</br>'.$dureeConstructionCouveuse ;
				?>
									
			</p>
											
		</div>
							
		<form method="post" action="../model/traitementConstructionBatiment.php" >
							
	    	<input type="hidden" name="nomBatiment" id="nomBatiment" value="<?php echo 'couveuse'; ?>"/>
							
			<input type="submit" value="Lancer la construction" />
							
		</form>
						
	</div>
					
</section>