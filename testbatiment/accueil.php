<?php
	
	session_start();
	
	if(isset($_SESSION['pseudo']) AND isset($_SESSION['mail']) AND isset($_SESSION['droit']) AND isset($_SESSION['pass']))
	{
		
		unset($_SESSION['boisCouveuse'] );
		unset($_SESSION['cireCouveuse']);
		unset($_SESSION['eauCouveuse']);
		
		
		unset($_SESSION['typeRessource']);
		$_SESSION['typeRessource'] = 'rien';

		$_SESSION['race'] = 'abeille' ;
		$_SESSION['niveau'] = 15;
		
		$localisation = 'accueil.php' ;
		
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
								
							<div class="encadreGeneral"><!-- Ne devra pas etre visible  -->
								
								<h3>Couveuse Niv <?php echo $_SESSION['niveauCouveuse']; ?> </h3>
								
								<div class="encadrePhoto" title="couveuse"><!-- contient la photo et le cout en ressource du batiment  -->
							
									<img src="image/couveuse.png" title="couveuse" alt="couveuse" class="img"/>
									
									<h3>Coût pour le Niv <?php $nSup = $resultatInfoAffichage['couveuse']+1; echo $nSup ;?> </h3>
									
									<p>
									
										<?php
											$boisCouveuse = prixNiveauSup($nSup,$boisCouveuse,4);
											$cireCouveuse = prixNiveauSup($nSup,$cireCouveuse,4);
											$eauCouveuse = prixNiveauSup($nSup,$eauCouveuse,4);
											
											$_SESSION['boisCouveuse'] = $boisCouveuse ;
											$_SESSION['cireCouveuse'] = $cireCouveuse ;
											$_SESSION['eauCouveuse'] = $eauCouveuse ;
											
											
											echo 	'Bois</br>'.$boisCouveuse.'</br></br>'.
													'Cire</br>'.$cireCouveuse.'</br></br>'.
													'Eau</br>'.$eauCouveuse.'</br></br>'.
													'Durée</br>'.$dureeConstructionCouveuse ;
										?>
										
									</p>
												
								</div>
								
								<form method="post" action="traitementConstructionBatiment.php" >
								
									<input type="hidden" name="nomBatiment" id="nomBatiment" value="<?php echo 'couveuse'; ?>"/>
								
									<input type="submit" value="Lancer la construction" />
								
								</form>
							
							</div>
						
						</div>
						
						</br><a href="deconnexion.php" >Deconnexion</a>
						
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