<!-- Header de la page d'acceuil et des pages acteurs -->		

			<header>
					<p><a href="accueil.php"><img id="logo" src="images/logo100px.png" alt="logo de l'entreprise"></a></p>
					
					<div class="icon">
						<a href="deconnexion.php"><img src="images/deconnexion.png" class="logout_icon" alt="logo de connexion"></a>
						<a href="parametres.php" class="login_icon"><img src="images/login_icon.png" alt="logo de connexion"></a>
						<a href="parametres.php" class="login_name"><?php echo $_SESSION['nom'] ; ?> <?php echo $_SESSION['prenom']; ?></a>			
					</div>	
			</header>