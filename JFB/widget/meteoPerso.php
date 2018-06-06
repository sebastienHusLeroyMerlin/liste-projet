<!DOCTYPE html>
		
<html lang="fr"><!-- Precise la langue utilisée pour le contenu-->
			
	<head>
			
		<title>Widget Perso</title>
		<link rel="stylesheet" href="style.css" >
				
			
	</head>
			
	<body>
	
		<div id="cadrePrincipal">
			
			<header>
			
				<h1><?php 
								
								$mois = date('m') ; 
								$jour = date('d') ; 
								$annee = date('Y') ; 
									
								if ($mois == '01')
								{
									$mois = "Janvier" ;
								}
								elseif ($mois == '02')
								{
									$mois = "Février" ;
								}
								elseif ($mois == '03')
								{
									$mois = "Mars" ;
								}
								elseif ($mois == '04')
								{
									$mois = "Avril" ;
								}
								elseif ($mois == '05')
								{
									$mois = "Mai" ;
								}
								elseif ($mois == '06')
								{
									$mois = "Juin" ;
								}
								elseif ($mois == '07')
								{
									$mois = "Juillet" ;
								}
								elseif ($mois == '08')
								{
									$mois = "Aout" ;
								}
								elseif ($mois == '09')
								{
									$mois = "Septembre" ;
								}
								elseif ($mois == '10')
								{
									$mois = "Octobre" ;
								}
								elseif ($mois == '11')
								{
									$mois = "Novembre" ;
								}
								elseif ($mois == '12')
								{
									$mois = "Décembre" ;
								}
								else
								{
									echo "Une erreur est survenue pendant l'affichage de la date !" ;
								}
								
								echo $jour.' '.$mois.' '.$annee ;
								
						?>
						
				</h1>
				
				<div class="picto">
				
					
				
				</div>

			</header>

			moi


		</div>
		
	</body>
		
</html>


