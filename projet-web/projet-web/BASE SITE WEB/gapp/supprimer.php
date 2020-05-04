    	<?php
	$bdd = new PDO("mysql:host=127.0.0.1;dbname=gapp;charset=utf8", "root", "");
	if(isset($_GET['gamename']) AND !empty($_GET['gamename'])) {
	   $suppr_id = htmlspecialchars($_GET['gamename']);
	   $suppr = $bdd->prepare('DELETE FROM addgame WHERE gamename = ?');
	   $suppr->execute(array($suppr_id));
	   header('Location: index1.php');
	}
	?>