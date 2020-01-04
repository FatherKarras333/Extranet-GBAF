<?php

	$reponse = $bdd->query('SELECT prenom, commentaire, DATE_FORMAT(date_creation, \'%d/%m/%Y\')  AS date_creation_fr FROM commentaires WHERE id_page = ' . $page . '  ORDER BY ID DESC');
	while ($donnees = $reponse->fetch())
	{
	?>
		<div class="affichage_commentaire">
			<p class="aligner_commentaire" style="font-weight: bold;"> <?php echo $donnees['prenom']; ?> </p>
			<p class="aligner_commentaire" style="font-size: 12px; margin-top: -10px;"> <?php echo $donnees['date_creation_fr']; ?> </p>
			<p class="aligner_commentaire" style=" margin-top: -5px;"> <?php echo $donnees['commentaire']; ?> </p>
		</div>
	<?php
	}
?>