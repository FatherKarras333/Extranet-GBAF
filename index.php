<!DOCTYPE html>
<html lang="fr">
	<head>
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" type="text/css" href="form.css">
		<meta charset="utf-8">
		<title> Connexion </title>
	</head>

	<body>

			<div class="vertical_align">
			<div class="form" id="connexion" style="margin-bottom: 50px;">
				<h3 class="title"> Connexion</h3>
				<form method="POST">
					<label for="pseudo_connection"> Pseudo*</label><br/>
					<input type="text" name="pseudo_connection" id="pseudo_connection" placeholder="Entrer votre nom d'utilisateur"><br/>

					<label for="motdepasse_connection"> Mot de passe*</label><br/>
					<input type="password" name="motdepasse_connection" id="motdepasse_connection" placeholder="Entrer votre mot de passe">

					<input type="submit" name="formulaire_connexion" value="Connexion"><br/>

					<a href="motdepasseoublié.php"> mot de passe oublié ? </a>
					<p> Vous n'avez pas de compte ?  <a href="inscription.php"> Inscrivez-vous</a></p>
				</form><br /><br />
				
			</div>
			</div>
			
			<?php include('includes/footer.php'); ?>
	</body>
</html>