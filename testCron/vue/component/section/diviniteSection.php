<?php 
	require_once('alerteMessage.php');					
?>

<div class="encadreGeneral">

		<h3><?= $godName ?> </h3>
							
		<div class="encadrePhoto" title="couveuse"><!-- contient la photo et le cout en ressource du batiment  -->
						
			<img src="../vue/asset/image/<?php echo $_SESSION['godName']; ?>.png" title="<?php echo $_SESSION['godName']; ?>" alt=<?php echo $_SESSION['godName']; ?> class="img"/>
								
			<h3>attributs</h3>

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
