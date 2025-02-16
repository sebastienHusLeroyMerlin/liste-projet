<?php 
	require_once('alerteMessage.php');					
?>

<div class="encadreGeneral"><!-- Ne devra pas etre visible  -->


<?php 
	//tempo
	$_SESSION['queenName'] =  "Mirranda" ; 
	$_SESSION['vitessePonte'] = 53 ; // dependra des technologie et batiment
	$vitessePonteDeBase = 12 ; // voir note.txt
?>

		<h3><?php echo $_SESSION['queenName']; ?> </h3>
							
		<div class="encadrePhoto" title="couveuse"><!-- contient la photo et le cout en ressource du batiment  -->
						
			<img src="../vue/asset/image/reineAbeille.png" title="<?php echo $_SESSION['queenName']; ?>" alt=<?php echo $_SESSION['queenName']; ?> class="img"/>
								
			<h3>Vitesse de ponte : <?= $_SESSION['vitessePonte'];?> </h3>

<!-- un type = 1 etoile  2 type  etoile ect qualité influ sur le type d oeuf pondu 
un oeuf deux etoile aura ses sta multiplié par 2 un oeuf 5 etoile par 15-->
			<?php require(); ?>

			<label for="">Qualité nourriture </label>

			<form method="" action="">
				
				

				<!-- note attention de bien prevoir le coup si plus de asser nourriture redescendre de 1 etoile --> 

				<!--  -->
				<p> 
					ration 			
				</p>
			</form>
			

											
		</div>
							
		<a href="">Valider</a>
						
	</div>
