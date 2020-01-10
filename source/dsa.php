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
	$page = 2;
?>

<?php include('includes/head_connect.php'); ?>

	<body>
			<?php include('includes/header_connecte.php'); ?>

			<section class="details">
				<p><img src="../public/images/Dsafrance_full.png"></p>
				<h2> DSA France </h2>
				<p class="align">Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.
				Nous accompagnons les entreprises dans les étapes clés de leur évolution.
				Notre philosophie : s’adapter à chaque entreprise.
				Nous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises
				</p>
			</section>	

			<section id="comments">
				<header class="entete_commentaire">
					<?php include('includes/compteur_nombres.php'); ?>
					<div class="likes">
						<a href="post_commentaire.php?p=2" class="bouton_commentaire">Nouveau commentaire</a>
						<a href="vote.php?p=2&v=1"><img src="../public/images/like24px.png"><?php echo $likes ; ?></a>
						<a href="vote.php?p=2&v=2"><img src="../public/images/dislike24px.png"><?php echo $dislikes ; ?></a>
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