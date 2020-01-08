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

if(isset($_SESSION['id']))
{
	$page = 1 ;
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0.8">
		<title> GBAF </title>
	</head>

	<body>
		
			<?php include('includes/header_connecte.php'); ?>

			<section class="details">
				<p><img src="images/CDE_full.png" alt="logo cde"></p>
				<h2> CDE ( Chambre des entrepreneurs) </h2>
				<p class="align">La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. 
				   Son président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.</p>
			</section>	

			<section id="comments">
				<div class="entete_commentaire">
					<?php include('includes/compteur_nombres.php'); ?>
					<div class="likes">
						<a class="bouton_commentaire" href="post_commentaire.php?p=1"> Nouveau commentaire  </a> 
						<a href="vote.php?p=1&v=1"><img src="images/like24px.png"> <?php echo $likes ; ?> </a>
						<a href="vote.php?p=1&v=2"><img src="images/dislike24px.png"> <?php echo $dislikes ; ?> </a>
					</div>
				</div>

				<?php include('includes/affichage_commentaire.php'); ?>
				
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