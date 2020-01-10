<?php
session_start();

if (isset($_SESSION['id'])) 
{
	
?>

<?php include('includes/head_connect.php'); ?>

	<body>

			<?php include("includes/header_connecte.php"); ?>

			<section id="presentation">
				<div class="title">
					<h1> Groupement Banque-Assurance Français (GBAF). </h1>
					<p>  Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
						 les axes de la réglementation financière française. Sa mission est de promouvoir
						 l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
						 pouvoirs publics.</p>
				</div>
				<div class="illustration"> </div>
				
			</section>

			<section id="actors">
				<h2>  Acteurs et partenaires</h2>
					<div class="actors_box">
						<div class="box">
							<p> <img src="../public/images/CDE_full.png" alt="logo de la CDE"></p>
							<div class="text">
								<h3> CDE</h3>
								<p>La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. </p>
								<a href="CDE.php" class="bouton">Lire la suite</a> 
							</div>	
							
						</div>

						<div class="box">
							<p> <img src="../public/images/Dsafrance_full.png" alt="logo de dsa france"></p>
							<div class="text">
								<h3> DSA France</h3>
								<p>Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.</p>
								<a href="dsa.php"class="bouton">Lire la suite</a> 
							</div>		
						</div>

						<div class="box">
							<p> <img src="../public/images/formation_co_full.png" alt="logo de formation&co"></p>
							<div class="text">
								<h3> Formation&co</h3>	
								<p> Formation&co est une association française présente sur tout le territoire.</p>
								<a href="formationco.php" class="bouton">Lire la suite</a>
							</div>
						</div>

						<div class="box">
							<p> <img src="../public/images/protectpeople_full.png" alt="logo de protect people"></p>
							<div class="text">
								<h3> Protect people</h3>
								<p>Protectpeople finance la solidarité nationale.</p>
								<a href="protectpeople.php" class="bouton">Lire la suite</a>
							</div>	
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