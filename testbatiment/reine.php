<?php
	
	session_start();
	
	if(isset($_SESSION['pseudo']) AND isset($_SESSION['mail']) AND isset($_SESSION['droit']) AND isset($_SESSION['pass']))
	{
		
		
		
		$localisation = 'reine.php' ;
		
		include('traitementAffichageInformation.php');
		include('fonction.php');
				
		?>
		
			<!DOCTYPE html>

			<html>

				<?php include('head.php'); ?>
				
				<body>
				
					<h1>Test Batiment</h1>
					
					
							<?php 
								if(isset($_SESSION['message']))
								{
									?>
										<div class="message">
						
											<p>
											
												<?php  echo $_SESSION['message'] ; ?>
												
											</p>
						
										</div>
									<?php
								}

								unset($_SESSION['message']) ;
								
							?>
						
					
					<?php include('ressourceBarre.php'); ?>
					
					<div class="conteneur">
					
						<?php include('navigation.php') ;?>
					
						<div class="conteneurBatiment" >
								
							
														
						</div>
						
						<div>
						
							</br><a href="deconnexion.php" >Deconnexion</a>
							
						</div>
						
					</div>		
									
				</body>

			</html>
		
		<?php
	
	}
	else
	{
		echo'Dis t\'essairais pas de me hacker petit malin ? </br>
			Si tu veux jouer inscrits toi ';?><a href="inscription.php">ICI</a><?php
			
			header('Refresh:3;connexion.php');
	}

?>