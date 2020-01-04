<?php
session_start();

if(isset($_SESSION['id']))
{
?>

<!DOCTYPE html>
<html>
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
				<p><img src="images/protectpeople_full.png"></p>
				<h2> Protect People  </h2>
				<p class="align"> Protectpeople finance la solidarité nationale.
				Nous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.<br/>
				Chez Protectpeople, chacun cotise selon ses moyens et reçoit selon ses besoins.
				Proectecpeople est ouvert à tous, sans considération d’âge ou d’état de santé.
				Nous garantissons un accès aux soins et une retraite.
				Chaque année, nous collectons et répartissons 300 milliards d’euros.
				Notre mission est double : 
				</p>
					
					<ul>
					     <li>sociale : nous garantissons la fiabilité des données sociales ; </li>
					     <li>économique : nous apportons une contribution aux activités économiques.</li>
					     
					</ul>
				
			</section>	

			<section id="comments">
				<div class="entete_commentaire">
					<h3>Commentaires</h3>
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