<?php 
session_start();

		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=vifl4713_bdd;charset=utf8','vifl4713_bdd', 'LOCWqSqgX2PduJlbyC'); 
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}

if (isset($_POST['formulaire_motdepasseoublié']))
{
	if (!empty($_POST['pseudo']) AND !empty($_POST['question']) AND !empty($_POST['reponse']) AND !empty($_POST['nouveau_motdepasse']))
	{	
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$question = htmlspecialchars($_POST['question']);
		$reponse = htmlspecialchars($_POST['reponse']);
		$nouveauMotDePasse = sha1($_POST['nouveau_motdepasse']);

		$motDePasselength = strlen($nouveauMotDePasse);
		if($motDePasselength >= 10)
		{
			$requeteUtilisateur = $bdd->prepare('SELECT * FROM members WHERE pseudo = :pseudo AND question = :question AND reponse = :reponse ');
			$requeteUtilisateur->execute(['pseudo'=>$pseudo, 'question'=>$question, 'reponse'=>$reponse]);
			$utilisateurExiste = $requeteUtilisateur->rowCount();
			if ($utilisateurExiste === 1) 
			{
				$utilisateurInfo = $requeteUtilisateur->fetch();
				$_SESSION['id'] = $utilisateurInfo['id'];
				$insererMotDePasse = $bdd->prepare('UPDATE members SET motdepasse = :motdepasse WHERE id = :id');
				$insererMotDePasse->execute([':motdepasse'=>$nouveauMotDePasse, ':id'=>$_SESSION['id']]);
				header('location: index.php');
			}
			else
			{
			$message = ' Pseudo ou réponse incorrect ';
			}
		}
		else
		{
			$message = 'Le mot de passe doit comporter au moins 10 caractères';
		}
	}
	else
	{
		$message = ' Tous les champs doivent être remplis';
	}

}
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

				<?php
					if (isset($message)) 
					{
					
						echo ' <font color="red"> ' . $message . '  ';

					}
				?>
				
			</div>
			</div>
			<?php include('includes/footer.php'); ?>
	</body>
</html>