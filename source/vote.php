<?php
session_start();

function handleLikes ( $page, $idMembre, $likes) {

		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root', ''); 
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		if ($likes === 1 ) 
		{
			$verificationLike = $bdd->prepare('SELECT id FROM likes WHERE id_page = :idPage AND id_membre = :idMembre');
			$verificationLike->execute([':idPage' => $page, ':idMembre' => $idMembre]);

			$suppression = $bdd->prepare("DELETE FROM dislikes WHERE id_page = :idPage AND id_membre = :idMembre");
			$suppression->execute([':idPage'=>$page, ':idMembre'=>$idMembre]);
		
			if ($verificationLike->rowCount() !== 1) 
			{
				$insererLike = $bdd->prepare('INSERT INTO likes (id_page, id_membre) VALUES(:idPage, :idMembre)');
				$insererLike->execute([':idPage'=>$page, ':idMembre'=>$idMembre]);	
			}
			else
			{
			$suppression = $bdd->prepare("DELETE FROM likes WHERE id_page = :idPage AND id_membre = :idMembre");
			$suppression->execute([':idPage'=>$page, ':idMembre'=>$idMembre]);
			}
		}
		elseif ($likes === 2 )
		{
			$verificationLike = $bdd->prepare('SELECT id FROM dislikes WHERE id_page = :idPage AND id_membre = :idMembre');
			$verificationLike->execute([':idPage'=>$page, ':idMembre'=>$idMembre]);

			$suppression = $bdd->prepare("DELETE FROM likes WHERE id_page = :idPage AND id_membre = :idMembre");
			$suppression->execute([':idPage'=>$page, ':idMembre'=>$idMembre]);
		
			if ($verificationLike->rowCount() !== 1)
			{
				$insererLike = $bdd->prepare('INSERT INTO dislikes (id_page, id_membre) VALUES(:idPage, :idMembre)');
				$insererLike->execute([':idPage'=>$page, ':idMembre'=>$idMembre]);
			}
			else
			{
				$suppression = $bdd->prepare("DELETE FROM dislikes WHERE id_page = :idPage AND id_membre = :idMembre");
				$suppression->execute([':idPage'=>$page, ':idMembre'=>$idMembre]);
			}
		}
}

if (isset($_SESSION['id'], $_GET['p'], $_GET['v']) AND !empty($_GET['p']) AND !empty($_GET['v']))
{
	$page = (int)$_GET['p'];
	$idMembre = (int)$_SESSION['id'];
	$likes = (int)$_GET['v'];
	handleLikes ($page, $idMembre, $likes);
	
		switch ($page) {
			case 1:
				header('Location: CDE.php');
				break;
			case 2:
				header('Location: dsa.php');
				break;
			case 3:
				header('Location: formationco.php');
				break;
			case 4:
				header('Location: protectpeople.php');
				break;
		}
}	
		

else
{
	header('Location: accueil.php');
}
?>