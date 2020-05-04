<!DOCTYPE html>
<?php include "../function/function.php"; ?>
<?php session_start(); ?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
  <title>Poster un jeu</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../style/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Righteous" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="annonce.css">
  <link rel="stylesheet" href="rating.css">
</head>

<body background="../style/pika.png">
  <header>

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb shadow-lg p-3 mb-5 bg-light rounded">
        <li class="text-uppercase font-weight-bold " aria-current="page">
        <li class="text-uppercase font-weight-bold "> CONNECTÉ À : <?php echo $_SESSION['pseudo']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <li class="breadcrumb-item"><a href="../index1.php">Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="pages">Ajouter un jeu</li>
        <li class="breadcrumb-item"><a href="search.php">Rechercher un jeu</a></li>
        <li class="breadcrumb-item"><a href="../registration/espace-membre.php">Espace membre</a></li>
        <li class="breadcrumb-item"><a href="contact.php">Nous contacter</a></li>
        <li class="breadcrumb-item"><a href="../registration/deconnexion.php">Déconnexion</a></li>
      </ol>
    </nav>
  </header>

  <div class="container">
    <div class="row">
      <div class="col">
        <?php
        $Pseudo = $_SESSION['pseudo'];
        ?>
        <?php
        $db = mysqli_connect("localhost", "root", "", "gapp");
        $pic = mysqli_query($db, "SELECT images FROM membres where pseudo = '$Pseudo'");
        while ($row = mysqli_fetch_array($pic)) {
          echo "<div id='img_div'>";
          echo "<img src='../images/" . $row['images'] . "' class='rounded border border-dark'>";
          echo "</div>";
        }
        ?>
      </div>
      <div class="col">
      </div>
    </div>
  </div>

  <?php
  $my_date = date("Y-m-d H:i"); 
  if (isset($_POST['valider'])) {
    if (!isset($_POST['gamename'], $_POST['genre'], $_POST['categorie'], $_POST['langue'], $_POST['avis'], $_FILES['images']['name'], $_POST['notes'])) {
      echo "Vous n'avez pas défini de note au jeu .";
    } else {
      if (strlen($_POST['gamename']) < 2 or strlen($_POST['gamename']) > 50) {
        echo "Le nom du jeu doit être d'une longueur minimum de 2 caractères et de 50 maximum.";
      } else {
        $mysqli = new mysqli('localhost', 'root', '', 'gapp');
        $mysqli->set_charset("utf8");
        $image = htmlentities($_FILES['images']['name'], ENT_QUOTES, "UTF-8");
        $target = "../images/" . basename($image);
        $gamename = htmlentities($_POST['gamename'], ENT_QUOTES, "UTF-8");
        $genre = htmlentities($_POST['genre'], ENT_QUOTES, "UTF-8");
        $categorie = htmlentities($_POST['categorie'], ENT_QUOTES, "UTF-8");
        $langue = htmlentities($_POST['langue'], ENT_QUOTES, "UTF-8");
        $avis = htmlentities($_POST['avis'], ENT_QUOTES, "UTF-8");
        $notes = htmlentities($_POST['notes'], ENT_QUOTES, "UTF-8");
        if (mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM addgame WHERE gamename='$gamename'")) != 0) {
          echo "Ce jeu est deja inscrit dans la base de donnée.";
        } else {
          if (mysqli_query($mysqli, "INSERT INTO addgame SET pseudo='$Pseudo', gamename='$gamename', genre='$genre',categorie='$categorie',langue='$langue',avis='$avis',images='$image', notes='$notes', dates= '$my_date'")) {
            move_uploaded_file($_FILES['images']['tmp_name'], $target);
            AFTER_POST_GAME();
            $TraitementFini = true;
          }
        }
      }
    }
  }
  if (!isset($TraitementFini)) {
  ?>

    <br>
    <div class="container">
      <div class="row" style="border:0px solid #ddd;">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-7 col-lg-offset-1">
          <table width="100%">
            <td width="50%">
              <table>
                <tr>
                  <td>
                    <div class="table-responsive">
                      <table class="table">

                        <div class="float-sm-left">
                          <div class="content">
                            <form method="post" action="annonce.php" enctype="multipart/form-data">


                              <label class="txt" for="select">Nom du jeu : </label>
                              <input type="text" name="gamename" style="border:1px solid black" class="form-control mb-4" placeholder="Nom du jeu">

                              <label class="txt" for="select">Couverture : </label>
                              <div class="input-group mb-4 ">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <input type="file" name="images">
                                  </span>
                                </div>
                                <div class="custom-file">
                                </div>
                              </div>

                              <label class="txt" for="select">Genre : </label>
                              <select style="border:1px solid black" class="browser-default custom-select mb-4" id="select" name="genre">
                                <optgroup class="txt" label="Genre">
                                  <option value="Aventure">Aventure</option>
                                  <option value="Arcade">Arcade</option>
                                  <option value="Automobile">Automobile</option>
                                  <option value="Tir">Tir</option>
                                </optgroup>
                              </select>

                              <label class="txt" for="select">Classification PEGI : </label>
                              <select style="border:1px solid black" class="browser-default custom-select mb-4" id="select" name="categorie">
                                <optgroup class="txt" label="PEGI">
                                  <option value="PEGI 3">PEGI 3</option>
                                  <option value="PEGI 7">PEGI 7</option>
                                  <option value="PEGI 12">PEGI 12</option>
                                  <option value="PEGI 16">PEGI 16</option>
                                  <option value="PEGI 18">PEGI 18</option>
                                </optgroup>
                              </select>

                              <label class="txt" for="select">Pays originaire : </label>
                              <select style="border:1px solid black" class="browser-default custom-select mb-4" id="select" name="langue">
                                <optgroup class="txt" label="Europe">
                                  <option value="France">France </option>
                                  <option value="Anglais">Anglais </option>
                                  <option value="Allemagne">Allemagne </option>
                                  <option value="Belgique">Belgique </option>
                                </optgroup>
                                <optgroup class="txt" label="Asia">
                                  <option value="Japon">Japon </option>
                                  <option value="Chine">Chine </option>
                                  <option value="Japon">Inde </option>
                                </optgroup>
                                <optgroup class="txt" label="Amérique">
                                  <option value="Japon">Etats-Unis </option>
                                  <option value="Chine">Canada </option>
                                  <option value="Japon">Brésil </option>
                                </optgroup>
                              </select>
                              <label class="txt" for="select">Brève description du jeu : </label>
                              <textarea style="border:1px solid black" name="avis" placeholder="&nbsp Votre avis sur le jeu ( 1000 caractères max.)" cols="20" rows="2"></textarea>

                              <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                <input type="radio" id="star5" name="notes" value="5" /><label for="star5" title="5 star"></label>
                                <input type="radio" id="star4" name="notes" value="4" /><label for="star4" title="4 star"></label>
                                <input type="radio" id="star3" name="notes" value="3" /><label for="star3" title="3 star"></label>
                                <input type="radio" id="star2" name="notes" value="2" /><label for="star2" title="2 star"></label>
                                <input type="radio" id="star1" name="notes" value="1" /><label for="star1" title="1 star"></label>
                              </div>



                              <input style="border:1px solid black" class="btn btn-danger btn-block my-2" type="submit" name="valider"></input>


                            </form>

                          </div>
                  </td>
                </tr>
              </table>
            </td>
        </div>


        <div class="posdb">
          <div class="popgame">
            <center>Jeu populaire du moment <br></center>
          </div>
          <div class="boxgame">
            <iframe width="373" height="210" src="https://www.youtube.com/embed/sL1aH6exacA" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe width="373" height="210" src="https://www.youtube.com/embed/tl8o8EZC04o" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe width="373" height="210" src="https://www.youtube.com/embed/pd9rd-okUVw" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe width="373" height="210" src="https://www.youtube.com/embed/1RC1yxqTTd8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      <?php
    }
      ?>





</body>

</html>