<?php
session_start();

if (isset($_SESSION['id'])) 
{
?>
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
			<?php include('includes/header_connecte.php'); ?>

			<div class="vertical_align">
				<div class="form" id="formulaire_modification">
					<h3 class="title"> Editer mon profil</h3>
					<form method="post" action="">
						<label for="nom"> Nom: </label> <br/>
						<input type="text" name="nom" placeholder="<?php echo  $_SESSION['nom']; ?>"> <br/>
						
						<label for="prenom"> Prénom : </label> <br/>
						<input type="text" name="prenom" placeholder="<?php echo  $_SESSION['prenom']; ?>"> <br/>

						<label for="nouveau_pseudo"> Nouveau Pseudo : </label> <br/>
						<input type="text" name="nouveau_pseudo" placeholder= "<?php echo  $_SESSION['pseudo']; ?>"> <br/>

						<label for="motdepasse_actuel"> Mot de passe actuel : </label> <br/>
						<input type="password" name="motdepasse_actuel" placeholder="Saisissez votre mot de passe"> <br/>
						
						<label for="nouveau_motdepasse"> Nouveau mot de passe : </label> <br/>
						<input type="password" name="nouveau_motdepasse" pattern=".{10,}" title="10 caractères minimum" placeholder="Saisissez un nouveau mot de passe"> <br/>
						
						<label for="nouvelle_question"> Question secrète : </label> <br/>
							<select name="nouvelle_question"> 
								<option value=""> --<?php echo  $_SESSION['question']; ?>-- </option>
								<option value="Nom de jeune fille de votre mère"> Nom de jeune fille de votre mère</option>
								<option value=" Prénom de votre grand-père"> Prénom de votre grand père </option>
								<option value=" Chanteur préféré"> Votre chanteur préféré </option>
							</select> <br/>

						<label for="nouvelle_reponse"> Réponse à la question secrète : </label> <br/>
						<input type="text" name="nouvelle_reponse"  placeholder="<?php echo  $_SESSION['reponse']; ?>"> <br/>

						<input type="submit" name="formulaire_edition" value="Mettre à jour">
						
					</form><br />

				</div>
			</div>

			<?php include('includes/footer.php'); ?>
	</body>
</html>
<?php
}
else
{
	header("Location: index.php");
}
?>