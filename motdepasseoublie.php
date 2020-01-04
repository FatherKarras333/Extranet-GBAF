<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" type="text/css" href="form.css">
		<meta charset="utf-8">
		<title> GBAF </title>
	</head>

	<body>
			<?php include('includes/header_deconnecte.php'); ?>

			<div class="vertical_align">
			<div class="form" id="connexion" style="margin-bottom: 50px;">
				<h3 class="title"> Mot de passe oublié</h3>
				<form method="POST" action="">
					<label for="pseudo"> Pseudo*</label><br/>
					<input type="text" name="pseudo" placeholder="Entrer votre pseudo"><br/>

					<label for="question"> Question secrète : </label> <br/>
							<select name="question"> 
								<option value=""> --Choisissez une question--</option>
								<option value="Nom de jeune fille de votre mère"> Nom de jeune fille de votre mère</option>
								<option value=" Prénom de votre grand-père"> Prénom de votre grand père </option>
								<option value=" Chanteur préféré"> Votre chanteur préféré </option>
							</select> <br/>

					<label for="reponse"> Réponse à la question secrète</label><br/>
					<input type="text" name="reponse" placeholder="Entrer la réponse à la question secrète"><br/>

					<label for="nouveau_motdepasse"> Nouveau mot de passe*</label><br/>
					<input type="password" name="nouveau_motdepasse" pattern=".{10,}" title="10 caractères minimum" placeholder="Saisissez un nouveau mot de passe">

					<input type="submit" name="formulaire_motdepasseoublié" value="Envoyer"><br/>
					

				</form><br /><br />
				
			</div>
			</div>
			<?php include('includes/footer.php'); ?>
	</body>
</html>