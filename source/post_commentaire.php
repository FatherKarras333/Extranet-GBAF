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

if (isset($_SESSION['id'], $_GET['p']) AND !empty($_GET['p']))
{
	$page = (int)$_GET['p'];
	if (isset($_POST['poster_commentaire'], $_POST['commentaire']) AND !empty($_POST['commentaire']))
	{
		$prenom = $_SESSION['prenom'];
		$commentaire = $_POST['commentaire'];
		$idMembre = $_SESSION['id'];

		$requeteCommentaire = $bdd->prepare('INSERT INTO commentaires (prenom, commentaire, id_page, date_creation, id_membre) VALUES(:prenom, :commentaire, :id_page , NOW(), :idMembre)');
		$requeteCommentaire->execute([':prenom'=>$prenom, ':commentaire'=>$commentaire, 'id_page'=>$page, ':idMembre'=>$idMembre]);

		switch ($page) {
			case 1:
				header('Location: CDE.php');
				break;
			case 2:
				header('Location: dsa.php');
				break;
			case 3:
				header('Location: formationco.php');
				break;
			case 4:
				header('Location: protectpeople.php');
				break;
		}
		
	}
	elseif (isset($_POST['poster_commentaire'], $_POST['commentaire']) AND empty($_POST['commentaire']))
	{
		$message = ' Le champ doit être rempli';
	}
}
else
{
	header('Location: accueil.php');
}
?>

<?php include('includes/head_deconnecte.php'); ?>

	<body>
			<?php include('includes/header_connecte.php'); ?>

			<main class="vertical_align">
	
				<form method="POST" id="formulaire_commentaire">
					<h3 class="title"> Saisir un commentaire</h3>
					<textarea  name="commentaire"></textarea>
					<input type="submit" name="poster_commentaire" value="Poster"><br/>
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
