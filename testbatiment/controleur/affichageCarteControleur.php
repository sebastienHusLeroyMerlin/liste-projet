<?php
	$xPosPlayer = 5 ;
	$yPosPlayer = 9 ;
?>

<div class="carre">
	<section class="conteneurFormPos">
		<form id="formPos" action="" method="post">
			<div>
				<input type="text" name="xTarget" id="" placeholder ="X : <?= $xPosPlayer ;?> ">
				<input type="text" name="Ytarget" id="" placeholder = "Y : <?= $yPosPlayer ;?>">
			</div>
			<input type="submit" value="Go Go Go">
		</form>
	</section>

	<section class="conteneurLegende">

		<!-- affichera les infos recap si trop
		d infos recap lien qui ouvre une boite dans l ecran
		avec les precisions -->

	</section>
	
	<a href="#idTuile" >test</a>
		<div id="idTuile"class="modalHexa"></div>


	<div class="conteneurCarte">
		<!--<div id="contneurTriangleNav">-->
		<a id="tr" href=""><div class="triangle" ></div></a>
		<a id="tl" href=""><div class="triangle" ></div></a>
		<a id="tt" href=""><div class="triangle" ></div></a>
		<a id="tb" href=""><div class="triangle" ></div></a>

		
		<!--</div>-->
		<?php
			// id_colonie recuperer dans une variable de session
			$xColo = 6;
			$yColo = 6;

			$listIntervals = WorldMap::initializeAxeIntervals($xColo, $yColo);
			$xIntervalMin = $listIntervals['xIntervalMin'];
            $xIntervalMax = $listIntervals['xIntervalMax'];

			$yIntervalMin = $listIntervals['yIntervalMin'];
            $yIntervalMax = $listIntervals['yIntervalMax'];

			$yLimitWorldMap = WorldMap::getInfoWorldMap(Y_MAX_MAP);
			$xLimitWorldMap = WorldMap::getInfoWorldMap(X_MAX_MAP);

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
					
					$classBiome = WorldMap::getNameBiome($xPos, $yPos);
					
					require('../vue/component/div/tile.php');
				}

				?>
					</div>
					
				<?php
			}
		?>
		
	</div>
	
</div>