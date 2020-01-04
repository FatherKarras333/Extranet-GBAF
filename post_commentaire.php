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

if (isset($_SESSION['id'], $_GET['p']) AND !empty($_GET['p']))
{
	$page = (int)$_GET['p'];
	if (isset($_POST['poster_commentaire'], $_POST['commentaire']) AND !empty($_POST['commentaire']))
	{
		$prenom = $_SESSION['prenom'];
		$commentaire = $_POST['commentaire'];

		$requeteCommentaire = $bdd->prepare('INSERT INTO commentaires (prenom, commentaire, id_page, date_creation) VALUES(:prenom, :commentaire, :id_page , NOW())');
		$requeteCommentaire->execute([':prenom'=>$prenom, ':commentaire'=>$commentaire, 'id_page'=>$page]);

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
			<div class="form" id="formulaire_commentaire">
				<h3 class="title"> Saisir un commentaire</h3>
				<form method="POST" action="">
					<textarea  name="commentaire"></textarea>
					<input type="submit" name="poster_commentaire" value="Poster"><br/>
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
