<!DOCTYPE html>
<?php include "function/function.php"; ?>
<?php session_start(); ?>
<html>
<head>
    <title>Gapp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Righteous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style='font-family:Righteous' background="pages/commentaire.png">
<header>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb shadow-lg p-3 mb-5 bg-light rounded">
    <li class="text-uppercase font-weight-bold "> CONNECTÉ À : <?php echo $_SESSION['pseudo']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <li class="breadcrumb-item"><a href="index1.php">Accueil</a></li>
    <li class="breadcrumb-item"><a href="pages/annonce.php">Ajouter un jeu</a></li>
  <li class="breadcrumb-item"><a href="registration/espace-membre.php">Espace membre</a></li>
    <li class="breadcrumb-item"><a href="registration/deconnexion.php">Déconnexion</a></li>

    </ol>
</nav> 
</header>
<div class="padding1">
<?php 
$gamename =  $_GET['gamename'];
PRINT_GAME_INFO($gamename) ;?>


<?php
$my_date = date("Y-m-d H:i"); 
$gamename =  $_GET['gamename'];
$pseudo = $_GET['pseudo'];
if(isset($_POST['valider'])) {
    if (isset($_POST['info'])) {
        $mysqli = new mysqli('localhost', 'root', '', 'gapp');
        $mysqli->set_charset("utf8");
        $info = htmlentities($_POST['info'], ENT_QUOTES, "UTF-8");
        if (mysqli_query($mysqli, "INSERT INTO commentaire SET info = '$info',gamename = '$gamename',pseudo = '$pseudo', dates= '$my_date'")) {
            AFTER_POST_COMMENT();
            $TraitementFini = true;
            mysqli_query($mysqli, "SELECT * FROM commentaire WHERE gamename = '$gamename'");
            }
        }
}
    if (!isset($TraitementFini)) {
        ?>
        <form method="post" action="test.php?gamename=<?php echo $_GET['gamename']; ?>&amp;pseudo=<?php echo $_SESSION['pseudo'];?>" enctype="multipart/form-data">
            <textarea style="border:1px solid black" name="info" placeholder="Laissez un commentaire (Max. 200 caractères)" cols="10" rows="10"></textarea><br>
            <input type="submit" name="valider" value="Poster le commentaire"><br><br>
        </form>
        <?php
    }
    ?>

<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=gapp;charset=utf8", "root", "");
$show = $bdd->query("SELECT * FROM commentaire WHERE gamename = '$gamename' ORDER BY dates DESC LIMIT 5");
while ($vid = $show->fetch()) {
?>
Publié par <?php echo $vid['pseudo'];?> le <?php echo $vid['dates'];?> <br>
    <?php echo $vid['info']; ?><br><br>
    <hr>
    <?php
}
?>

</div>
</body>
</html>