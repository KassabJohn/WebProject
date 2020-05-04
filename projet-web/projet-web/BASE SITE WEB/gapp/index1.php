<!DOCTYPE html>
<?php session_start();
$Pseudo = $_SESSION['pseudo'];
$mysqli = mysqli_connect('localhost', 'root', '', 'gapp');
$req = mysqli_query($mysqli, "SELECT * FROM membres WHERE pseudo='$Pseudo'");
$info = mysqli_fetch_assoc($req);
include "function/function.php"; ?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
  <title>Gapp</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
  <link rel="stylesheet" href="index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Righteous" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body background="style/indexxx.png" style='font-family:Righteous'>
  <header>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb shadow-lg p-3 mb-5 bg-light rounded">
        <li class="text-uppercase font-weight-bold "> CONNECTÉ À : <?php echo $_SESSION['pseudo']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <li class="breadcrumb-item active" aria-current="page">Accueil
        <li class="breadcrumb-item"><a href="pages/annonce.php">Ajouter un jeu</a></li>
        <li class="breadcrumb-item"><a href="pages/search.php">Rechercher un jeu</a></li>
        <li class="breadcrumb-item"><a href="registration/espace-membre.php">Espace membre</a></li>
        <li class="breadcrumb-item"><a href="pages/contact.php">Nous contacter</a></li>
        <li class="breadcrumb-item "><a href="registration/deconnexion.php">Déconnexion</a></li>
      </ol>
    </nav>
  </header>
  <div class="slider" style="box-shadow: 0 3px 9px black, inset 0 0 9px white;"	>
    <div class="slide-track">
    <img class="slide" src="https://actu.meilleurmobile.com/wp-content/uploads/2019/08/pokemon-go.jpg" height="100" width="250" alt="" />
      <img class="slide" src="https://static1.millenium.org/articles/0/34/33/80/@/1130442-goku-ssj-vert-article_m-1.jpg" height="100" width="250" alt="" />
      <img class="slide" src="https://cdn.pokemonmasters-game.com/stylesheets/images/aymY4WEReT7_DF_zfVWbHApWAOUuHYZn843kP1mAdJp.jpg" height="100" width="250" alt="" />
      <img class="slide" src="https://i.ytimg.com/vi/jFnqxw7Jff8/maxresdefault.jpg" height="100" width="250" alt="" />
      <img class="slide" src="https://sgimage.netmarble.com/images/netmarble/nanagb/20191204/hy441575443956901.jpg" height="100" width="250" alt="" />
      <img class="slide" src="https://cdn03.nintendo-europe.com/media/images/10_share_images/games_15/smart_device_3/H2x1_SmartDevice_MarioKartTour.jpg" height="100" width="250" alt="" />
      <img class="slide" src="https://i1.wp.com/www.ashesheart.fr/wp-content/uploads/2014/01/guide_jetpack-joyride_psvita_article.jpg?resize=1200%2C500&ssl=1" height="100" width="250" alt="" />
      <img class="slide" src="https://nosomosnonos.com/wp-content/uploads/2019/01/ONE-PIECE-Bounty-Rush-feature-image.jpg" height="100" width="250" alt="" />
      <img class="slide" src="https://images.playerone.tv/source/jeux/fortnite/fortnite-6.jpeg" height="100" width="250" alt="" />
      <img class="slide" src="https://cdn03.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_4/H2x1_NSwitch_Minecraft.jpg" height="100" width="250" alt="" />
      <img class="slide" src="https://9to5mac.com/wp-content/uploads/sites/6/2019/10/Call-of-Duty-Mobile-becomes-1-iOS-app.jpg?quality=82&strip=all" height="100" width="250" alt="" />
      <img class="slide" src="https://image.jeuxvideo.com/medias-crop-1200-675/158444/1584439245-982-card.png" height="100" width="250" alt="" />
      <img class="slide" src="https://steamcdn-a.akamaihd.net/steam/apps/601510/header.jpg?t=1537848730" height="100" width="250" alt="" />
    </div>
  </div>



  <br><br><br>
  <table class="center">
    <tr>
      <td>
        
        <?php
        $bdd = new PDO("mysql:host=127.0.0.1;dbname=gapp;charset=utf8", "root", "");
        $showParPage = 4;
        $showTotalesReq = $bdd->query('SELECT id FROM addgame');
        $showTotales = $showTotalesReq->rowCount();
        $pagesTotales = ceil($showTotales / $showParPage);
        if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0 and $_GET['page'] <= $pagesTotales) {
          $_GET['page'] = intval($_GET['page']);
          $pageCourante = $_GET['page'];
        } else {
          $pageCourante = 1;
        }
        $depart = ($pageCourante - 1) * $showParPage;
        ?>

        <?php
        $show = $bdd->query('SELECT * FROM addgame ORDER BY id DESC LIMIT ' . $depart . ',' . $showParPage);
        while ($vid = $show->fetch()) {
        ?>
      </td>
      <td>
        <div class="card border-dark" style="width:15rem">
          <div class="solid">

            <?php
            echo '<center> <br><img class="imgg" src="images/' . $vid['images'] . '"/></center>';
            ?>
            <div class="card-body ">
              <h5 class="card-title ">Jeu : <?php echo $vid['gamename']; ?></h5>
              <p class="card-text">Genre : <?php echo $vid['genre']; ?></p>
              <p class="card-text">Catégorie : <?php echo $vid['categorie']; ?></p>
             <p> <center><a href="test.php?gamename=<?php echo $vid['gamename']; ?>&amp;pseudo=<?php echo $_SESSION['pseudo'];?>" class="btn btn-sm btn-info" role="button">Laisser un commentaire</a></center></p>
            </div>
            <ul class="list-group list-group-flush ">
              <li class="list-group-item">
                <p>
                  <center><button class="btn btn-info btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><center>
                    Description
                  </button>
                </p>
                <div class="collapse" id="collapseExample">
                  <div class="card card-body">
                    <?php echo "Description : ", $vid['avis']; ?>
                  </div>
                </div>
              </li>

              <li class="list-group-item card text-white bg-dark">
                <?php
                if ($vid['notes'] == 1) {
                  echo 'NOTES : ⭐';
                } else if ($vid['notes'] == 2) {
                  echo 'NOTES :⭐⭐';
                } else if ($vid['notes'] == 3) {
                  echo 'NOTES : ⭐⭐⭐';
                } else if ($vid['notes'] == 4) {
                  echo 'NOTES : ⭐⭐⭐⭐';
                } else if ($vid['notes'] == 5) {
                  echo 'NOTES : ⭐⭐⭐⭐⭐';
                } ?>

                <div class="datesize">
                  <p class="card-text">Publié le : <?php echo $vid['dates']; ?><br>
                    par : <?php echo $vid['pseudo']; ?></p>
                </div>
              </li>
          </div>
        </div>
      </td>
      <td>


        </ul>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      </td>
      <td>

      <?php
        } 
      ?>
      </td>
    </tr>
  </table>
  <br> <br> <br> <br>

  <style>
    .page-item.active .page-link {

      color: #fff;

      background-color: #434343;

      border-color: #292b2c;

      border-style: solid;
    }
  </style>

  <?php
  echo '<nav aria-label="...">';
  echo '<ul class="pagination pagination-lg justify-content-center">';
  for ($i = 1; $i <= $pagesTotales; $i++) {
    if ($i == $pageCourante) {
      echo '<li class="page-item active"><a class="page-link primary ">';
      echo $i . ' ';
    } else {
      echo '<li class="page-item "><a class="page-link " <a href="index1.php?page=' . $i . '">' . $i . '</a> ';
    }
  }
  ?>



  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>