<?php
	require_once('../modele/manager/WorldMapManager.php');
	
	//hypo a mettre sous forme de session sinon pb d affichage

	if(isset($_SESSION['arrayCoordinate'] ) ){
		
		$xPosPlayer = $_SESSION['arrayCoordinate']['xPos'];
		$yPosPlayer = $_SESSION['arrayCoordinate']['yPos'];
		unset($_SESSION['arrayCoordinate']);
	}else{
		//requette pour recup l id du joueur tempo plutot passer sur une variable de session
		$coordinate = WorldMapManager::getCoordinatesByIdColo($_SESSION['id_activ_colo']);
		//var_dump($coordinate);
		$xPosPlayer = $coordinate[0]['x_pos'];
		$yPosPlayer = $coordinate[0]['y_pos'];
	}
?>

<div class="carre">

	<!-- interface de test -->
	<a class="interfaceTest" href="#modalNewPlayer">Creer un nouveau joueur</a>

	<div id="modalNewPlayer">


		<form method="post" action="newPlayerControleurTest.php">

			<input type="text" name="name" id="" placeholder="Name new player">

			<input type="submit" value="Créer un nouveau Joueur">

			<!---    --->
			<a href="#" id="close" title="fermer">
  
				<div class="supp">

					<div class="verti"></div>
					<div class="hori"></div>
				
				</div>
				
			</a>
		</form>

	</div>

	<!-- --- -->

	<section class="conteneurFormPos">
		<form id="formPos" action="positionCarteControleur.php" method="post">
			<div>
				<input type="text" name="xTarget" id="" placeholder ="X : <?= $xPosPlayer ;?> ">
				<input type="text" name="yTarget" id="" placeholder = "Y : <?= $yPosPlayer ;?>">
			</div>
			<input type="submit" value="Go Go Go">
		</form>
	</section>

	<section class="conteneurLegende">

		<!-- affichera les infos recap si trop
		d infos recap lien qui ouvre une boite dans l ecran
		avec les precisions -->

	</section>
	<!--
	<a href="#idTuile" >test</a>
		<div id="idTuile"class="modalHexa"></div>
-->

	<div class="conteneurCarte">
		<!--<div id="contneurTriangleNav">-->
		<a id="tr" href="positionCarteControleur.php?x=<?= $xPosPlayer . '&y=' . $yPosPlayer ;?>&dir=r"><div class="triangle" ></div></a>
		<a id="tl" href=""><div class="triangle" ></div></a>
		<a id="tt" href=""><div class="triangle" ></div></a>
		<a id="tb" href=""><div class="triangle" ></div></a>
		
		<!--</div>-->
		<?php

			$listIntervals = WorldMapManager::initializeAxeIntervals($xPosPlayer, $yPosPlayer);
			$xIntervalMin = $listIntervals['xIntervalMin'];
            $xIntervalMax = $listIntervals['xIntervalMax'];

			$yIntervalMin = $listIntervals['yIntervalMin'];
            $yIntervalMax = $listIntervals['yIntervalMax'];

			$yLimitWorldMap = WorldMapManager::getInfoWorldMap(Y_MAX_MAP);
			$xLimitWorldMap = WorldMapManager::getInfoWorldMap(X_MAX_MAP);

			$yPos = $yIntervalMin-1;

			//Nmbre de lignes
			for ($y=0; $y < Y_VUE ; $y++) { 
			
				if($yPos == $yLimitWorldMap){
					$yPos = 0;
				}
				elseif($yPos < $yIntervalMax){
					$yPos++;
				}
				else {
					
					$yPos = $yIntervalMin+$y;
				}

				//
				if($y % 2 > 0){
					require('../vue/component/div/openDiv/impairLigneOpenDiv.php');
				}
				else{
					require('../vue/component/div/openDiv/pairLigneOpenDiv.php');
				}


				$xPos = $xIntervalMin-1;
				// nombre de tuile par ligne
				for ($x=0; $x < X_VUE ; $x++) { 
				
					if($xPos == $xLimitWorldMap){
						$xPos = 0;
					}
					elseif($xPos < $xIntervalMax){
						$xPos++;
					}
					else {
					
						$xPos = $xIntervalMin+$x;
					}
					
					$classBiome = WorldMapManager::getNameBiome($xPos, $yPos);
					//var_dump($xPos . ' --- ' .  $yPos);
					require('../vue/component/div/tile.php');
				}

				?>
					</div>
					
				<?php
			}
		?>
		
	</div>
	<?php
		$xTile = null;
		$yTile = null;
		for ($y=0; $y < Y_VUE ; $y++) { 
			
			if($yPos == $yLimitWorldMap){
				$yPos = 0;
			}
			elseif($yPos < $yIntervalMax){
				$yPos++;
			}
			else {
				
				$yPos = $yIntervalMin+$y;
			}

			?><div><?php


			$xPos = $xIntervalMin-1;
			// nombre de tuile par ligne
			for ($x=0; $x < X_VUE ; $x++) { 
			
				if($xPos == $xLimitWorldMap){
					$xPos = 0;
				}
				elseif($xPos < $xIntervalMax){
					$xPos++;
				}
				else {
				
					$xPos = $xIntervalMin+$x;
				}
				$xTile = $x;
				$yTile = $y;
				$classBiome = WorldMapManager::getNameBiome($xPos, $yPos);
				//var_dump('X: ' . $xPos . ' Y: ' .  $yPos);
				?><div id="idTuile<?= $xTile . $yTile ?>" class="<?= $classBiome ?>"><span class="spanTile"><?= 'X: ' . $xPos . ' Y: ' .  $yPos;?></span></div><?php

			}

			?>
				</div>
				
			<?php
		}
	?>
</div>