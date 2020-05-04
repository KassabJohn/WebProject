<!DOCTYPE html>
<?php include "../function/function.php"; ?>
<?php session_start();
$Pseudo = $_SESSION['pseudo'];?>
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
<body style='font-family:Righteous'background="reception.png">
<header>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb shadow-lg p-3 mb-5 bg-light rounded">
            <li class="text-uppercase font-weight-bold " aria-current="page">
            <li class="text-uppercase font-weight-bold "> CONNECTÉ À : <?php echo $_SESSION['pseudo']; ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <li class="breadcrumb-item"><a href="../index1.php">Accueil</a></li>
            <li class="breadcrumb-item"><a href="../registration/espace-membre.php">Ajouter un jeu</a></li>
            <li class="breadcrumb-item"><a href="search.php">Rechercher un jeu</a></li>
            <li class="breadcrumb-item"><a href="../registration/espace-membre.php">Espace membre</a></li>
            <li class="breadcrumb-item"><a href="contact.php">Nous contacter</a></li>
            <li class="breadcrumb-item"><a href="../registration/deconnexion.php">Déconnexion</a></li>
        </ol>
    </nav>
</header>
<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=gapp', 'root', '');
    if(isset($_SESSION['pseudo']) AND !empty($_SESSION['pseudo'])) {
    $msg = $bdd->prepare('SELECT * FROM messages WHERE pseudo_r = ?');
    $msg->execute(array($_SESSION['pseudo']));
    $msg_nbr = $msg->rowCount();
    if (isset($_POST['valider'])) {
        $del = ("DELETE FROM messages WHERE pseudo_r = '$Pseudo'");
        $resultat = $bdd->query($del);
        echo '<center>Messages supprimés<center><br>';
        header("Refresh: 1; url=reception.php");
    }

    ?>


        <center>
    <a href="envoie.php" style="color: white">Nouveau message</a><br /><br /><br />
    <form method="POST">
    <input type="submit" class="btn btn-danger btn-sm" value="Supprimer TOUS les messages" name="valider" />
    </form>
    <br>
    <h3>Votre boîte de réception:</h3>
    <?php
    if($msg_nbr == 0) { echo "Vous n'avez aucun message...";
    }else{
        echo "vous avez $msg_nbr messages<br><br>";
    }
    while($m = $msg->fetch()) {
        $p_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = ?');
        $p_exp->execute(array($m['pseudo_e']));
        $p_exp = $p_exp->fetch();
        $p_exp = $p_exp['pseudo'];
        ?>
        <b><?= $p_exp ?></b> vous a envoyé: <br />
        <?= nl2br($m['message']) ?><br />
        -------------------------------------<br/>
    <?php
    }
    ?>
    </body>
    </html>
<?php
    }
    ?>
</center>
</body>
</html>