<!-- Header de la page d'acceuil et des pages acteurs -->		

			<header>
					<p><a href="accueil.php"><img id="logo" src="images/logo100px.png" alt="logo de l'entreprise"></a></p>
					
					<div class="icon">
						<a href="deconnexion.php"><img src="images/deconnexion.png" alt="logo de connexion" style="width: 28px; margin-right: 10px;"></a>
						<a href="parametres.php" style="margin-right: 10px;"><img src="images/login_icon.png" alt="logo de connexion"></a>
						<a href="parametres.php" style="font-size: 1.1em; position: relative; bottom:5px; color: #333;"><?php echo $_SESSION['nom'] ; ?> <?php echo $_SESSION['prenom']; ?></a>			
					</div>	
			</header>