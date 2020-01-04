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
	$page = 3;
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
				<p><img src="images/formation_co_full.png"></p>
				<h2> Formations & Co  </h2>
				<p class="align">Formation&co est une association française présente sur tout le territoire.
					Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.<br>
					Notre proposition : 
				</p>
					<ul>
					     <li>un financement jusqu’à 30 000€; </li>
					     <li>un suivi personnalisé et gratuit ;</li>
					     <li>une lutte acharnée contre les freins sociétaux et les stéréotypes.</li>
					</ul>
				<p class="align">
				    Le financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres… <br>
				    Nous collaborons avec des personnes talentueuses et motivées.
					Vous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.
				</p>
			</section>	

			<section id="comments">
				<div class="entete_commentaire">
					<?php include('includes/compteur_nombres.php'); ?>
					<div class="likes">
						<a href="post_commentaire.php?p=3" class="bouton_commentaire">Nouveau commentaire</a>
						<a href="vote.php?p=3&v=1"><img src="images/like24px.png"> <?php echo $likes ; ?></a>
						<a href="vote.php?p=3&v=2"><img src="images/dislike24px.png"><?php echo $dislikes ; ?></a>
					</div>
				</div>

				<?php include('includes/affichage_commentaires.php'); ?>
				
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