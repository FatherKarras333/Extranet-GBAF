<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" type="text/css" href="form.css">
		<meta charset="utf-8">
		<title> Inscription </title>
	</head>

	<body>
			<?php include('includes/header_deconnecte.php'); ?>

			<div class="vertical_align">
				<div class="form" style="margin-bottom: 50px;">
					<h3 class="title"> Inscription</h3>
					<form method="post">
						<label for="nom"> Nom: </label> <br/>
						<input type="text" name="nom" placeholder="Entrer votre nom"> <br/>
						
						<label for="prenom"> Prénom : </label> <br/>
						<input type="text" name="prenom" placeholder="Entrer votre prénom"> <br/>
						 
						<label for="pseudo"> Pseudo : </label> <br/>
						<input type="text" name="pseudo" placeholder=" Choisissez un nom d'utilisateur"> <br/>
						
						<label for="motdepasse"> Mot de passe : </label> <br/>
						<input type="password" name="motdepasse" pattern=".{10,}" title="10 caractères minimum" placeholder="Saisissez votre mot de passe"> <br/>
						
						<label for="question"> Question secrète : </label> <br/>
							<select name="question"> 
								<option value=""> --Choisissez une question--</option>
								<option value="Nom de jeune fille de votre mère"> Nom de jeune fille de votre mère</option>
								<option value=" Prénom de votre grand-père"> Prénom de votre grand père </option>
								<option value=" Chanteur préféré"> Votre chanteur préféré </option>
							</select> <br/>

						<label for="reponse"> Réponse à la question secrète : </label> <br/>
						<input type="text" name="reponse" placeholder="Tapez la réponse"> <br/>

						<input type="submit" name="formulaire_inscription" value="Envoyez">
						
					</form>
				</div>
			</div>
			<?php include('includes/footer.php'); ?>
	</body>
</html>