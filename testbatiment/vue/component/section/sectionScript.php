<section class="conteneurBatiment" >

	<?php 
		require_once('alerteMessage.php');
	?>
							
	<div class="encadreGeneral">--><!-- Ne devra pas etre visible  -->
							
    	<h3>Test de script</h3>
		
		<div class="carre">
			<div class="content">
				<?php
					//require_once('../model/traitementRemplissageCarte.php');
					///require_once('../controleur/remplissageCarteControleur.php');
					//require_once('../controleur/controleurTest.php');
					$nbTilePerLigne = 7 ;
					$nbLigne = 7;

					//Nombre de lignes
					for ($i=0; $i < $nbLigne ; $i++) { 

						if($i % 2 > 0){
							?>
								<div class="impair ligne">
							<?php
						}
						else{
							?>
								<div class="pair ligne">
							<?php
						}
				
						// nombre de tuile par ligne
						for ($j=0; $j < $nbTilePerLigne ; $j++) { 
							?>
								<div class="hexagon"></div>
							<?php
						}

						?>

							</div>

						<?php

					}
				?>
			</div>
		</div>
       		
	</div>
					
</section>