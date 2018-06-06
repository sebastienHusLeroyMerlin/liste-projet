<?php
	
	session_start();
	
	if(isset($_SESSION['pseudo']) AND isset($_SESSION['mail']) AND isset($_SESSION['droit']) AND isset($_SESSION['pass']))
	{
		
		

		$localisation = 'ressource.php' ;
		$niveauTechnoDecouverte = 10 ;
		include('traitementAffichageInformation.php');
		
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
						
						<div class="conteneurMateriaux" >				
				
							<div class="terrain">
							
								<?php
								
								if(isset($_SESSION['race']) AND  isset($_SESSION['niveau']))
								{
									
									?>
									
									
									<form class="formRessource" method="post" action="ressource.php" >
										
										<input type="hidden" value="eau" name="typeRessource" id="typeRessource" />
											
										<input type="image" src="image/eau.png" title="Eau" alt="Eau" value="submit"/>
											
									</form>
									
									<?php
									
									if($_SESSION['race'] AND $_SESSION['niveau'] >= $niveauTechnoDecouverte )
									{
										if($_SESSION['race'] == 'abeille')
										{
											
											?>
											
											<form class="formRessource" method="post" action="ressource.php" >
											
												<input type="hidden" value="bois" name="typeRessource" id="typeRessource" />
											
												<input type="image" src="image/bois.png" title="Bois" alt="Bois" value="submit"/>
											
											</form>
											
											
											<form class="formRessource" method="post" action="ressource.php" >
											
												<input type="hidden" value="argile" name="typeRessource" id="typeRessource" />
											
												<input type="image"  src="image/argile.png" title="Argile" alt="Argile" value="submit" />
											
											</form>
											
											<form class="formRessource" method="post" action="ressource.php" >
											
												<input type="hidden" value="cire" name="typeRessource" id="typeRessource" />
											
												<input type="image"  src="image/cire.png" title="Cire" alt="Cire" value="submit" />
											
											</form>
											
											<form class="formRessource" method="post" action="ressource.php" >
											
												<input type="hidden" value="nourriture" name="typeRessource" id="typeRessource" />
											
												<input type="image"  src="image/nourriture_abeille.png" title="Nourriture" alt="Nourriture" value="submit" />
											
											</form>
																																											
											<?php 
										}
										elseif($_SESSION['race'] == 'termite')
										{
											
											?>
											
											<a  href="#terre"><img src="image/terre.png" title="Terre" alt="Terre"/></a>
											<a  href="#bois"><img src="image/bois.png" title="Bois" alt="Bois"/></a>
											<a  href="#salive"><img src="image/salive.png" title="Salive" alt="Salive"/></a>
											<a  href="#nourriture"><img src="image/nourritureTermite.png" title="Nourriture" alt="Nourriture"/></a>
											
											<?php
										}
										elseif($_SESSION['race'] == 'fourmis')
										{
											
											?>
											
											<a  href="#terre"><img src="image/terre.png" title="Terre" alt="Terre"/></a>
											<a  href="#feuille"><img src="image/feuille.png" title="Feuille" alt="Feuille"/></a>
											<a  href="#cocon"><img src="image/cocon.png" title="Cocon" alt="Cocon"/></a>
											<a  href="#nourriture"><img src="image/nourritureFourmis.png" title="Nourriture" alt="Nourriture"/></a>
											
											<?php
										}
										elseif($_SESSION['race'] == 'arraigne')
										{
											
											?>
											
											<a  href="#feuille"><img src="image/feuille.png" title="Feuille" alt="Feuille"/></a>
											<a  href="#toxine"><img src="image/Toxine.png" title="toxine" alt="Toxine"/></a>
											<a  href="#argile"><img src="image/argile.png" title="Argile" alt="Argile"/></a>
											<a  href="#nourriture"><img src="image/nourritureArraigne.png" title="Nourriture" alt="Nourriture"/></a>
											
											<?php
										}
										else
										{
											echo 'ERREUR : 2 ' ;
										}
									}
								}
								else
								{
									echo 'Erreur : 1';
								}
								
								?>

							</div>
							
							<?php
							
							
						if(isset($_POST['typeRessource']) )
						{
								if($_POST['typeRessource'] == 'bois')
								{
									$ressource = 'du bois' ;
									$typeRessource = $_POST['typeRessource'];
									
									unset($_SESSION['typeRessource']);
									$_SESSION['typeRessource'] = $_POST['typeRessource'];
									
								}
								elseif($_POST['typeRessource'] == 'cire')
								{
									$ressource = 'de la cire' ;
									$typeRessource = $_POST['typeRessource'];
									
									unset($_SESSION['typeRessource']);
									$_SESSION['typeRessource'] = $_POST['typeRessource'];
									
								}
								elseif($_POST['typeRessource'] == 'eau')
								{
									$ressource = 'de l\'eau' ;
									$typeRessource = $_POST['typeRessource'];
									
									unset($_SESSION['typeRessource']);
									$_SESSION['typeRessource'] = $_POST['typeRessource'];
									
								}
								elseif($_POST['typeRessource'] == 'argile')
								{
									$ressource = 'de l\'argile' ;
									$typeRessource = $_POST['typeRessource'];
									
									unset($_SESSION['typeRessource']);
									$_SESSION['typeRessource'] = $_POST['typeRessource'];
									
								}
								elseif($_POST['typeRessource'] == 'nourriture')
								{
									$ressource = 'de la nourriture' ;
									
									unset($_SESSION['typeRessource']);
																		
									if($_SESSION['race'] == 'abeille')
									{
										$_SESSION['typeRessource'] = 'nourriture_abeille';
										$typeRessource = 'nourriture';
									}
									elseif($_SESSION['race'] == 'termite')
									{
										$_POST['typeRessource'] = 'nourriture_termite';
										$typeRessource = 'nourriture';
									}
									elseif($_SESSION['race'] == 'arraigne')
									{
										$_POST['typeRessource'] = 'nourriture_arraigne';
										$typeRessource = 'nourriture';
									}
									elseif($_SESSION['race'] == 'fourmis')
									{
										$_POST['typeRessource'] = 'nourriture_fourmis';
										$typeRessource = 'nourriture';
									}
									else
									{
										echo '333';
									}
									
								}
								else
								{
									echo 'un truc';
								}
								
								
								
								if($_POST['typeRessource'] == 'cire')
								{
									?>

									<form id="<?php echo $_POST['typeRessource']; ?>" action="traitementRessource.php" method="post">
														
										<div class="titre">
															
											<a href="#">Fermer</a>
															
											<h2><?php echo $_POST['typeRessource'] ?></h2>
															
										</div>
															
										<div class="cadreRecap">

										<div class="infoPhoto" >
											
											<img src="<?php echo 'image/'.$_SESSION['typeRessource'].'.png'; ?>" title="<?php echo $_POST['typeRessource']; ?>" alt="<?php echo $_POST['typeRessource']; ?>" />
											<p>Ouvrière affecté a la recolte  <?php echo $ressource; ?>: <?php echo $_SESSION['ouvriere_'.$typeRessource] ; ?></p>
											<p>Nombre d'ouvrières disponible : <?php echo $_SESSION['ouvriereDisponible'];?></p>
											<p>Production Total : <?php echo $_SESSION[$typeRessource] ;?></p></p>
																
										</div>

										<label for="Colonie" class="infoColonie">

											<div class="paragraphe"><h3>Nom de la colonie ( dynamiquement)</h3></div>
																				
											<div class="paragraphe"><p>Vous produisez <?php echo $_SESSION[$typeRessource] ; ?> </p></div>
																			
											<div class="paragraphe"><p>avec <?php echo $_SESSION['ouvriere_'.$typeRessource] ; ?> ouvrieres</p></div>
																				
											<div class="paragraphe"><input type="text" name="<?php echo 'affectation_'.$typeRessource;?>" id="<?php echo 'affectation_'.$typeRessource;?>" placeholder="Affecter un nombre d'ouvrière a la récolte <?php echo $ressource; ?>" title="Affectation des ouvrières à la récolte <?php echo $ressource; ?> dans le marécage " /></div>
																																
										</label>	
																	
										
																										
										</div><!--  fermeture cadre recap -->
															
										<div class="cadreRessource" id="formulaire">

																		
											<input type="hidden" name="ouvriere_<?php echo $_POST['typeRessource']; ?>" id="ouvriere_<?php echo$_POST['typeRessource']; ?>" value="ouvriere_<?php echo$_POST['typeRessource']; ?>" />
																	
											<input class="boutton" type="submit" name="affecter" value="Affecter" title="Affectation des ouvrières à la récolte" />
											<input class="boutton" type="submit" name="retirer" value="Retirer" title="Retrait d'ouvrières de la récolte" />
											<input class="boutton" type="submit" name="reset" value="Reset" title="Retrait de toutes les ouvrières des terrains de recolte" />
																
										</div>
															
									</form>
														
								<?php
								}
								else
								{
									?>

									<form id="<?php echo $_POST['typeRessource']; ?>" action="traitementRessource.php" method="post">
														
										<div class="titre">
															
											<a href="#">Fermer</a>
															
											<h2><?php echo $_POST['typeRessource'] ?></h2>
															
										</div>
															
										<div class="cadreRecap">

										<div class="infoPhoto" >
											
											<img src="<?php echo 'image/'.$_SESSION['typeRessource'].'.png'; ?>" title="<?php echo $_POST['typeRessource']; ?>" alt="<?php echo $_POST['typeRessource']; ?>" />
											<p>Ouvrière affecté a la recolte  <?php echo $ressource; ?>: <?php echo $_SESSION['ouvriere_'.$typeRessource.'_total'] ; ?></p>
											<p>Nombre d'ouvrières disponible : <?php echo $_SESSION['ouvriereDisponible'];?></p>
											<p>Production Total : <?php echo $_SESSION[$typeRessource]  ; ?></p>
																
										</div>
																										
										<label for="Plaine" class="infoPlaine">

											<div class="paragraphe"><h3>Plaine</h3></div>
																			
											<div class="paragraphe"><p>Vous produisez <?php echo $_SESSION['plaine_'.$typeRessource] ; ?> </p></div>
																				
											<div class="paragraphe"><p>avec <?php echo $_SESSION['ouvriere_'.$typeRessource.'_plaine'] ; ?> ouvrieres</p></div>
																					
											<div class="paragraphe"><input type="text" name="<?php echo 'affectation_'.$typeRessource.'_plaine';?>" id="<?php echo 'affectation_'.$typeRessource.'_plaine';?>" placeholder="Affecter un nombre d'ouvrière a la récolte <?php echo $ressource; ?>" title="Affectation des ouvrières à la récolte <?php echo $ressource; ?> dans la plaine" /></div>
																					
											<div class="paragraphe"><input type="checkbox" name="plaine" id="Plaine" value="Plaine" /></div>
																		
										</label>
																	
																	
										<label for="Foret" class="infoForet">
				
											<div class="paragraphe"><h3>Foret</h3></div>
																			
											<div class="paragraphe"><p>Vous produisez <?php echo $_SESSION['foret_'.$typeRessource] ; ?> </p></div>
																				
											<div class="paragraphe"><p>avec <?php echo $_SESSION['ouvriere_'.$typeRessource.'_foret'] ; ?> ouvrieres</p></div>
																					
											<div class="paragraphe"><input type="text" name="<?php echo 'affectation_'.$typeRessource.'_foret';?>" id="<?php echo 'affectation_'.$typeRessource.'_foret';?>" placeholder="Affecter un nombre d'ouvrière a la récolte <?php echo $ressource; ?>" title="Affectation des ouvrières à la récolte <?php echo $ressource; ?> dans la foret" /></div>
																					
											<div class="paragraphe"><input type="checkbox"  name="foret" id="Foret" value="Foret" /></div>
							
										</label>
										
										<label for="Marecage" class="infoMarecage">

											<div class="paragraphe"><h3>Marecage</h3></div>
																				
											<div class="paragraphe"><p>Vous produisez <?php echo $_SESSION['marecage_'.$typeRessource] ; ?> </p></div>
																			
											<div class="paragraphe"><p>avec <?php echo $_SESSION['ouvriere_'.$typeRessource.'_marecage'] ; ?> ouvrieres</p></div>
																				
											<div class="paragraphe"><input type="text" name="<?php echo 'affectation_'.$typeRessource.'_marecage';?>" id="<?php echo 'affectation_'.$typeRessource.'_marecage';?>" placeholder="Affecter un nombre d'ouvrière a la récolte <?php echo $ressource; ?>" title="Affectation des ouvrières à la récolte <?php echo $ressource; ?> dans le marécage " /></div>
																				
											<div class="paragraphe"><input type="checkbox" name="marecage" id="Marecage" value="Marecage" /></div>
																	
										
																		
										</label>	
																										
										</div><!--  fermeture cadre recap -->
															
										<div class="cadreRessource" id="formulaire">

																		
											<input type="hidden" name="ouvriere_<?php echo $_POST['typeRessource']; ?>" id="ouvriere_<?php echo$_POST['typeRessource']; ?>" value="ouvriere_<?php echo$_POST['typeRessource']; ?>" />
																	
											<input class="boutton" type="submit" name="affecter" value="Affecter" title="Affectation des ouvrières à la récolte" />
											<input class="boutton" type="submit" name="retirer" value="Retirer" title="Retrait d'ouvrières de la récolte" />
											<input class="boutton" type="submit" name="reset" value="Reset" title="Retrait de toutes les ouvrières des terrains de recolte" />
																
										</div>
															
									</form>
														
								<?php
								
								}
							
						}
						else
						{
							
						}
						?>			
					</div>
						
						
						
					</div>
					
					<div class="tchat" >
						
							<h2>TCHAT</h2>

								<a href="#fenetreAlliance"  ><div id="tchatAlli"><h3>TCHAT Alliance</h3></div></a>
								<a href="#fenetreGenerale"  ><div id="tchatAlli"><h3>TCHAT Générale</h3></div></a>
								
											
							<div id="fenetreAlliance" >alli</div>
							<div id="fenetreGenerale" >gene</div>
							
						
						</div>
						
						</br><a href="deconnexion.php" >Deconnexion</a>
														
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