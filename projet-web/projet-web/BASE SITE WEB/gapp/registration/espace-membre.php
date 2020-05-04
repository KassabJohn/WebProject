<?php

session_start();
if (!isset($_SESSION['pseudo'])) {
    header("Refresh: 5; url=connexion.php");
    echo "Vous devez vous connecter pour accéder à l'espace membre.<i>Redirection en cours, vers la page de connexion...</i>";
    exit(0);
}
$Pseudo = $_SESSION['pseudo'];
$mysqli = mysqli_connect('localhost', 'root', '', 'gapp');
if (!$mysqli) {
    echo "Erreur connexion BDD";
    exit(0);
}


$req = mysqli_query($mysqli, "SELECT * FROM membres WHERE pseudo='$Pseudo'");
$info = mysqli_fetch_assoc($req);
?>
<!DOCTYPE HTML>

<html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
<link rel="stylesheet" href="espacemembre.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Righteous" />

<head>
    <title>Espace membre</title>
</head>
<header>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb shadow-lg p-3 mb-5 bg-light rounded">
            <li class="text-uppercase font-weight-bold "> CONNECTÉ À : <?php echo $_SESSION['pseudo']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <li class="breadcrumb-item"><a href="../index1.php">Accueil</a></li>
            <li class="breadcrumb-item"><a href="../pages/annonce.php">Ajouter un jeu</a></li>
            <li class="breadcrumb-item"><a href="../pages/search.php">Rechercher un jeu</a></li>
            <li class="breadcrumb-item active " aria-current="page">Espace membre</li>
            <li class="breadcrumb-item"><a href="../pages/contact.php">Nous contacter</a></li>
            <li class="breadcrumb-item"><a href="../registration/deconnexion.php">Déconnexion</a></li>

        </ol>
    </nav>

</header>
<br>


<body background="../style/ptn_zebi.png">



<div class="msgpos">
  <div class="container">
  <button type="button" style="box-shadow: 0 3px 9px black" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">Messagerie</button>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

        <center>Accéder à votre messagerie privée </center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <a class="btn btn-primary" href="../pages/envoie.php" role="button">Envoyer un message</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a class="btn btn-primary" href="../pages/reception.php" role="button">Boîte de reception</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>
</div>


    <center>
        <h1>Vos informations</h1>

        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'gapp');
        $mysqli->set_charset("utf8");
        $requete = "SELECT * FROM membres WHERE pseudo = '$Pseudo'";
        $resultat = $mysqli->query($requete);
        while ($ligne = $resultat->fetch_assoc()) {
            echo '<b>Pseudonyme </b>: ', $ligne['pseudo'] . ' <br><b>Mail : </b>' . $ligne['mail'] . ' <br> ';
            echo '<b>Photo de profil : </b>';
        }
        $mysqli->close();
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

        <form method="post" action="espace-membre.php" enctype="multipart/form-data">
            <div class="text-center"></div>

        </form>


        <?php
        $Pseudo = $_SESSION['pseudo'];
        $mysqli = mysqli_connect('localhost', 'root', '', 'gapp');
        $req = mysqli_query($mysqli, "SELECT * FROM membres WHERE pseudo='$Pseudo'");
        $info = mysqli_fetch_assoc($req);

        ?>

        <hr class='style13'>
        <h1>Espace membre</h1>
        Pour modifier vos informations, <a href="espace-membre.php?modifier">cliquez ici</a><br>

        Pour supprimer votre compte, <a href="espace-membre.php?supprimer">cliquez ici</a><br>

        Pour vous déconnecter, <a href="deconnexion.php">cliquez ici</a>
        <hr class='style13'>
        <?php
        if (isset($_GET['supprimer'])) {
            if ($_GET['supprimer'] != "ok") {
                echo "<p>Êtes-vous sûr de vouloir supprimer votre compte définitivement?</p>
                 
                <a href='espace-membre.php?supprimer=ok' style='color:red'>OUI</a> - <a href='espace-membre.php' style='color:green'>NON</a>";
            } else {
                if (mysqli_query($mysqli, "DELETE FROM membres WHERE pseudo='$Pseudo'")) {
                    echo "<a style='color:red'>Votre compte vient d'être supprimé définitivement. </a>";
                    unset($_SESSION['pseudo']);
                    header("Refresh: 3; url=../index.php");
                } else {
                    echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
                }
            }
        }
        if (isset($_GET['modifier'])) {
        ?>
            <h1>Modification du compte</h1>
            Choisissez une option:
            <p>
                <a href="espace-membre.php?modifier=mail">Modifier l'adresse mail </a>&nbsp&nbsp&nbsp <a> |
                    &nbsp&nbsp&nbsp </a>
                <a href="espace-membre.php?modifier=pict">Modifier la photo de profil </a>&nbsp&nbsp&nbsp <a> |
                    &nbsp&nbsp&nbsp </a>
                <a href="espace-membre.php?modifier=mdp">Modifier le mot de passe</a>
            </p>
            <?php
            if ($_GET['modifier'] == "mail") {
                echo "<span>Adresse Mail :</span>";
                if (isset($_POST['valider'])) {
                    if (!isset($_POST['mail'])) {
                        echo "Le champ mail n'est pas reconnu.";
                    } else {
                        if (!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,30}$#i", $_POST['mail'])) {
                            echo "L'adresse mail est incorrecte.";
                        } else {
                            if (mysqli_query($mysqli, "UPDATE membres SET mail='" . htmlentities($_POST['mail'], ENT_QUOTES, "UTF-8") . "' WHERE pseudo='$Pseudo'")) {
                                echo "Adresse mail {$_POST['mail']} modifiée avec succès!";
                                $TraitementFini = true;
                                header('location:espace-membre.php');
                            } else {
                                echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
                            }
                        }
                    }
                }
                if (!isset($TraitementFini)) {
            ?>

                    <form method="post" action="espace-membre.php?modifier=mail">
                        <input type="email" name="mail" value="<?php echo $info['mail']; ?>" required>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        <input type="submit" class="btn btn-primary" name="valider"><br><br>
                    </form>

                <?php
                }
            }
            if ($_GET['modifier'] == "mdp") {
                echo "<p>Renseignez le formulaire ci-dessous pour modifier vos informations:</p>";
                if (isset($_POST['valider'])) {
                    if (!isset($_POST['nouveau_mdp'], $_POST['confirmer_mdp'], $_POST['mdp'])) {
                        echo "Un des champs n'est pas reconnu.";
                    } else {
                        if ($_POST['nouveau_mdp'] != $_POST['confirmer_mdp']) {
                            echo "Les mots de passe ne correspondent pas.";
                        } else {
                            $Mdp = md5($_POST['mdp']);
                            $NouveauMdp = md5($_POST['nouveau_mdp']);
                            $req = mysqli_query($mysqli, "SELECT * FROM membres WHERE pseudo='$Pseudo' AND mdp='$Mdp'");
                            if (mysqli_num_rows($req) != 1) {
                                echo "Mot de passe actuel incorrect.";
                            } else {
                                if (mysqli_query($mysqli, "UPDATE membres SET mdp='$NouveauMdp' WHERE pseudo='$Pseudo'")) {
                                    echo "Mot de passe modifié avec succès!";
                                    $TraitementFini = true;
                                    header('location:espace-membre.php');
                                } else {
                                    echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
                                }
                            }
                        }
                    }
                }
                if (!isset($TraitementFini)) {
                ?>

                    <form method="post" style="text-align:center" action="espace-membre.php?modifier=mdp">
                        <input type="password" name="nouveau_mdp" placeholder="Nouveau mot de passe" required>
                        <br><br>
                        <input type="password" name="confirmer_mdp" placeholder="Confirmer le mot de passe" required>
                        <br><br>
                        <input type="password" name="mdp" placeholder="Votre mot de passe actuel" required> <br><br>
                        <input type="submit" class="btn btn-primary" name="valider"><br><br>

                    </form>
                <?php
                }
            }



            if ($_GET['modifier'] == "pict") {
                $db = mysqli_connect("localhost", "root", "", "gapp");
                $msg = "";
                if (isset($_POST['upload'])) {
                    $image = $_FILES['images']['name'];
                    // $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
                    $target = "../images/" . basename($image);
                    $sql = "UPDATE membres SET images='$image' WHERE pseudo='$Pseudo'";
                    mysqli_query($db, $sql);
                    echo "Photo de profil modifié avec succès!";
                    if (move_uploaded_file($_FILES['images']['tmp_name'], $target)) {
                        $msg = "Image uploaded successfully";
                        $TraitementFini = true;
                        header('location:espace-membre.php');
                    } else {
                        $msg = "Failed to upload image";
                    }
                }
                if (!isset($TraitementFini)) {
                ?>
                    <form method="POST" action="espace-membre.php?modifier=pict" enctype="multipart/form-data">
                        <div>
                            <input type="file" name="images">
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary" name="upload"><br>
                    </form>
                <?php
                }
                $result = mysqli_query($db, "SELECT images FROM membres where pseudo = '$Pseudo'");
                ?>
                </head>

        <?php
            }
        }
        ?>

        <form action="../index1.php">
            <div class="wrapper">
                <button class="btn btn-primary">Retour a l'accueil</button>
            </div>
        </form>
        <br>
    </center>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>