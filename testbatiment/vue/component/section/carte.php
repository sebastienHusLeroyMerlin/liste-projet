<?php 
		require_once('../model/constante.php');
?>

<div class="carre">
			<div class="content">
				<?php
//TODO a exporter dans une fonction si possible 

					$nbTilePerLigne =  X_VUE;
					$nbLigne = X_VUE;

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