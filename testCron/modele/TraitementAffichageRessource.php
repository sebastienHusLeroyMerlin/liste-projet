<?php

	session_start();

	if(isset($_SESSION['Auth']) AND $_SESSION['Auth'] == true)
	{
			if(isset($_POST['bouttonRessource']))
			{
				unset($_SESSION['typeRessource'] );
				
				$_SESSION['typeRessource'] = $_POST['bouttonRessource'] ;
				var_dump($_SESSION['typeRessource']);
				header('Location:ressource.php');
			}
			else
			{
				header('Location:ressource.php');
			}
	}
	else
	{
		echo'Dis t\'essairais pas de me hacker petit malin ? </br>
			Si tu veux jouer inscrits toi ';?><a href="inscription.php">ICI</a><?php
			
			header('Refresh:3;connexion.php');
	}
	
	
	
	if(isset($_POST['bouttonRessource']) )
	{
		?>

			<form id="<?php echo $_SESSION['typeRessource']; ?>" action="traitementRessource.php" method="post">
								
				<div class="titre">
									
					<a href="#">Fermer</a>
									
					<h2><?php echo $_SESSION['typeRessource']; ?></h2>
									
				</div>
									
				<div class="cadreRecap">

				<div class="infoPhoto" >
					
					<img src="<?php echo 'image/'.$_SESSION['typeRessource'].'.png'; ?>" title="<?php echo $_SESSION['typeRessource']; ?>" alt="<?php echo $_SESSION['typeRessource']; ?>" />
					<p>Ouvrière affecté a la recolte de la cire : <?php echo $_SESSION['ouvriere_cire'] ; ?></p>
					<p>Nombre d'ouvrières disponible : <?php echo $_SESSION['ouvriereDisponible'];?></p>
					<p>Production Total : </p>
										
				</div>

				<label for="Marecage" class="infoMarecage">
											
				<!--<div class="infoMarecage" >-->

				<div class="paragraphe"><h3>Marecage</h3></div>
													
				<div class="paragraphe"><p>Vous produisez ....  </p></div>
												
				<div class="paragraphe"><p>avec ..... ouvrieres</p></div>
													
				<div class="paragraphe"><input type="text" name="affectationCireMarecage" id="affectationCireMarecage" placeholder="Affecter un nombre d'ouvrière a la récolte de la cire" title="Affectation des ouvrière à la récolte de la cire" /></div>
													
				<div class="paragraphe"><input type="checkbox" name="terrain" id="Marecage" value="Marecage" /></div>
											
				<!--</div>-->
												
				</label>	
											
				<label for="Plaine">
										
					<div class="infoPlaine" >

						<h3>Plaine</h3>
													
						<p>production_plaine</p>
												
						<p>ouvriere_plaine</p>
													
						<input type="text" name="affectationCirePlaine" id="affectationCirePlaine" placeholder="Affecter un nombre d'ouvrière a la récolte de la cire" title="Affectation des ouvrière à la récolte de la cire" />
													
						</br><input type="checkbox" name="terrain" id="Plaine" value="Plaine" />
													
					</div>
												
				</label>
											
											
				<label for="Foret">
										
					<div class="infoForet" >
												
						<h3>Foret</h3>
													
						<p>production_foret</p>
												
						<p>ouvriere_foret</p>
													
						<input type="text" name="affectationCireForet" id="affectationCireForet" placeholder="Affecter un nombre d'ouvrière a la récolte de la cire" title="Affectation des ouvrière à la récolte de la cire" />
													
						</br><input type="checkbox"  name="terrain" id="Foret" value="Foret" />
												
					</div>
												
				</label>
																				
				</div><!--  fermeture cadre recap -->
									
				<div class="cadreRessource" id="formulaire">

												
					<input type="hidden" name="ouvriere_cire" id="ouvriere_cire" value="ouvriere_cire" />
											
					<input class="boutton" type="submit" name="affecter" value="Affecter" title="Affectation des ouvrières à la récolte" />
					<input class="boutton" type="submit" name="retirer" value="Retirer" title="Retrait d'ouvrières de la récolte" />
					<input class="boutton" type="submit" name="reset" value="Reset" title="Retrait de toutes les ouvrières des terrains de recolte" />
										
				</div>
									
			</form>
								
		<?php
		
	}
	else
	{
		//tout le code voulue
	}