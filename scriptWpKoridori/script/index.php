!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="fr" dir="ltr">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<meta name="keywords" content="net2ftp, web, ftp, based, web-based, xftp, client, PHP, SSL, password, server, free, gnu, gpl, gnu/gpl, net, net to ftp, netftp, connect, user, gui, interface, web2ftp, edit, editor, online, code, php, upload, download, copy, move, delete, zip, tar, unzip, untar, recursive, rename, chmod, syntax, highlighting, host, hosting, ISP, webserver, plan, bandwidth" />
<meta name="description" content="net2ftp is a web based FTP client. It is mainly aimed at managing websites using a browser. Edit code, upload/download files, copy/move/delete directories recursively, rename files and directories -- without installing any software." />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<link rel="shortcut icon" href="favicon.ico" />
<link rel="apple-touch-icon" href="favicon.png"/>
<title>net2ftp - a web based FTP client</title>
<script type="text/javascript"><!--
function CheckInput(form) {
	var u,p1,p2,e;
	s=form.ftpserver.value;
	u=form.username.value;
	p=form.password.value;
	if (s.length==0) {
		form.ftpserver.focus();
		alert("Veuillez saisir un serveur FTP.");
		return false;
	}
	if (u.length==0) {
		form.username.focus();
		alert("Veuillez saisir un nom d'utilisateur.");
		return false;
	}
	return true;
}
function do_anonymous(form) {
	var checked = form.anonymous.checked;
	if (checked == true) {
		vars_defined = 'true';
		last_username = form.username.value;
		last_password = form.password.value;
		form.username.value = "anonymous";
		form.password.value = "user@net2ftp.com";
	} else {
		form.username.value = last_username;
		form.password.value = last_password;
	}
	return true;
}
function ClearCookies() {
	document.forms['LoginForm'].state.value='clearcookies';
	document.forms['LoginForm'].state2.value='';
	document.forms['LoginForm'].submit();
}
//--></script>
<link rel="stylesheet" type="text/css" href="/skins/blue/css/main.css.php?ltr=ltr&amp;image_url=%2Fskins%2Fblue%2Fimages" />
</head>
<body onload="">

<!-- Template /skins/blue/login.template.php begin -->
<!-- Template /skins/blue/login_other.template.php begin -->
<!-- Template /skins/blue/header_login.template.php begin -->
<div id="container">
	<div id="head">
		<div id="headleft">
			<a href="http://www.net2ftp.com" target="_blank"><img src="/skins/blue/images/img/logo.png" alt="net2ftp" style="width: 193px; height: 59px; border: 0;" />
</a>
		</div>
		<div id="headright">
			<h2 style="text-align: left;">net2ftp - A web based FTP client</h2>
		</div>
	</div>
<!-- Template /skins/blue/header_login.template.php end -->
	<div id="main">
		<div id="mainleft">
			<form id="LoginForm" action="/index.php" method="post" onsubmit="return CheckInput(this);">
				<table style="background-color: #bbd2e0; border: 1px solid #003250;" border="0" cellpadding="2" cellspacing="0">
					<tbody>
						<tr>
							<td style="padding-left: 10px; vertical-align: top; width: 20%; padding-top:5px;">Serveur FTP</td>
							<td colspan="2" style="vertical-align: top; padding-top:5px;">
									<input type="hidden" name="ftpserver" value="ftp.cluster030.hosting.ovh.net" />
									<b>ftp.cluster030.hosting.ovh.net</b>
  
									<input type="hidden" name="ftpserverport" value="21" />
  
							</td>
						</tr>
						<tr style="vertical-align: middle;"> 
							<td style="padding-left: 10px;">Nom d'utilisateur</td>
							<td style="width: 46%;"><input name="username" value="koridot" type="text" style="width:230px;" /></td>
<!--							<td style="width: 27%;"><input name="anonymous" value="1" onclick="do_anonymous(form);" type="checkbox" />&nbsp; Anonyme</td>-->
						</tr>
						<tr style="vertical-align: middle;"> 
							<td style="padding-left: 10px;">Mot de passe</td>
							<td><input name="password" value="" type="password" style="width:230px;" /></td>
<!--							<td><span><input name="passivemode" value="yes" type="checkbox"  />&nbsp; Mode passif</span></td>-->
						</tr>
<!--
						<tr style="vertical-align: middle;"> 
							<td style="padding-left: 10px;">Répertoire de départ</td>
							<td><input name="directory" value="/www/wp-includes/scriptPerso" type="text" style="width:230px;" /></td>
								<td><span><input name="sslconnect" value="yes" type="checkbox"  />&nbsp; SSL</span></td>
						</tr>
-->
						<tr style="vertical-align: middle;"> 
							<td style="padding-left: 10px;">Langue</td>
							<td>
<select name="language" id="language" onchange="document.forms['LoginForm'].state.value='login'; document.forms['LoginForm'].submit();" style="width:120px;" class="input_select">
<option value="ar-utf" >Arabic UTF-8</option>
<option value="zh" >Simplified Chinese</option>
<option value="cs" >Czech</option>
<option value="da" >Danish UTF-8</option>
<option value="nl" >Dutch</option>
<option value="en" >English</option>
<option value="en-utf" >English UTF-8</option>
<option value="fr" selected="selected">French</option>
<option value="de" >German</option>
<option value="fi" >Finnish</option>
<option value="he" >Hebrew</option>
<option value="it" >Italian</option>
<option value="pl" >Polish</option>
<option value="pt" >Portugese</option>
<option value="es" >Spanish</option>
<option value="sv" >Swedish</option>
<option value="tr" >Turkish</option>
<option value="vi" >Vietnamese</option>
</select>
							</td>
							<td></td>
						</tr>
<!--
						<tr style="vertical-align: middle;"> 
							<td style="padding-left: 10px;">Habillement</td>
							<td>
<select name="skin" id="skin"  style="width:120px;" class="input_select">
<option value="blue" selected="selected">Bleu</option>
</select>
							</td>
							<td></td>
						</tr>
-->
						<tr style="vertical-align: middle;"> 
							<td style="padding-left: 10px;">Mode FTP</td>
							<td colspan="2"> 
								<input name="ftpmode" value="binary"        type="radio" />&nbsp; Binary &nbsp; &nbsp;
								<input name="ftpmode" value="automatic" checked="checked" type="radio" />&nbsp; Automatique							</td>
						</tr>
						<tr>
							<td></td>
							<td colspan="2" style="padding-left: 40px;"> 
								<input type="submit" class="button" name="Login" value="Soumettre" alt="Soumettre" />
							</td>
						</tr>
						<tr style="vertical-align: middle; text-align: left;"> 
							<td colspan="1" style="text-align: left; padding-left: 20px; padding-bottom: 5px;"></td>
							<td colspan="2" style="text-align: right; padding-right: 20px; padding-bottom: 5px;">
								<a href="javascript:ClearCookies();">Effacer les cookies</a> &nbsp;
<!--								<a href="/index.php?state=login_small&amp;state2=admin&amp;go_to_state=admin">Admin</a>-->
							</td>
						</tr>
					</tbody>
				</table>
				<input type="hidden" name="state"     value="browse" />
				<input type="hidden" name="state2"    value="main" />
			</form>
<script type="text/javascript"><!--
	document.forms['LoginForm'].username.focus();
//--></script>
		</div>
<!--
		<div id="mainright">
			<div id="tabelfeaturestop">Une fois que vous vous serez identifié, vous pourrez:</div>
			<div id="tablefeature">
				<span>Naviguer sur le serveur FTP</span>
				<p>Une fois identifié, vous pourrez naviguer de répertoire en répertoire, voir tous les sous-répertoires ainsi que les fichiers.</p>
				<span>Uploader des fichiers</span>
				<p>Il existe 3 manières différentes d'uploader des fichiers. Le formulaire standard, le mode upload & unzip et l'applet Java</p>
				<span>Naviguer sur le serveur FTP</span>
				<p>Une fois identifié, vous pourrez naviguer de répertoire en répertoire, voir tous les sous-répertoires ainsi que les fichiers.</p>
				<span>Télécharger des fichiers</span>
				<p>Cliquer sur un fichier pour le télécharger directement.<br>En sélectionnant plusieurs fichiers, cliquer sur "Télécharger" vous permettra de télécharger tous les fichiers dans une seule archive Zip</p>
				<span>Compresser des fichiers au format Zip</span>
				<p>... et sauvegarder cette archive zip sur le serveur FTP, ou bien l'envoyer par courriel</p>
				<span>Unzip files</span>
				<p>Differents formats sont supportés: .zip, .tar, .tgz and .gz.</p>
				<span>Install software</span>
				<p>Choisissez parmi une liste d'applications (PHP requit).</p>
				<span>Copier, déplacer ou supprimer</span>
				<p>Les répertoires sont traités récursivement. Tout leur contenu (sous-répertoires et fichiers) sera également copié, déplacé ou supprimé.</p>
				<span>Copier ou déplacer sur un deuxième serveur FTP</span>
				<p>Il est facile d'importer des fichiers sur votre serveur FTP, ou bien d'exporter des fichiers depuis votre serveur FTP sur un autre serveur FTP</p>
				<span>Renommer et modifier les permissions (chmod)</span>
				<p>Modifier les permissions se fait de manière récursive sur les répertoires.</p>
				<span>Afficher du code avec de la coloration syntaxique</span>
				<p>Les fonctions PHP pointent sur la documentation disponible sur php.net.</p>
				<span>Éditeur de texte brut</span>
				<p>Éditer du texte depuis votre navigateur. Chaque fois que vous sauvegardez les changements, le fichier est automatiquement transféré sur le serveur FTP.</p>
				<span>Éditeurs HTML</span>
				<p>Editer le HTML avec un formulaire WYSIWYG; vous avez le choix entre deux éditeurs</p>
				<span>Éditeur de code</span>
				<p>Éditer du code HTML et PHP avec de la coloration syntaxique.</p>
				<span>Rechercher des mots ou des expressions</span>
				<p>Filtrer les fichiers par leur nom, leur date de dernière modification ou leur taille.</p>
				<span>Calculer la taille</span>
				<p>Calculer la taille des répertoire et des fichiers.</p>
			</div>
		</div>
-->
		<div style="clear: both"></div>
	</div>
<!-- Template /skins/blue/footer.php begin -->
	<div id="foot">
		<a href="/help.html" class="text_white">Aide</a> | 
		<a href="/LICENSE.txt" class="text_white">Licence</a>
	</div>
<!--
	<div id="poweredby">
		Soutenu par net2ftp - a web based FTP client<br />
		Add to: <a href="http://del.icio.us/post?url=http://www.net2ftp.com">Del.icio.us</a> | 
			<a href="http://digg.com/submit?phase=2&amp;url=http://www.net2ftp.com">Digg</a> | 
			<a href="http://reddit.com/submit?url=http://www.net2ftp.com&amp;title=net2ftp%20-%20a%20web%20based%20FTP%20client">Reddit</a>
	</div>
-->
</div>
<!-- Template /skins/blue/footer.php end -->
<!-- Template /skins/blue/login_other.template.php end -->
<!-- Template /skins/blue/login.template.php end -->


</body>
</html>
