<?php
?><!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Righteous" />
    <link rel="stylesheet" href="../style/login.css">

    <head>
        <title>Script espace membre</title>
    </head>
    <body>
        <center>
            <br>
        <button type="button" class="btn btn-secondary btn-sm"><a href="../index.php">Retour à l'accueil</a></button>
         
        <?php
        $img = '../images/default.png';
        if(isset($_POST['valider'])){
            if(!isset($_POST['pseudo'],$_POST['mdp'],$_POST['mail'])){
                echo "<br>Un des champs n'est pas reconnu.";
            } else {
                if(!preg_match("#^[a-z0-9]{1,15}$#",$_POST['pseudo'])){
                    echo "<br>Le pseudo est incorrect, doit contenir seulement des lettres minuscules et/ou des chiffres, d'une longueur minimum de 1 caractère et de 15 maximum.";
                } else {
                    if(strlen($_POST['mdp'])<5 or strlen($_POST['mdp'])>15){
                        echo "<br>Le mot de passe doit être d'une longueur minimum de 5 caractères et de 15 maximum.";
                    } else {
                        if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,30}$#i",$_POST['mail'])){
                            echo "<br>L'adresse mail est incorrecte.";
                        } else {
                            if(strlen($_POST['mail'])<7 or strlen($_POST['mail'])>50){
                                echo "<br>Le mail doit être d'une longueur minimum de 7 caractères et de 50 maximum.";
                            } else {
                                $mysqli=mysqli_connect('localhost','root','','gapp');
                                if(!$mysqli) {
                                    echo "Erreur connexion BDD";
                                } else {
                                    $Pseudo=htmlentities($_POST['pseudo'],ENT_QUOTES,"UTF-8");
                                    $Mdp=md5($_POST['mdp']);
                                    $Mail=htmlentities($_POST['mail'],ENT_QUOTES,"UTF-8");
                                    if(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM membres WHERE pseudo='$Pseudo'"))!=0){
                                        echo "<br>Ce pseudo est déjà utilisé par un autre membre, veuillez en choisir un autre svp.";
                                    } else {
                                        if(mysqli_query($mysqli,"INSERT INTO membres SET pseudo='$Pseudo', mdp='$Mdp', mail='$Mail', images='$img'")){
                                            echo "<br>Inscrit avec succès! Vous pouvez vous connecter en cliquant <a href='connexion.php' style='color:red;'> <b>ici </b></a>.";
                                            $TraitementFini=true;
                                        } else {
                                            echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        if(!isset($TraitementFini)){
            ?>
             

             
             <div class="wrapper animated bounce">
             <h1><p style="color:#bb6060" >Inscription</h1>
  <hr>
  <form method="post" action="inscription.php">
    <label id="icon" for="username"><i class="fa fa-user"></i></label>
    <input type="text" name="pseudo" placeholder="Votre pseudo..." required>
    
    <label id="icon" for="password"><i class="fa fa-key"></i></label>
    <input type="password" name="mdp" placeholder="Votre mot de passe..." required>
    
    <label id="icon" for="mail"><i class="fa fa-envelope"></i></label>
    <input type="text" name="mail" placeholder="Votre adrese mail..." required>
    
    <input type="submit" name="valider" value="S'inscrire">
    <hr>&nbsp&nbsp&nbsp&nbsp
    <button type="button" class="btn btn-secondary btn-sm"><a href="connexion.php">Se connecter</a></button>
  </form>
</div>

            <?php
        }
        ?>
              </center>
    </body>
</html>

