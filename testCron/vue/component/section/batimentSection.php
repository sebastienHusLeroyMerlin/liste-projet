<section class="conteneurBatiment" >

	<?php 
		require_once('alerteMessage.php');

		//require_once('../controleur/batimentControleur.php');

		require_once('../modele/manager/BatimentManager.php');
	?>
							
	<!-- <div class="encadreGeneral">Ne devra pas etre visible  -->

		<?php // affichage des batiments ;
			//TODO gerer la recuperation de l id de la colonie active
			$listBatimentByTypeByColo = BatimentManager::getBuildingByColony(18,$_SESSION['id_joueur']);
			//var_dump($listBatiment);

			$listTypeBat = BatimentManager::getTypeBat();

			foreach($listTypeBat as $typeBat)
			{
				?>
				<div class="batCivil subdivisionBat">

					<h2><?= ucfirst($typeBat['type_bat']) ; ?></h2>

					<div class = "posVignette">

						<?php

							foreach ($listBatimentByTypeByColo as $batiment) {

								if ($batiment['type_bat'] == $typeBat['type_bat'])
								{
									$batimentSerialized = serialize($batiment);
									require('../vue/component/vignetteBatiment.php');
									
								}

							}

						?>

					</div>

				</div>
				
				<?php
			}

		?>
						
	<!-- </div> -->
					
</section>