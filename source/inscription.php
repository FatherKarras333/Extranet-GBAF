<?php

		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root', ''); 
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}

if (isset($_POST['formulaire_inscription'])) 
{
	if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['pseudo']) AND !empty($_POST['motdepasse']) AND  !empty($_POST['question']) AND !empty($_POST['reponse'])) 
	{
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$motDePasse = sha1($_POST['motdepasse']);
		$question = ($_POST['question']);
		$reponse = htmlspecialchars($_POST['reponse']);

		$pseudolength = strlen($pseudo);
		
		if ($pseudolength <= 30) 
		{
			$motDePasseLength = strlen($motDePasse);
			if($motDePasseLength >= 10)
			{
				$requetePseudo = $bdd->prepare('SELECT * FROM members WHERE pseudo = :pseudo');
				$requetePseudo->execute([':pseudo'=>$pseudo]);
				$pseudoExiste = $requetePseudo->rowCount();
				if ($pseudoExiste === 0) 
				{	
					$insererMembre = $bdd->prepare('INSERT INTO members(nom, prenom, pseudo, mot_de_passe, question, reponse) VALUES (:nom, :prenom, :pseudo, :motdepasse, :question, :reponse)');
					$insererMembre->execute([':nom'=>$nom, ':prenom'=>$prenom, ':pseudo'=>$pseudo, ':motdepasse'=>$motDePasse, ':question'=>$question, ':reponse'=>$reponse]);
					$message = 'Votre compte a bien été créé !';
					header('Location: index.php');
				}
				else
				{
					$message = 'Ce pseudo existe déjà';
				}
			}
			else
			{
				$message = 'Le mot de passe doit comporter au moins 10 caractères';
			}
		}
		else
		{
			$message = " Votre pseudo ne doit pas dépasser 30 caractères !";
		}

	}
	else
	{
		$message = 'Tous les champs doivent être remplis';
	}
}

?>
<?php include('includes/head_deconnecte.php'); ?>

	<body>
			<?php include('includes/header_deconnecte.php'); ?>

			<div class="vertical_align">
				<div class="form">
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

					<?php
						if (isset($message)) 
						{
							echo '<p> <font color="red"> ' . $message. ' </p> ';
						}
					?>
				</div>
			</div>
			<?php include('includes/footer.php'); ?>
	</body>
</html>