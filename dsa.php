<?php
session_start();

if(isset($_SESSION['id']))
{
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<meta charset="utf-8">
		<title> GBAF </title>
	</head>

	<body>
			<?php include('includes/header_connecte.php'); ?>

			<section class="details">
				<p><img src="images/Dsafrance_full.png"></p>
				<h2> DSA France </h2>
				<p class="align">Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.
				Nous accompagnons les entreprises dans les étapes clés de leur évolution.
				Notre philosophie : s’adapter à chaque entreprise.
				Nous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises
				</p>
			</section>	

			<section id="comments">
				<div class="entete_commentaire">
					<h3> Commentaires </h3>
					<div class="likes">
						<a href="#" class="bouton_commentaire">Nouveau commentaire</a>
						<a href="#"><img src="images/like24px.png"></a>
						<a href="#"><img src="images/dislike24px.png"></a>
					</div>
				</div>
				
			</section>
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