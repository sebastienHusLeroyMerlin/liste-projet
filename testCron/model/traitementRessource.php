<?php
	
	session_start();
	require_once('manager/BddManager.php');
	
	if(isset($_SESSION['Auth']) AND $_SESSION['Auth'] == true)
	{
		
		if(isset($_POST['affectation_cire']) OR isset($_POST['affectation_bois']) OR isset($_POST['affectation_eau']) OR isset($_POST['affectation_argile']) OR isset($_POST['affectation_nourriture']) OR isset($_POST['ouvriere_bois']) OR isset($_POST['ouvriere_cire']) OR isset($_POST['ouvriere_eau']) OR isset($_POST['ouvriere_argile']) OR isset($_POST['ouvriere_nourriture']))
		{
			if(!empty($_POST['affectation_cire']) OR !empty($_POST['affectation_bois']) OR !empty($_POST['affectation_eau']) OR !empty($_POST['affectation_argile']) OR !empty($_POST['affectation_nourriture']) OR !empty($_POST['ouvriere_bois']) OR !empty($_POST['ouvriere_cire']) OR !empty($_POST['ouvriere_eau']) OR !empty($_POST['ouvriere_argile']) OR !empty($_POST['ouvriere_nourriture']))
			{
				
				//connexion a la bdd
				$bdd =  BddManager::getBdd();

					/* ---------------------------------------------------------- */
					/* --- REVOIR TOUT LES ECHAPEMENT DE POST !!! --- */
					/* ---------------------------------------------------------- */
				// var_dump($_POST['affectation_'.$_SESSION['typeRessource'].'_plaine']);
				// var_dump($_SESSION['typeRessource']);
				// var_dump($_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_plaine']);
				// var_dump($_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_foret']);
				// var_dump($_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_marecage']);
				

					
				if(isset($_POST['affecter']) AND $_POST['affecter'] == 'Affecter')
				{
					//gestion du cas particulier de la nourriture 
					if($_SESSION['typeRessource'] == 'nourriture_abeille' OR $_SESSION['typeRessource'] == 'nourriture_fourmis' OR $_SESSION['typeRessource'] == 'nourriture_termite' OR $_SESSION['typeRessource'] == 'nourriture_arraigne')
					{
						unset($_SESSION['typeRessource']);
						$_SESSION['typeRessource'] = 'nourriture' ;
					}
					
					// on gere le cas de la ressource selectioné
					if((isset($_POST['affectation_'.$_SESSION['typeRessource'].'_plaine']) OR isset($_POST['affectation_'.$_SESSION['typeRessource'].'_foret']) OR isset($_POST['affectation_'.$_SESSION['typeRessource'].'_marecage'])) AND (isset($_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_plaine']) OR isset($_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_foret']) OR isset($_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_marecage'])))
					{
						
						// on gere le cas ou au moins un champ est rempli et positif
						if(($_POST['affectation_'.$_SESSION['typeRessource'].'_plaine']  > 0  ) OR ($_POST['affectation_'.$_SESSION['typeRessource'].'_foret']  > 0  ) OR($_POST['affectation_'.$_SESSION['typeRessource'].'_marecage']  > 0  ))
						{
							$_POST['affectation_'.$_SESSION['typeRessource'].'_plaine'] = htmlspecialchars($_POST['affectation_'.$_SESSION['typeRessource'].'_plaine']) ;
							$_POST['affectation_'.$_SESSION['typeRessource'].'_foret'] = htmlspecialchars($_POST['affectation_'.$_SESSION['typeRessource'].'_foret']) ;
							$_POST['affectation_'.$_SESSION['typeRessource'].'_marecage'] = htmlspecialchars($_POST['affectation_'.$_SESSION['typeRessource'].'_marecage']) ;

							$ouvriere_ressource_plaine = $_POST['affectation_'.$_SESSION['typeRessource'].'_plaine'] + $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_plaine'] ;
							$ouvriere_ressource_foret = $_POST['affectation_'.$_SESSION['typeRessource'].'_foret'] + $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_foret'] ;
							$ouvriere_ressource_marecage = $_POST['affectation_'.$_SESSION['typeRessource'].'_marecage'] + $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_marecage'] ;
							
							// variable pour savoir quel champ de la bdd est changé
							$ressource_plaine = 'ouvriere_'.$_SESSION['typeRessource'].'_plaine' ;
							$ressource_foret = 'ouvriere_'.$_SESSION['typeRessource'].'_foret' ;
							$ressource_marecage = 'ouvriere_'.$_SESSION['typeRessource'].'_marecage' ;
							
							echo '11</br>';
														
						}
						elseif(($_POST['affectation_'.$_SESSION['typeRessource'].'_plaine']  <= 0  ) OR ($_POST['affectation_'.$_SESSION['typeRessource'].'_foret']  <= 0  ) OR($_POST['affectation_'.$_SESSION['typeRessource'].'_marecage']  <= 0)) // on gere le cas ou au moins un champ est egale a zero , ou negatif ou non rempli
						{
							//variable nombre d ouvrieres deja presente sur le terrain
							$ouvriere_ressource_plaine = $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_plaine'];
							$ouvriere_ressource_foret = $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_foret'];
							$ouvriere_ressource_marecage = $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_marecage'];

							// variable pour savoir quel champ de la bdd est changé
							$ressource_plaine = 'ouvriere_'.$_SESSION['typeRessource'].'_plaine' ;
							$ressource_foret = 'ouvriere_'.$_SESSION['typeRessource'].'_foret' ;
							$ressource_marecage = 'ouvriere_'.$_SESSION['typeRessource'].'_marecage' ;
							
							echo '12 </br>';
						}
						else
						{
							
						}
						echo '1</br>' ;
					}
					elseif(isset($_POST['affectation_cire']) AND isset($_POST['ouvriere_cire']))
					{
						
						$_POST['affectation_cire'] = htmlspecialchars($_POST['affectation_cire'] ) ;
						
						if( $_POST['affectation_cire'] > 0 )
						{
							$ouvriere_cire = $_POST['affectation_cire'] + $_SESSION['ouvriere_cire'] ;
												
							$ressource = $_POST['ouvriere_cire'] ;
						}
						elseif($_POST['affectation_cire'] <= 0 )
						{
							$ouvriere_cire = $_SESSION['ouvriere_cire'] ;
												
							$ressource = $_POST['ouvriere_cire'] ;
						}
						else
						{
							
						}
				
						echo '2</br>';
					}
					else
					{
						echo '3</br>' ;
					}
				}
				elseif(isset($_POST['retirer']) AND $_POST['retirer'] == 'Retirer')
				{
					//gestion du cas particulier de la nourriture 
					if($_SESSION['typeRessource'] == 'nourriture_abeille' OR $_SESSION['typeRessource'] == 'nourriture_fourmis' OR $_SESSION['typeRessource'] == 'nourriture_termite' OR $_SESSION['typeRessource'] == 'nourriture_arraigne')
					{
						unset($_SESSION['typeRessource']);
						$_SESSION['typeRessource'] = 'nourriture' ;
					}
					
					// on gere le cas de la ressource selectioné
					if((isset($_POST['affectation_'.$_SESSION['typeRessource'].'_plaine']) OR isset($_POST['affectation_'.$_SESSION['typeRessource'].'_foret']) OR isset($_POST['affectation_'.$_SESSION['typeRessource'].'_marecage'])) AND (isset($_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_plaine']) OR isset($_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_foret']) OR isset($_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_marecage'])))
					{
						
						// on gere le cas ou au moins un champ est rempli et positif
						if(($_POST['affectation_'.$_SESSION['typeRessource'].'_plaine']  > 0  ) OR ($_POST['affectation_'.$_SESSION['typeRessource'].'_foret']  > 0  ) OR($_POST['affectation_'.$_SESSION['typeRessource'].'_marecage']  > 0  ))
						{
							$_POST['affectation_'.$_SESSION['typeRessource'].'_plaine'] = htmlspecialchars($_POST['affectation_'.$_SESSION['typeRessource'].'_plaine']) ;
							$_POST['affectation_'.$_SESSION['typeRessource'].'_foret'] = htmlspecialchars($_POST['affectation_'.$_SESSION['typeRessource'].'_foret']) ;
							$_POST['affectation_'.$_SESSION['typeRessource'].'_marecage'] = htmlspecialchars($_POST['affectation_'.$_SESSION['typeRessource'].'_marecage']) ;

							$ouvriere_ressource_plaine =  $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_plaine'] - $_POST['affectation_'.$_SESSION['typeRessource'].'_plaine'] ;
							$ouvriere_ressource_foret = $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_foret'] - $_POST['affectation_'.$_SESSION['typeRessource'].'_foret'];
							$ouvriere_ressource_marecage = $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_marecage'] - $_POST['affectation_'.$_SESSION['typeRessource'].'_marecage'];
							
							// variable pour savoir quel champ de la bdd est changé
							$ressource_plaine = 'ouvriere_'.$_SESSION['typeRessource'].'_plaine' ;
							$ressource_foret = 'ouvriere_'.$_SESSION['typeRessource'].'_foret' ;
							$ressource_marecage = 'ouvriere_'.$_SESSION['typeRessource'].'_marecage' ;
							
							echo '1133</br>';
														
						}
						elseif(($_POST['affectation_'.$_SESSION['typeRessource'].'_plaine']  <= 0  ) OR ($_POST['affectation_'.$_SESSION['typeRessource'].'_foret']  <= 0  ) OR($_POST['affectation_'.$_SESSION['typeRessource'].'_marecage']  <= 0)) // on gere le cas ou au moins un champ est egale a zero , ou negatif ou non rempli
						{
							//variable nombre d ouvrieres deja presente sur le terrain
							$ouvriere_ressource_plaine = $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_plaine'];
							$ouvriere_ressource_foret = $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_foret'];
							$ouvriere_ressource_marecage = $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_marecage'];

							// variable pour savoir quel champ de la bdd est changé
							$ressource_plaine = 'ouvriere_'.$_SESSION['typeRessource'].'_plaine' ;
							$ressource_foret = 'ouvriere_'.$_SESSION['typeRessource'].'_foret' ;
							$ressource_marecage = 'ouvriere_'.$_SESSION['typeRessource'].'_marecage' ;
							
							echo '1233 </br>';
						}
						else
						{
							
						}
						
					}
					elseif(isset($_POST['affectation_cire']) AND isset($_POST['ouvriere_cire']))//on gere le cas particulier de la cire 
					{
						
						$_POST['affectation_cire'] = htmlspecialchars($_POST['affectation_cire'] ) ;
						
						if( $_POST['affectation_cire'] > 0 )
						{
							$ouvriere_cire = $_SESSION['ouvriere_cire'] - $_POST['affectation_cire'] ;
												
							$ressource = $_POST['ouvriere_cire'] ;
						}
						elseif($_POST['affectation_cire'] <= 0 )
						{
							$ouvriere_cire = $_SESSION['ouvriere_cire'] ;
												
							$ressource = $_POST['ouvriere_cire'] ;
						}
						else
						{
							
						}
				
						echo '233</br>';
					}
					else
					{
						echo '333</br>' ;
					}
					echo'15';
				}
				elseif(isset($_POST['reset']) AND $_POST['reset'] == 'Reset')
				{
					/* cas particulier de la nourriture voir si peut aller ailleur pour eviter les repetition de code*/
					if($_SESSION['typeRessource'] == 'nourriture_abeille' OR $_SESSION['typeRessource'] == 'nourriture_fourmis' OR $_SESSION['typeRessource'] == 'nourriture_termite' OR $_SESSION['typeRessource'] == 'nourriture_arraigne')
					{
						unset($_SESSION['typeRessource']);
						$_SESSION['typeRessource'] = 'nourriture' ;
					}
					
					$ressource_plaine = 'ouvriere_'.$_SESSION['typeRessource'].'_plaine' ;
					$ressource_foret = 'ouvriere_'.$_SESSION['typeRessource'].'_foret' ;
					$ressource_marecage = 'ouvriere_'.$_SESSION['typeRessource'].'_marecage' ;
					
					if ((isset ($_POST['plaine']) AND $_POST['plaine'] == 'Plaine')  OR (isset ($_POST['foret']) AND $_POST['foret'] == 'Foret') OR (isset ($_POST['marecage']) AND $_POST['marecage'] == 'Marecage' ))
					{

						$ouvriere_ressource_plaine = $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_plaine'];
						$ouvriere_ressource_foret = $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_foret'];
						$ouvriere_ressource_marecage = $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_marecage'];
						
						var_dump($ressource_plaine);
						var_dump($ressource_foret);
						var_dump($ressource_marecage);
						var_dump($ouvriere_ressource_plaine);
						var_dump($ouvriere_ressource_foret);
						var_dump($ouvriere_ressource_marecage);
						var_dump($_POST['plaine']);
						var_dump($_POST['foret']);
						var_dump($_POST['marecage']);
						
						if(isset($_POST['plaine']) AND $_POST['plaine'] == 'Plaine')
						{
							$ouvriere_ressource_plaine = 0;

							echo'1811A</br>';
						}
						
						
						if(isset($_POST['foret']) AND $_POST['foret'] == 'Foret')
						{
							$ouvriere_ressource_foret = 0;
							
							echo'1811B</br>';
						}
						
						
						if(isset($_POST['marecage']) AND $_POST['marecage'] == 'Marecage')
						{
							$ouvriere_ressource_marecage = 0 ;
							
							echo'1811C</br>';
						}

						echo'1811</br>';
					}
					elseif (((empty($_POST['plaine']) AND isset($_POST['plaine'])) OR (empty($_POST['foret']) AND isset($_POST['foret']))  OR (empty ($_POST['marecage'] ) AND isset($_POST['marecage']))) OR (isset($_POST['affectation_cire']) AND empty($_POST['affectation_cire'])) OR ((!isset($_POST['plaine']) AND empty($_POST['plaine'])) AND (!isset($_POST['foret']) AND empty($_POST['foret'])) AND (!isset($_POST['marecage']) AND empty($_POST['marecage'])))) //si le bouton reset est activé sans avoir selectioné de terrain
					{

						$ressource_plaine = 'ouvriere_'.$_SESSION['typeRessource'].'_plaine' ;
						$ressource_foret = 'ouvriere_'.$_SESSION['typeRessource'].'_foret' ;
						$ressource_marecage = 'ouvriere_'.$_SESSION['typeRessource'].'_marecage' ;
						
						if (empty($_POST['plaine']))
						{
							$ouvriere_ressource_plaine = $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_plaine'];
						}
						
						if (empty($_POST['foret']))
						{
							$ouvriere_ressource_foret = $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_foret'];
						}
						
						if (empty($_POST['marecage']))
						{
							$ouvriere_ressource_marecage = $_SESSION['ouvriere_'.$_SESSION['typeRessource'].'_marecage'];
						}
						
						if (empty($_POST['affectation_cire']))
						{
							$ouvriere_cire = 0;
							
							$ressource = $_POST['ouvriere_cire'] ;
							
							echo'188333p</br>';
						}
						echo'188R</br>';
						
						var_dump($_POST['affectation_cire']);
						
						var_dump(isset($_POST['affectation_cire']));
						var_dump(empty($_POST['affectation_cire']));
						
					}
					else
					{

							echo'1811D</br>';
						
					}
					
					echo'18</br>';
				}
				else
				{
					echo'16';
				}
						
						
					if($_SESSION['typeRessource'] == 'cire')
					{
						
						if($ouvriere_cire <= $_SESSION['ouvriereDisponible'] OR (isset($_POST['retirer']) AND $_POST['retirer'] == 'Retirer'))
						{
							
							if($ouvriere_cire < 0 )
							{
								$ouvriere_cire = 0 ;
							}
							
							$reqUpdateOuvriereRessource = $bdd->prepare('UPDATE ressource SET '.$ressource.'  =:ouvriere_cire  WHERE id_joueur = :id_joueur');
							$reqUpdateOuvriereRessource->execute(array(
							'ouvriere_cire' => $ouvriere_cire,
							'id_joueur' =>$_SESSION['id_joueur']
							));
							
							$reqUpdateOuvriereRessource->closeCursor();

						}	
					}
					else
					{
						echo'444</br>';
						$ouvriere_total = $_POST['affectation_'.$_SESSION['typeRessource'].'_plaine'] + $_POST['affectation_'.$_SESSION['typeRessource'].'_foret'] + $_POST['affectation_'.$_SESSION['typeRessource'].'_marecage'] ;
						
						//cas ou lorsque l on retire des ouvrieres le nombre d ouvris retirer est superieur a celle presente sur le teerrain
						if(( $ouvriere_total  <= $_SESSION['ouvriereDisponible'] ) OR (isset($_POST['retirer']) AND $_POST['retirer'] == 'Retirer'))
						{
							if($ouvriere_ressource_plaine< 0 OR $ouvriere_ressource_foret < 0 OR $ouvriere_ressource_marecage < 0)
							{
								if($ouvriere_ressource_plaine< 0)
								{
									$ouvriere_ressource_plaine = 0 ;

								}
								
								if($ouvriere_ressource_foret < 0 )
								{
									$ouvriere_ressource_foret = 0 ;
								}
								
								if($ouvriere_ressource_marecage < 0)
								{
									$ouvriere_ressource_marecage = 0 ;
								}
								
							}
							
							$reqUpdateOuvriereRessource = $bdd->prepare('UPDATE ressource SET '.$ressource_plaine.'  =:ouvriere_ressource_plaine, '.$ressource_foret.'  =:ouvriere_ressource_foret, '.$ressource_marecage.'  =:ouvriere_ressource_marecage  WHERE id_joueur = :id_joueur');
							$reqUpdateOuvriereRessource->execute(array(
							'ouvriere_ressource_plaine' => $ouvriere_ressource_plaine,
							'ouvriere_ressource_foret' => $ouvriere_ressource_foret,
							'ouvriere_ressource_marecage' => $ouvriere_ressource_marecage,
							'id_joueur' =>$_SESSION['id_joueur']
							));
								
							$reqUpdateOuvriereRessource->closeCursor();

						}
						else
						{
							echo '123';
						}
					}
				}
				else
				{
					echo'78';
				}
				
				header('Location:ressource.php');
				
			}
			else
			{
				echo '79';
			}

	}
	else
	{
		echo'Dis t\'essairais pas de me hacker petit malin ? </br>
			Si tu veux jouer inscrits toi ';?><a href="inscription.php">ICI</a><?php
			
			header('Refresh:3;connexion.php');
	}
?>	