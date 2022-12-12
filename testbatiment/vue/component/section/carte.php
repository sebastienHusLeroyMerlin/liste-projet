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
$xColo = 5;
$yColo = 6;

$xLimitWorldMap = WorldMap::getInfoWorldMap(X_MAX_MAP);
$xArrayIntervals = WorldMap::determineViewInterval($xColo);
$xIntervalMin = $xArrayIntervals['intervalMin'];
$xIntervalMax = $xArrayIntervals['intervalMax'];
var_dump($xArrayIntervals);

$yLimitWorldMap = WorldMap::getInfoWorldMap(Y_MAX_MAP);
$yArrayIntervals = WorldMap::determineViewInterval($yColo);
$yIntervalMin = $yArrayIntervals['intervalMin'];
$yIntervalMax = $yArrayIntervals['intervalMax'];
var_dump($yArrayIntervals);
var_dump($xLimitWorldMap);
/*

$yInterval = (Y_VUE - 1) / 2;
$yIntervalMin = $yColo - $yInterval;
$yIntervalMax = $yColo + $yInterval;*/

					$nbTilePerLigne =  X_VUE;
					$nbLigne = X_VUE;

					//Nombre de lignes
					for ($y=0; $y < $nbLigne ; $y++) { 
						$yPos = null;
						$yMin = $yIntervalMin;
						if($yMin > $yIntervalMax ){
							var_dump('if y 1');
							if($yIntervalMin > $yLimitWorldMap){
								$yPos = 0;
							}else {
								$yPos = $yIntervalMin ;//+ $y;
						}
							$yIntervalMin++;
						}
						

						//;

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
							$xPos = null;
							$xMin = $xIntervalMin;
							if($xIntervalMin > $xIntervalMax ){
								if($xIntervalMin > $xLimitWorldMap){
									$xPos = 0;
								}else {
								$xPos = $xIntervalMin;// + $x;
							}
								$xIntervalMin++;
							}
							

							//
							var_dump('$xpos : ' . $xPos . ' ypos ' . $yPos);
//var_dump($xPos);
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
							var_dump('$biome : ' . $classBiome[0])
							?>
								<a href=""><div class="hexagon <?= $classBiome[0] ?>"></div></a>
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