<?php

	$reponse = $bdd->query('SELECT prenom, commentaire, DATE_FORMAT(date_creation, \'%d/%m/%Y\')  AS date_creation_fr FROM commentaires WHERE id_page = ' . $page . '  ORDER BY ID DESC');
	while ($donnees = $reponse->fetch())
	{
	?>
		<article class="affichage_commentaire">
			<p class="style_prenom"> <?php echo $donnees['prenom']; ?> </p>
			<p class="style_commentaire"> <?php echo $donnees['date_creation_fr']; ?> </p>
			<p class="style_date"> <?php echo $donnees['commentaire']; ?> </p>
		</article>
	<?php
	}
?>