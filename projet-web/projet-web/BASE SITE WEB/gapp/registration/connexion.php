<?php
 
session_start();
 
?><!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Righteous" />
     <link rel="stylesheet" href="../style/login.css">
    <head>

<script type="text/javascript">
function noBack(){window.history.forward()}
noBack();
window.onload=noBack;
window.onpageshow=function(evt){if(evt.persisted)noBack()}
window.onunload=function(){void(0)}
</script> 

        <title>Se connecter</title>
    </head>
    <body>
        <center>
         
        <br>


        <?php
        if(isset($_SESSION['pseudo'])){
            echo "<br>Vous êtes déja connecté ! <br> Amusez vous bien !<br><br>";
            echo "<button type='button' class='btn btn-secondary btn-sm'><a href='espace-membre.php'>Espace membre</a></button>  ";
        } else {

            if(isset($_POST['valider'])){
                if(!isset($_POST['pseudo'],$_POST['mdp'])){
                    echo "Un des champs n'est pas reconnu.";
                } else {
                    $mysqli=mysqli_connect('localhost','root','','gapp');
                    if(!$mysqli) {
                        echo ("Erreur connexion BDD");
                    } else {
                        $Pseudo=htmlentities($_POST['pseudo'],ENT_QUOTES,"UTF-8");
                        $Mdp=md5($_POST['mdp']);
                        $req=mysqli_query($mysqli,"SELECT * FROM membres WHERE pseudo='$Pseudo' AND mdp='$Mdp'");
                        if(mysqli_num_rows($req)!=1){
                            echo "Retourner à<a style='color:red' href ='../index.php'> l'accueil.</a><br>";
                            echo "Pseudo ou mot de passe incorrect.";
                        } else {
                            $_SESSION['pseudo']=$_POST['pseudo'];
                        
                            echo "<br> Bon retour parmi nous <b> $Pseudo </b>!<br> Amusez vous bien !<br><br>";
                            echo "<button type='button' class='btn btn-secondary btn-sm'><a href='../index1.php'>Retour à l'accueil</a></button>  ";
                            echo "<button type='button' class='btn btn-secondary btn-sm'><a href='espace-membre.php'>Espace membre</a></button>  ";
                            $TraitementFini=true;
                        }
                    }
                }
            }
            if(!isset($TraitementFini)){
                ?>
                 

                 <div class="wrapper animated bounce">
  <h1><p style="color:#bb6060" >Connexion</h1>
  <hr>
  <form method="post" action="connexion.php">
    <label id="icon" for="username"><i class="fa fa-user"></i></label>
    <input type="text" name="pseudo" placeholder="Votre pseudo..." required>
    <label id="icon" for="password"><i class="fa fa-key"></i></label>
    <input type="password" name="mdp" placeholder="Votre mot de passe..." required>
    <input type="submit" name="valider" value="Se connecter">
    <br><br>&nbsp&nbsp&nbsp
    <button type="button" class="btn btn-secondary btn-sm"><a href="inscription.php">S'inscrire</a></button>
  </form>
</div>
                <?php
            }
        }
        ?>
        </center>
    </body>
</html>