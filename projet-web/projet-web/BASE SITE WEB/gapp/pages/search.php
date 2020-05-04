<!DOCTYPE html>
<?php include "../function/function.php"; ?>
<?php session_start(); ?>
<html>
<head>
    <title>Gapp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../search.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Righteous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style='font-family:Righteous' background="search.jpg">
<header>
<nav aria-label="breadcrumb">
      <ol class="breadcrumb shadow-lg p-3 mb-5 bg-light rounded">
        <li class="text-uppercase font-weight-bold " aria-current="page">
        <li class="text-uppercase font-weight-bold "> CONNECTÉ À : <?php echo $_SESSION['pseudo']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <li class="breadcrumb-item"><a href="../index1.php">Accueil</a></li>
        <li class="breadcrumb-item"><a href="annonce.php">Ajouter un jeu</a></li>
        <li class="breadcrumb-item"><a href="search.php">Rechercher un jeu</a></li>
        <li class="breadcrumb-item"><a href="../registration/espace-membre.php">Espace membre</a></li>
        <li class="breadcrumb-item"><a href="contact.php">Nous contacter</a></li>
        <li class="breadcrumb-item"><a href="../registration/deconnexion.php">Déconnexion</a></li>
      </ol>
    </nav>  
</header>
<div class="jumbotron">
<form method="post">
    <label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSearch</label>
    <input type="text" name='search'>
    <input type='submit' name="submit">
    <br>
    <br>
<a class="btn btn-secondary" href="arcade.php" role="button">Arcade</a>&nbsp&nbsp&nbsp&nbsp&nbsp
<a class="btn btn-secondary" href="aventure.php" role="button">Aventure</a>&nbsp&nbsp&nbsp&nbsp&nbsp
<a class="btn btn-secondary" href="tir.php" role="button">Tir</a>&nbsp&nbsp&nbsp&nbsp&nbsp
<a class="btn btn-secondary" href="auto.php" role="button">Automobile</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a class="btn btn-warning" href="bestnote.php" role="button">Les mieux notés</a>
</div>
</form>



<?php

$con = new PDO("mysql:host=localhost;dbname=gapp",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM addgame WHERE gamename = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
    ?>

    <br><br><br>
    
  <div class="jumbotron">
  <h1 class="display-4">Nom du jeu : <?php echo $row->gamename; ?></h1>
  <br>
  <p class="lead"><?php echo '<img src="../images/'.$row->images.'"/>'?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <?php
                if ($row->notes == 1) {
                  echo 'NOTES : ⭐';
                } else if ($row->notes == 2) {
                  echo 'NOTES :⭐⭐';
                } else if ($row->notes == 3) {
                  echo 'NOTES : ⭐⭐⭐';
                } else if ($row->notes == 4) {
                  echo 'NOTES : ⭐⭐⭐⭐';
                } else if ($row->notes == 5) {
                  echo 'NOTES : ⭐⭐⭐⭐⭐';
                } ?>
              
</p>
  <hr class="my-4">
  <div class="txtsize">
  <p> Genre : <?php echo $row->genre; ?></p>
  <p> Catégorie : <?php echo $row->categorie; ?></p>
  <p> Langue : <?php echo $row->langue; ?></p>
  <p> Description : <?php echo $row->avis; ?></p>
  <div>

<?php 
    }
		else{
			echo "Le jeu recherché n'existe pas ou n'est pas encore référencé sur notre site 🙁";
		}
}
?>






</body>
</html>
