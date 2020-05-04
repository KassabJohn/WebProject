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
<body style='font-family:Righteous' background="envoi.png">
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
<center>
<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=gapp', 'root', '');
if (isset($_POST['valider'])) {
    if (isset($_SESSION['pseudo']) AND !empty($_SESSION['pseudo'])) {
            if (isset($_POST['destinataire'], $_POST['message']) AND !empty($_POST['destinataire']) AND !empty($_POST['message'])) {
                $destinataire = htmlspecialchars($_POST['destinataire']);
                $message = htmlspecialchars($_POST['message']);
                $pseudo_destinataire = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = ?');
                $pseudo_destinataire->execute(array($destinataire));
                $dest_exist = $pseudo_destinataire->rowCount();
                if ($dest_exist == 1) {
                    $pseudo_destinataire = $pseudo_destinataire->fetch();
                    $pseudo_destinataire = $pseudo_destinataire['pseudo'];
                    $ins = $bdd->prepare('INSERT INTO messages(pseudo_e,pseudo_r,message,msg) VALUES (?,?,?,1)');
                    $ins->execute(array($_SESSION['pseudo'], $pseudo_destinataire, $message));
                    $TraitementFini = true;
                    echo "Message envoyé";
                    header("Refresh: 2; url=../espace-membre.php");
                } else {
                    echo "Cet utilisateur n'existe pas...";
                }
            } else {
                echo  "Veuillez compléter tous les champs";
            }
    }
}
if (!isset($TraitementFini)) {
    ?>
          <table width="-50%">
            <td width="50%">
              <table>
              <a href="reception.php" style="color: white">Boîte de reception</a><br /><br /><br />
                <tr>
                  <td>
                    <div class="table-responsive">
                      <table class="table">
        <form method="POST">
           
            <label>Destinataire : &nbsp</label>
            <input type="text" name="destinataire" />
            <br /><br />
            <textarea  rows="4" cols="5" placeholder="Votre message" name="message"></textarea>
            <br /><br />
            <input type="submit" value="Envoyer" name="valider" />
            <br /><br />
            
        </form>
        </td>
                </tr>
              </table>
            </td>
        </div>
        </table>
    <?php
}
?>
</center>


</body>
</html>