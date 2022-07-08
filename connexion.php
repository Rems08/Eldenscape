<?php
session_start();
if(isset($_SESSION['id'])){
   header('Location: principale.php');
}
include_once('connexionBD.php');

if(!empty($_POST)){
  extract($_POST);
  $valid = true;
  if(isset($_POST['connexion']))
  {
          $valid = true ;
          // connexion à la base de données
          // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
          // pour éliminer toute attaque de type injection SQL et XSS
          function valid_donnees($donnees){
              $donnees = trim($donnees);
              $donnees = stripslashes($donnees);
              $donnees = htmlspecialchars($donnees);
              // $donnees = mysqli_real_escape_string($donnees);
              return $donnees;
        }
        $username = valid_donnees($_POST["username"]);
        // $mail = valid_donnees($_POST["mail"]);
        $password = valid_donnees($_POST["password"]);

        if(empty($username)){
          $valid = false;
          $er_pseudo = ("Le pseudo d' utilisateur ne peut pas être vide");
        }

        if(empty($password)) {
          $valid = false;
          $er_password = "Le mot de passe ne peut pas être vide";

        }
      }else if (isset($_POST['urlinscription']) ){
        header("Location:inscription.php");
        $valid = false;
      }    
        if($valid){
          try{
            $requete = $DB->prepare("SELECT password FROM utilisateur where 
            username = ?");

            $requete->execute(array($username));

            $req= $requete->fetch();

            if(isset($req['password'])){
                if(!password_verify($password, $req['password'])){
                  $valid = false;
                  $er_combinaison = "Le mot de passe ou le pseudo est incorrecte";
                }else{
                  header('Location: principale.php');
                  $_SESSION['username'] = $username; 
                  $_SESSION['id'] = true; 
                  $_SESSION["autoriser"] = "oui";
                  $_SESSION['err'] = false; 
                  $_SESSION['user_time'] = time();
                }

            }else{
                $valid = false;
                $er_combinaison = "Le mot de passe ou le pseudo est incorrecte";
            }
          
               }
    
            catch(PDOException $e){
              die('Erreur:'.$e->getMessage());
              }
      }
    
}

?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Connexion Eldenscape</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
  <div id="main">

    <div><a href="./index.php"><img src="images/logo/logo.png" alt="logo de Eldenscape" id="logo" style="text-align: center;"></a></div>
    <form action=" " method="POST" id="Triconnexion" >
      <div id="formulaire">
        <div class="form">
            <div class="title">CONNEXION</div>
            <div class="subtitle">Connectez-vous</div>
            <?php
            if(isset($_GET['reussi'])){
                  $err = $_GET['reussi'];
                  if($err==1) $valid_inscription ="Inscription terminer, connecter vous";
                  echo $valid_inscription;
                }            
            ?>
            <div class="input-container ic2">
              <input id="email" class="input" type="text" placeholder=" " name="username"/>
              <div class="cut cut-short"></div>
              <label for="email" class="placeholder">Pseudo</label>
              <?php
                if(isset($er_pseudo)){
                  echo $er_pseudo;
                }
                ?>
            </div>
            <div class="input-container ic1">
              <input id="password" class="input" type="password" placeholder=" " name="password">
              <div class="cut"></div>
              <label for="password" class="placeholder">Password</label>
              <?php
                if(isset($er_password)){
                  echo $er_password;
                }
                if(isset($er_combinaison)){
                  echo $er_combinaison;
                }
                ?>
            </div>

            <button type="text" class="submit" name = 'connexion' value='LOGIN'>Connexion</button>
            <p>
              &lowbar;
            </p>
            <p>Vous n'avez pas encore de compte ?</p>
            <a href=""><button type="text" class="inscription" name ="urlinscription">Inscription</button></a>



          </div>
       </div>
      </form>
    </div>
  
</body>
</html>