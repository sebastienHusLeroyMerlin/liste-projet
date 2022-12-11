<?php 
		require_once('../model/constante.php');

		//tempo
		require_once('../model/Bdd.php');
		require_once('../model/WorldMap.php');
?>

<div class="carre">
			<div class="content">
				<?php
//TODO a exporter dans une fonction si possible 
// id_colonie recuperer dans une variable de session
$xColo = 3;
$yColo = 4;

$xArrayIntervals = WorldMap::determineViewInterval($xColo);
$xIntervalMin = $xArrayIntervals['intervalMin'];


$yArrayIntervals = WorldMap::determineViewInterval($yColo);
$yIntervalMin = $yArrayIntervals['intervalMin'];


/*

$yInterval = (Y_VUE - 1) / 2;
$yIntervalMin = $yColo - $yInterval;
$yIntervalMax = $yColo + $yInterval;*/

					$nbTilePerLigne =  X_VUE;
					$nbLigne = X_VUE;

					//Nombre de lignes
					for ($y=0; $y < $nbLigne ; $y++) { 

						$yPos = $yIntervalMin + $y ;

						if($y % 2 > 0){
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
						for ($x=0; $x < $nbTilePerLigne ; $x++) { 

							$xPos = $xIntervalMin + $x;

							//requete pour recup le biome et l inserer en tan que classe
							$bdd = Bdd::getBdd();
							//todo revoir la requete + nom requete ect 
							$reqGetTile = $bdd->prepare('SELECT b.name 
															FROM  world_map w 
															INNER JOIN biome b ON b.id = w.id_biome
															WHERE  w.' . X_POS . ' = :xPos and w.' . Y_POS . ' = :yPos');
							$reqGetTile->execute(array(
								'xPos' => $xPos,
								'yPos' => $yPos   
							));

							$classBiome = $reqGetTile->fetch();

							$reqGetTile->closeCursor();
 
							?>
								<div class="hexagon <?= $classBiome[0] ?>"></div>
							<?php

							//$xIntervalMin++;
						}

						//$yIntervalMin++;

						?>

							</div>

						<?php

					}
				?>
			</div>
		</div>