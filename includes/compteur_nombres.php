<?php 

	$reponse = $bdd->query('SELECT COUNT(*) AS nombre FROM commentaires WHERE id_page = ' . $page . ' ');
	while ($nombre = $reponse->fetch())
	{
	?>
		<h3> Commentaires ( <?php echo $nombre['nombre'] ; ?> ) </h3>
	<?php 	
	}
	?>

	<?php 
		$likes = $bdd->prepare('SELECT id FROM likes WHERE id_page = ' . $page . ' ');
		$likes->execute(array($nombre));
		$likes = $likes->rowCount();

		$dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE id_page = ' . $page . ' ');
		$dislikes->execute(array($nombre));
		$dislikes = $dislikes->rowCount();
?>