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

if (isset($_SESSION['id'])) 
{
	if (isset($_POST['nom']) AND !empty($_POST['nom']) AND $_POST['nom'] != $_SESSION['nom']) 
	{
			$nouveauNom = htmlspecialchars($_POST['nom']);
			
			$insererNom = $bdd->prepare('UPDATE members SET nom = :nom WHERE id = :id');
			$insererNom->execute([':nom'=>$nouveauNom, ':id'=>$_SESSION['id']]);
			$_SESSION['nom'] = $nouveauNom ;
			header('Location: accueil.php ');	
	}

	if (isset($_POST['prenom']) AND !empty($_POST['prenom']) AND $_POST['prenom'] != $_SESSION['prenom']) 
	{
			$nouveauPrenom = htmlspecialchars($_POST['prenom']);
			
			$insererPrenom = $bdd->prepare('UPDATE members SET prenom = :prenom WHERE id = :id');
			$insererPrenom->execute([':prenom'=>$nouveauPrenom, ':id'=>$_SESSION['id']]);
			$_SESSION['prenom'] = $nouveauPrenom ;
			header('Location: accueil.php ');	
	}
	
	if (isset($_POST['nouveau_pseudo']) AND !empty($_POST['nouveau_pseudo']) AND $_POST['nouveau_pseudo'] != $_SESSION['pseudo']) 
	{
			$nouveauPseudo = htmlspecialchars($_POST['nouveau_pseudo']);

			$pseudolength = strlen($nouveauPseudo);		
			if ($pseudolength <= 30)
			{
				$requetePseudo = $bdd->prepare('SELECT * FROM members WHERE pseudo = :pseudo');
				$requetePseudo->execute([':pseudo'=>$nouveauPseudo]);
				$pseudoExiste = $requetePseudo->rowCount();
				if ($pseudoExiste === 0)
				{
					$insererPseudo = $bdd->prepare('UPDATE members SET pseudo = :pseudo WHERE id = :id');
					$insererPseudo->execute([':pseudo'=>$nouveauPseudo, ':id'=>$_SESSION['id']]);
					$_SESSION['pseudo'] = $nouveauPseudo ;
					header('Location: accueil.php ');	
				}
				else
				{
				$erreur = ' Ce pseudo est déjà pris';
				}
			}
			else
			{
				$erreur = ' Le pseudo ne doit pas dépasser 30 caractères';
			}	
	}
	
	if (isset($_POST['formulaire_edition']) AND !empty($_POST['motdepasse_actuel']) AND !empty($_POST['nouveau_motdepasse']))
	{
		$motDePasseVerification = sha1($_POST['motdepasse_actuel']);
		$nouveauMotDePasse = sha1($_POST['nouveau_motdepasse']);
		if($motDePasseVerification != $nouveauMotDePasse)
		{	
			$motDePasselength = strlen($nouveauMotDePasse);
			if($motDePasselength >= 10)
			{
				$requeteMotDePasse = $bdd->prepare('SELECT * FROM members WHERE id = ' . $_SESSION['id'] . '  AND mot_de_passe = :motdepasse');
				$requeteMotDePasse->execute([':motdepasse'=>$motDePasseVerification]);
				$motDePasseExiste = $requeteMotDePasse->rowCount();

				if ($motDePasseExiste === 1)
				{	
					$insererMotDePasse = $bdd->prepare('UPDATE members SET mot_de_passe = :motdepasse WHERE id = :id');
					$insererMotDePasse->execute([':motdepasse'=>$nouveauMotDePasse, ':id'=>$_SESSION['id']]);
					header('Location: accueil.php ');
				}
				else
				{
					$erreur = ' mot de passe incorrect!';
				}
			}
			else
			{
				$erreur = ' Le mot de passe doit comporter au moins 10 caractères';
			}
		}
		else
		{
			$erreur = 'mots de passe identiques';
		}
	}
	
	if (isset($_POST['nouvelle_question']) AND !empty($_POST['nouvelle_question']) AND $_POST['nouvelle_question'] != $_SESSION['question']) 
	{
		$nouvelleQuestion = htmlspecialchars($_POST['nouvelle_question']);
		$insererQuestion = $bdd->prepare('UPDATE members SET question = :question WHERE id = :id');
		$insererQuestion->execute([':question'=>$nouvelleQuestion, ':id'=>$_SESSION['id']]);
		$_SESSION['question'] = $nouvelleQuestion;
		header('Location: accueil.php ');
		
	}
	if (isset($_POST['nouvelle_reponse']) AND !empty($_POST['nouvelle_reponse']) AND $_POST['nouvelle_reponse'] != $_SESSION['reponse']) 
	{
		$nouvelleReponse = htmlspecialchars($_POST['nouvelle_reponse']);
		$insererReponse = $bdd->prepare('UPDATE members SET reponse = :reponse WHERE id = :id');
		$insererReponse->execute([':reponse'=>$nouvelleReponse, ':id'=>$_SESSION['id']]);
		$_SESSION['reponse'] = $nouvelleReponse;
		header('Location: accueil.php ');
	}
?>

<?php include('includes/head_deconnecte.php'); ?>

	<body>
			<?php include('includes/header_connecte.php'); ?>

			<main class="vertical_align">
		
					<form method="post" id="formulaire_modification">
						<h3 class="title"> Editer mon profil</h3>
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
						
					</form>

					<?php
						if (isset($erreur)) 
						{
							echo '<p style= "margin-top: -30px;"> <font color="red"> ' . $erreur . ' </p> ';
						}
					?>

			</main>

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