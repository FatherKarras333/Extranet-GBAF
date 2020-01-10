<?php
session_start();

		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root', ''); 
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}

if (isset($_POST['formulaire_connexion']))
{
	if (!empty($_POST['pseudo_connection']) AND !empty($_POST['motdepasse_connection']))
	{
		$pseudoConnection = htmlspecialchars($_POST['pseudo_connection']);
		$motDePasseConnection = sha1($_POST['motdepasse_connection']);
	 
		$requeteUtilisateur = $bdd->prepare('SELECT * FROM members WHERE pseudo = :pseudo AND mot_de_passe = :motdepasse');
		$requeteUtilisateur->execute([':pseudo'=>$pseudoConnection, ':motdepasse'=>$motDePasseConnection]);
		$utilisateurExiste = $requeteUtilisateur->rowCount();
		if ($utilisateurExiste === 1) 
		{
			$utilisateurInfo = $requeteUtilisateur->fetch(); 
			$_SESSION['id'] = $utilisateurInfo['id'];
			$_SESSION['pseudo'] = $utilisateurInfo['pseudo'];
			$_SESSION['nom'] = $utilisateurInfo['nom'];
			$_SESSION['prenom'] = $utilisateurInfo['prenom'];
			$_SESSION['question'] = $utilisateurInfo['question'];
			$_SESSION['reponse'] = $utilisateurInfo['reponse'];
			header('location: accueil.php');
		}
		else
		{
			$message = ' Pseudo ou mot de passe incorrect';
		}
	}
	else
	{
		$message = ' Tous les champs doivent être remplis';
	}

}

?>

	<?php include('includes/head_deconnecte.php'); ?>

	<body>

			<?php include('includes/header_deconnecte.php'); ?>

			<main class="vertical_align">
					<form method="POST" class="connexion">
						<h3 class="title"> Connexion</h3>
						<label for="pseudo_connection"> Pseudo*</label><br/>
						<input type="text" name="pseudo_connection" id="pseudo_connection" placeholder="Entrer votre nom d'utilisateur"><br/>

						<label for="motdepasse_connection"> Mot de passe*</label><br/>
						<input type="password" name="motdepasse_connection" id="motdepasse_connection" placeholder="Entrer votre mot de passe">

						<input type="submit" name="formulaire_connexion" value="Connexion"><br/>

						<a href="motdepasseoublie.php"> mot de passe oublié ? </a>
						<p> Vous n'avez pas de compte ?  <a href="inscription.php"> Inscrivez-vous</a></p>
					</form>
					<?php
					if (isset($message)) 
					{
					?>
						<p class="message"> <?php echo $message ; ?></p>
					<?php
					}
					?>
				
			</main>
			
			<?php include('includes/footer.php'); ?>
	</body>
</html>