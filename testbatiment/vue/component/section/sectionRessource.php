<?php 
	require_once('alerteMessage.php');
	require_once('../model/manager/ToolsManager.php');			
?>
					
    <div class="terrain">
			<?php
				if(isset($_SESSION['race']) AND  isset($_SESSION['niveau']))
				{
									
				    ?>

						<a class="formRessource" href="ressourceControleur.php?section=eau">
							<img src="../vue/asset/image/eau.png" title="eau" alt="eau"/>
						</a>

				        <?php

				        if($_SESSION['race'] AND $_SESSION['niveau'] >= $niveauTechnoDecouverte )
				        {
				        	if($_SESSION['race'] == 'abeille')
				        	{
                            
								?>
								
								<a class="formRessource" href="ressourceControleur.php?section=bois">
									<img src="../vue/asset/image/bois.png" title="Bois" alt="Bois"/>
								</a>

								<a class="formRessource" href="ressourceControleur.php?section=argile">
									<img src="../vue/asset/image/argile.png" title="argile" alt="argile" />
								</a>

								<a class="formRessource" href="ressourceControleur.php?section=cire">
									<img src="../vue/asset/image/cire.png" title="cire" alt="cire"/>
								</a>

								<a class="formRessource" href="ressourceControleur.php?section=nourriture">
									<img src="../vue/asset/image/nourriture_abeille.png" title="nourriture" alt="nourriture"/>
								</a>
                            
				        		<?php 
                            }
                            elseif($_SESSION['race'] == 'termite')
				        	{
                            
				        		?>

				        		<a  href="#terre"><img src="../vue/asset/image/terre.png" title="Terre" alt="Terre"/></a>
				        		<a  href="#bois"><img src="../vue/asset/image/bois.png" title="Bois" alt="Bois"/></a>
				        		<a  href="#salive"><img src="../vue/asset/image/salive.png" title="Salive" alt="Salive"/></a>
				        		<a  href="#nourriture"><img src="../vue/asset/image/nourritureTermite.png" title="Nourriture" alt="Nourriture"/></a>
                            
				        		<?php
				        	}
				        	elseif($_SESSION['race'] == 'fourmis')
				        	{
                            
				        		?>

				        		<a  href="#terre"><img src="../vue/asset/image/terre.png" title="Terre" alt="Terre"/></a>
				        		<a  href="#feuille"><img src="../vue/asset/image/feuille.png" title="Feuille" alt="Feuille"/></a>
				        		<a  href="#cocon"><img src="../vue/asset/image/cocon.png" title="Cocon" alt="Cocon"/></a>
				        		<a  href="#nourriture"><img src="../vue/asset/image/nourritureFourmis.png" title="Nourriture" alt="Nourriture"/></a>
                            
				        		<?php
				        	}
				        	elseif($_SESSION['race'] == 'arraigne')
				        	{
                            
				        		?>

				        		<a  href="#feuille"><img src="../vue/asset/image/feuille.png" title="Feuille" alt="Feuille"/></a>
				        		<a  href="#toxine"><img src="../vue/asset/image/Toxine.png" title="toxine" alt="Toxine"/></a>
				        		<a  href="#argile"><img src="../vue/asset/image/argile.png" title="Argile" alt="Argile"/></a>
				        		<a  href="#nourriture"><img src="../vue/asset/image/nourritureArraigne.png" title="Nourriture" alt="Nourriture"/></a>
                            
				        		<?php
				        	}
				        	else
				        	{
				        		echo 'ERREUR : 2 ' ;
				        	}
				        }
					}
					else{
						echo 'Erreur : 1';
					}
					
					?>

	</div>
						
	<?php
		//TODO revoir pk la partie php est dans la partie vue ? 
		require_once('../model/manager/ToolsManager.php');

		if(isset($_SESSION['section']) )
		{
			$sectionTypeRessource = ToolsManager::validData($_SESSION['section']);
			if($sectionTypeRessource == 'bois')
			{
				$ressource = 'du bois' ;
				$typeRessource = $sectionTypeRessource;
				
				unset($_SESSION['typeRessource']);
				$_SESSION['typeRessource'] = $sectionTypeRessource;
				
			}
			elseif($sectionTypeRessource == 'cire')
			{
					$ressource = 'de la cire' ;
					$typeRessource = $sectionTypeRessource;
					
					unset($_SESSION['typeRessource']);
					$_SESSION['typeRessource'] = $sectionTypeRessource;
					
			}
			elseif($sectionTypeRessource == 'eau')
			{
					$ressource = 'de l\'eau' ;
					$typeRessource = $sectionTypeRessource;
					
					unset($_SESSION['typeRessource']);
					$_SESSION['typeRessource'] = $sectionTypeRessource;
					
			}
			elseif($sectionTypeRessource == 'argile')
			{
					$ressource = 'de l\'argile' ;
					$typeRessource = $sectionTypeRessource;
					
					unset($_SESSION['typeRessource']);
					$_SESSION['typeRessource'] = $sectionTypeRessource;
					
			}
			elseif($sectionTypeRessource == 'nourriture')
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
						$sectionTypeRessource = 'nourriture_termite';
						$typeRessource = 'nourriture';
					}
					elseif($_SESSION['race'] == 'arraigne')
					{
						$sectionTypeRessource = 'nourriture_arraigne';
						$typeRessource = 'nourriture';
					}
					elseif($_SESSION['race'] == 'fourmis')
					{
						$sectionTypeRessource = 'nourriture_fourmis';
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
			
			
			
			if($sectionTypeRessource == 'cire')
			{
					?>
					<form id="<?php echo $sectionTypeRessource; ?>" action="../model/traitementRessource.php" method="post">
														
										<div class="titre">
															
											<a href="#">Fermer</a>
															
											<h2><?php echo $sectionTypeRessource ?></h2>
															
										</div>
															
										<div class="cadreRecap">

										<div class="infoPhoto" >
											
											<img src="<?php echo '../vue/asset/image/'.$_SESSION['typeRessource'].'.png'; ?>" title="<?php echo $sectionTypeRessource; ?>" alt="<?php echo $sectionTypeRessource; ?>" />
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

																		
											<input type="hidden" name="ouvriere_<?php echo $sectionTypeRessource; ?>" id="ouvriere_<?php echo$sectionTypeRessource; ?>" value="ouvriere_<?php echo$sectionTypeRessource; ?>" />
																	
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
					<form id="<?php echo $sectionTypeRessource; ?>" action="../model/traitementRessource.php" method="post">

						<div class="titre">

							<a href="#">Fermer</a>

							<h2><?php echo $sectionTypeRessource ?></h2>

						</div>

						<div class="cadreRecap">
						<div class="infoPhoto" >

							<img src="<?php echo '../vue/asset/image/'.$_SESSION['typeRessource'].'.png'; ?>" title="<?php echo $sectionTypeRessource; ?>" alt="<?php echo $sectionTypeRessource; ?>" />
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

							<input type="hidden" name="ouvriere_<?php echo $sectionTypeRessource; ?>" id="ouvriere_<?php echo$sectionTypeRessource; ?>" value="ouvriere_<?php echo$sectionTypeRessource; ?>" />

							<input class="boutton" type="submit" name="affecter" value="Affecter" title="Affectation des ouvrières à la récolte" />
							<input class="boutton" type="submit" name="retirer" value="Retirer" title="Retrait d'ouvrières de la récolte" />
							<input class="boutton" type="submit" name="reset" value="Reset" title="Retrait de toutes les ouvrières des terrains de recolte" />

						</div>

					</form>
											
				<?php
					
			}

			unset($_SESSION['section']);
		}
		else
		{
			
		}
	?>
