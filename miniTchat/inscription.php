<!DOCTYPE html>

<?php

	if(isset($_POST['pseudo']) AND isset($_POST['pass']) AND isset($_POST['verifPass']) AND isset($_POST['mail']))
	{
		// On rend inoffensives les balises HTML que le visiteur a pu rentrer
		$_POST['mail'] = htmlspecialchars($_POST['mail']); 
		$_POST['pseudo'] = htmlspecialchars($_POST['pseudo']); 
		$_POST['pass'] = htmlspecialchars($_POST['pass']); 
		$_POST['verifPass'] = htmlspecialchars($_POST['verifPass']);
			
		if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']))
		{
			$mail = 'valide' ;
		}
		else
		{
			$mail = null ;
			
			echo 'L\'adresse E@mail ' . $_POST['mail'] . ' n\'est pas valide !</br>';
		}
		
		
		$nbrCaracterePseudo = strlen($_POST['pseudo']) ; // fonction qui compte le nombre de caractere de la chaine
		
		$verifPseudoCommenceParUnChiffre = str_split($_POST['pseudo']) ;//fonction qui eclate caractere par caractere et le renvoit dans un tableau

		
		if (preg_match("#^[a-zA-Z]{3}[a-zA-Z0-9]{0,252}$#", $_POST['pseudo']))
		{
			$pseudo = 'valide' ;
		}
		elseif($nbrCaracterePseudo > 255)
		{
			$pseudo = null ;
			
			echo 'Le pseudo  ' . $_POST['pseudo'] . ' n\'est pas <strong>valide</strong> , car le nombres de caracteres du pseudo et superieur aux 255 prevus !</br>';
		}
		elseif(is_numeric($verifPseudoCommenceParUnChiffre[0]))
		{
			$pseudo = null ;
			
			echo 'Le pseudo  ' . $_POST['pseudo'] . ' n\'est pas <strong>valide</strong> , car il commence par un chiffre !</br>';
		}
		else
		{
			$pseudo = null ;
			
			echo 'Le pseudo ' . $_POST['pseudo'] . ' n\'est pas valide, recommencez !</br>';
		}
		
		if(!empty($_POST['pseudo']) AND !empty($_POST['pass']) AND !empty($_POST['verifPass']) AND !empty($_POST['mail']) AND ($_POST['pass'] == $_POST['verifPass']) AND $mail == 'valide' AND $pseudo == 'valide')
		{
			
				//connection a la bdd
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=minitchat;charset=utf8','root','',
					array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
				}
				catch(Exception $e)
				{
					die('Erreur : '.$e->getMessage());
				}
				
				//verifie si le pseudo est libre
				//verifie si l adresse mail n est pas deja prise
				
				$req = $bdd->prepare('SELECT mail FROM membre WHERE  mail = :mail ');
				$req->execute(array(
				'mail' => $_POST['mail']
				));
				
				$resultatMail = $req->fetch();
				
				$req->closeCursor();
				
				
				//verifie si le pseudo est libre
				
				$req = $bdd->prepare('SELECT pseudo FROM membre WHERE  pseudo = :pseudo ');
				$req->execute(array(
				'pseudo' => $_POST['pseudo']
				));
				
				$resultatPseudo = $req->fetch();
				
				$req->closeCursor();
				
				//test disponibilité du mail
				if($resultatMail['mail']OR $resultatPseudo['pseudo'])
				{
					if($resultatMail['mail'] )
					{
						echo 'Cet E@mail est deja pris ! </br>
							Si vous avez oublié vos identifiant ? ';?><a href="">CLIQUEZ ICI</a></br><?php
					}
													
					//test disponibilité du pseudo
					if($resultatPseudo['pseudo'])
					{
						echo 'Ce pseudo est deja pris veuillez en choisir un autre</br>';
							
					}
					
				}
				elseif(!isset($resultatPseudo['pseudo'])AND !isset($resultatMail['mail']))
				{
					//sinon on entre les variable d inscription
					
					$req = $bdd->prepare('INSERT INTO membre (pseudo, pass, mail) VALUES(:pseudo,:pass,:mail)');
					$req->execute(array(
					'pseudo' => $_POST['pseudo'],
					'pass' => $_POST['pass'],
					'mail' => $_POST['mail']
					));
					
					$req->closeCursor();
					
					echo 'Vôtre Inscription est un succé ' ;
					
					header('Refresh:5;accueil.php');
				}
				else
				{
					echo 'presque'
;				}

				
					
		}
		elseif(empty($_POST['pseudo']) OR empty($_POST['pass']) OR empty($_POST['verifPass']) OR empty($_POST['mail']) OR ($_POST['pass'] !== $_POST['verifPass']) OR $mail !== 'valide' OR $pseudo !== 'valide')
		{
			
			if(empty($_POST['pseudo']))
			{
				echo 'Vous n\'avez pas renseigné vôtre pseudo !</br> ';
			}
			
			
			if(empty($_POST['pass']))
			{
				echo 'Vous n\'avez pas renseigné vôtre mot de passe !</br> ';
			}
			
			
			if(empty($_POST['verifPass']))
			{
				echo 'Vous n\'avez pas renseigné la vérification de vôtre mot de passe !</br> ';
			}
			
			
			if(empty($_POST['mail']))
			{
				echo 'Vous n\'avez pas renseigné vôtre E@mail ! </br> ';
			}
			
			if($_POST['pass'] !== $_POST['verifPass'])
			{
				echo' La verification de vôtre mot de passe ne correspond pas !';
			}
			
		}
		else
		{
			echo ' Erreur 2 ';
		}
	}
	elseif(!isset($_POST['pseudo']) OR !isset($_POST['pass']) OR !isset($_POST['verifPass']) OR !isset($_POST['mail']))
	{
		$_POST['pseudo'] = null ;
		$_POST['mail'] = null ;
		$_POST['pass'] = null ;
		$_POST['verifPass'] = null ;
	}
	else
	{
		echo ' Erreur 1 ';
	}

?>

<html>

	<head>
	
		<meta charset="utf-8" />
		<title>TP : Inscription Mini-Tchat</title>
	
	</head>
	
	<body>
	
		<h1>Inscription au mini-Tchat</h1>
	
		<form method="post" action="inscription.php" >
		
			<label for="pseudo">Choissisez un pseudo : <label><input type="text" name="pseudo" id="pseudo" placeholder="Entrez vôtre pseudo ICI" title="Entrez vôtre pseudo ICI" /></br>
			
			<label for="mail">Indiquez vôtre E@mail : <label><input type="text" name="mail" id="mail" placeholder="Entrez vôtre mail ICI" title="Entrez vôtre mail ICI" /></br>
			
			<label for="pass">Choissisez un mot de passe : <label><input type="text" name="pass" id="pass" placeholder="Entrez vôtre mot de passe ICI" title="Entrez vôtre mot de passe ICI" /></br>
			
			<label for="verifPass">Verification de vôtre mot de passe : <label><input type="text" name="verifPass" id="verifPass" placeholder="Retapez vôtre mot de passe ICI" title="Retapez vôtre mot de passe ICI" /></br>
			
			</br>
			
			<input type="submit" value="Valider mon Inscription" /></br>
			
		</form>
		
		</br>
		
		<a href="accueil.php" >Retour accueil</a>
	
	</body>
	
</html>