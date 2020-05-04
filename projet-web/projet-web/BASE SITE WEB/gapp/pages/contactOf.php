<?php session_start();
if (!isset($_SESSION['value']) OR $_SESSION['value'] < 1) {
    $_SESSION['trace'] = array('trace');
    $_SESSION['value'] = 0;
}
$_SESSION['value'] += 1;
$_SESSION['trace'][$_SESSION['value']] = 'contact';?>

<html style="background-image: url('../assets/css/background.jpg');">
<head>
<link rel="stylesheet" href="contact.css">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Righteous" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body background="contact.png" style='font-family:Righteous'>
<header>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb shadow-lg p-3 mb-5 bg-light rounded">
    <li class="text-uppercase font-weight-bold " aria-current="page">
    <li class="breadcrumb-item"><a href="../index.php">Accueil</a></li>
    <li class="breadcrumb-item"><a href="../registration/inscription.php">Inscription</a></li>
    <li class="breadcrumb-item"><a href="../registration/connexion.php">Connexion</a></li>
    <li class="breadcrumb-item active" aria-current="pages">Nous contacter</li>
  </ol>
</nav>
</header>
<div class="container">
    <form method="post">
      <div class="col-xs-2">
        <label for=""></label>
      <input type="text" class="form-control" placeholder="Nom" name="nom">
    </div>
    <div class="col-xs-2">  
        <label for=""></label>
      <input type="text" class="form-control" placeholder="Prénom" name="prenom">
    </div>
  
  <div class="col-xs-4">
    <label for="InputEmail"></label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer email" name="mail">
  </div>
  <div class="form-group">
    <label for="FormControlTextarea"></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Votre message..." name="texte"></textarea>
</div>
  <button type="submit" value="Ajouter" class="btn btn-primary">Envoyer</button>
  </div>
</form>
</div>
<?php 
    if (isset($_POST['prenom'])) {
        $mysqli = new mysqli('localhost', 'root', '', 'gapp');
        $mysqli->set_charset('utf8');
        $requete='INSERT INTO contact VALUES(NULL,"'.$_POST['nom'].'","'.$_POST['prenom'].'","'.$_POST['mail'].'","'.$_POST['texte'].'")';
        $resultat = $mysqli->query($requete);
        if ($resultat)
            echo 'Message envoyé';
        else
            echo 'Erreur';
    }
?>

<hr>


<div class="container vertical-divider">
  <div class="column one-third">
    
  </div>
  <div class="column two-thirds">
    <p><h1>Contact</h1></p>
  </div>
</div>

<div class="container vertical-divider">
  <div class="column one-third">
    <h3>Téléphone</h3>
    <p>du Lundi au Samedi, de 9h à 20h <br> au : 06 59 81 06 31</p>
  </div>
  <div class="column one-third">
    <h3>Nous écrire</h3>
    <p>A l'adresse suivante : <br> 20 rue Pagès, Toulouse, 31200, France</p>
  </div>
  <div class="column one-third">
    <h3>Réseaux Sociaux</h3>
    <p>										<div class="entry-social">
											<div class="fb">
												<a href="https://www.facebook.com/profile.php?id=100006445020365" target="_blank">Facebook</a>
											</div></p>
  </div>
</div>


</body>
</html>
