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

if(isset($_SESSION['id']))
{
	$page = 4;
?>

<?php include('includes/head_connect.php'); ?>

	<body>
			<?php include('includes/header_connecte.php'); ?>

			<section class="details">
				<p><img src="../public/images/protectpeople_full.png"></p>
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
				<header class="entete_commentaire">
					<?php include('includes/compteur_nombres.php'); ?>
					<div class="likes">
						<a href="post_commentaire.php?p=4" class="bouton_commentaire">Nouveau commentaire</a>
						<a href="vote.php?p=4&v=1"><img src="../public/images/like24px.png"><?php echo $likes ; ?></a>
						<a href="vote.php?p=4&v=2"><img src="../public/images/dislike24px.png"><?php echo $dislikes ; ?></a>
					</div>
				</header>

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