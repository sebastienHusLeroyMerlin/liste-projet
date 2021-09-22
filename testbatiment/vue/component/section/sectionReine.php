<?php 
	require_once('alerteMessage.php');					
?>

<div class="encadreGeneral"><!-- Ne devra pas etre visible  -->


<?php 
	//tempo
	$_SESSION['queenName'] =  "Mirranda"; 
	$_SESSION['vitessePonte'] = 53 ; // dependra des technologie et batiment
	$vitessePonteDeBase = 
?>

		<h3><?php echo $_SESSION['queenName']; ?> </h3>
							
		<div class="encadrePhoto" title="couveuse"><!-- contient la photo et le cout en ressource du batiment  -->
						
			<img src="../vue/asset/image/reineAbeille.png" title="<?php echo $_SESSION['queenName']; ?>" alt=<?php echo $_SESSION['queenName']; ?> class="img"/>
								
			<h3>Vitesse de ponte : <?= $_SESSION['vitessePonte'];?> </h3>

<!-- un type = 1 etoile  2 type  etoile ect qualité influ sur le type d oeuf pondu 
un oeuf deux etoile aura ses sta multiplié par 2 un oeuf 5 etoile par 15-->
			<p> 
				qualité nourriture 			
			</p>

			<!-- note attention de bien prevoir le coup si plus de asser nourriture redescendre de 1 etoile --> 

			<!-- la ration correspond a la quantité de nourriture distribuée a la reine elle influe sur la quantite de ponte 
			si ponte a 10 par min a 1 ration , ponte 20 a 2 ration, 30 a 4 ration, 40 a 6 ration, 50 a 8 ration, puis augmentation selon suite fibo
			13, 21, 34 ect -->
			<p> 
				ration 			
			</p>

											
		</div>
							
		<a href="">Valider</a>
						
	</div>
