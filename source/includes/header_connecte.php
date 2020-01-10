<!-- Header de la page d'acceuil et des pages acteurs -->		

			<header class="header">
					<p><a href="accueil.php"><img id="logo" src="../public/images/logo100px.png" alt="logo de l'entreprise"></a></p>
					
					<nav class="icon">
						<a href="deconnexion.php"><img src="../public/images/deconnexion.png" class="logout_icon" alt="logo de connexion"></a>
						<a href="parametres.php" class="login_icon"><img src="../public/images/login_icon.png" alt="logo de connexion"></a>
						<a href="parametres.php" class="login_name"><?php echo $_SESSION['nom'] ; ?> <?php echo $_SESSION['prenom']; ?></a>			
					</nav>	
			</header>