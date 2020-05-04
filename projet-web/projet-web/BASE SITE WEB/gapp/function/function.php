

<?php
function getSQL($table, $col)
{
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=membres;charset=utf8", 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->query("SELECT pseudo from membres");

    while ($donnees = $req->fetch()) {
        echo $donnees[$col], '<br>';
    }
    $req->closeCursor();
}
?>

<?php
function DISCONNECT()
{
    session_start();
    /*unset($_SESSION['pseudo']);*/
    header("Refresh: 4; url=../index.php");
    echo "Vous avez été correctement déconnecté du site.<i><br>
Redirection en cours, vers la page d'accueil...</i>";
session_destroy();
}
?>


<?php
function PRINT_PICTURE($photo)
{
    $db = mysqli_connect("localhost", "root", "", "gapp");
    $pic = mysqli_query($db, "SELECT images FROM addgame where gamename = '$photo'");
    while ($row = mysqli_fetch_array($pic)) {
        echo "<div id='img_div'>";
        echo "<img src='images/" . $row['images'] . "' class='rounded border border-dark'>";
        echo "</div>";
    }
}
?>


<?php
function AFTER_POST_GAME()
{
    /*unset($_SESSION['pseudo']);*/
    header("Refresh: 4; url=../index1.php");
    echo "Votre jeu a été ajouté avec succès.<i><br>
Redirection en cours, vers la page d'accueil...</i>";
}
?>

<?php
function AFTER_POST_COMMENT()
{
    /*unset($_SESSION['pseudo']);*/
    header("Refresh: 0.2; url=index1.php");
    echo "Votre commentaire a été ajouté avec succès.<i><br>
Redirection en cours, vers la page d'accueil...</i><br><br><hr>";
}
?>


<?php
function PRINT_ALLPIC()
{
    $db = mysqli_connect("localhost", "root", "", "gapp");  
    $result = mysqli_query($db, "SELECT images FROM addgame");
    $title = mysqli_query($db, "SELECT gamename FROM addgame");
    $row_title = mysqli_fetch_array($title);
    $p_title = $row_title['gamename'];
    while ($row = mysqli_fetch_array($result))  {
            echo "<div class='table' style='width: 50rem;''>";
            echo " <img class='card-img-top' src='images/" . $row['images'] . "'>";
            echo "</div>";
    }
}
?>



<?php
function PRINT_GAME_INFO($gamename)
{
    $db = mysqli_connect("localhost", "root", "", "gapp");
    $pic = mysqli_query($db, "SELECT * FROM addgame where gamename = '$gamename'");
    while ($row = mysqli_fetch_array($pic)) {
      echo "<div id='img_div'>";
      echo "<img src='images/" . $row['images'] . "' class='rounded border border-dark'>";
      echo '<br><br><b><a style="color:white">Nom du jeu : </a></b>';
       echo $row['gamename'];
       echo '<br>';
       echo '<b><a style="color:white"> Catégorie :</a></b> ';
       echo $row['categorie'];
       echo '<br>';
       echo '<b><a style="color:white">Langue : </a></b>';
       echo $row['langue'];
       echo '<br>';
       echo '<br>';
       echo '<b><a style="color:white">Description : </a></b>';
       echo $row['avis']; 
       echo '<br>';
      echo '<br>';
      echo "</div>";
    }
}
?>
